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
                //$path = $image->storeAs('', $name.'.jpg', 'images');

                $maxDim = 800;
                $file_name = $image->storeAs('', $name.'.jpg', 'images');
                list($width, $height, $type, $attr) = getimagesize( $file_name );
                if ( $width > $maxDim || $height > $maxDim ) {
                    $target_filename = $file_name;
                    $ratio = $width/$height;
                    if( $ratio > 1) {
                        $new_width = $maxDim;
                        $new_height = $maxDim/$ratio;
                    } else {
                        $new_width = $maxDim*$ratio;
                        $new_height = $maxDim;
                    }
                    $src = imagecreatefromstring( file_get_contents( $file_name ) );
                    $dst = imagecreatetruecolor( $new_width, $new_height );
                    imagecopyresampled( $dst, $src, 0, 0, 0, 0, $new_width, $new_height, $width, $height );
                    imagedestroy( $src );
                    imagepng( $dst, $target_filename ); // adjust format as needed
                    imagedestroy( $dst );
                }
                
                Post::create([
                    'category_id' => $category_id,
                    'slug' => $name
                ]);
            }
        }
  
        return back()->with('success', 'Image(s) uploaded.');
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
