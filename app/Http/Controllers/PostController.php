<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Helpers\PaginationHelper;
use Illuminate\Http\Request;
use Vinkla\Hashids\Facades\Hashids;
use Carbon\Carbon;

class PostController extends Controller
{
    public function index(){
        $permission = (auth()->user()->admin OR auth()->user()->kd ) ? true : false;
        $posts = Post::latest('id')->filter($permission)->paginate(10);
        $categories = Category::first('id')->filter($permission)->get();

        return view('posts.index', [
            'posts' => $posts,
            'categories' => $categories
        ]);
    }

    public function edit(Request $request){
        $post = Post::where('id', $request['id'])->firstOrFail();
        
        return view('posts.edit', [
            'post' => $post
        ]);
    }

    public function checkPermission(){
        return (auth()->user()->admin OR auth()->user()->kd ) ? true : false;
    }
 
    public function showCategory(Category $category){
        $posts = $category->posts->sortByDesc('id');
        $showPerPage = 10;
        return view('posts.categories', [
            'posts' => PaginationHelper::paginate($posts, $showPerPage)->withQueryString()
        ]);
    }

    public function create(){
        return view('posts.create');
    }

    public function store(Request $request){
        $request->validate([
            'images' => 'required'
        ]);
  
        if ($request->hasfile('images')) {
            $images = $request->file('images');
            $category_id = $request->category_id;

            foreach($images as $image) {
                $name = Hashids::encode((int)Carbon::now()->getPreciseTimestamp(3));
                $path = $image->storeAs('', $name.'.jpg', 'images');

                Post::create([
                    'category_id' => $category_id,
                    'slug' => $name
                ]);
            }
        }
  
        return back()->with('success', 'Images uploaded');
    }

    public function editPost(Request $request){
        Post::where('id', $request->id)
        ->update(['category_id' => $request->category_id,
                    'post' => $request->post]);;
        return redirect()->to('/')->with('success', 'Post edited');
    }

    public function deletePost(Request $request){
        $deleted = Post::where('id', $request->id)->delete();
        return back()->with('success', 'Post deleted');
    }
}
