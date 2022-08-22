<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Helpers\PaginationHelper;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::first('id')->get();

        return view('categories.index', [
            'categories' => $categories
        ]);
    }

    public function create(){
        return view('categories.create');
    }

    public function store(){
        $attributes = request()->validate([
            'name' => 'required|min:2|max:20|unique:categories,name',
            'slug' => 'required|min:2|max:255|unique:categories,slug'
        ]);

        $category = Category::create($attributes);

        return redirect('/admin/categories')->with('success', 'Category created!');
    }

    public function edit(Request $request){
        $category = Category::where('id', $request['id'])->firstOrFail();
        
        return view('categories.edit', [
            'category' => $category
        ]);
    }

    public function editCategory(Request $request){
        Category::where('id', $request->id)
        ->update(['slug' => $request->slug,
                    'name' => $request->name]);;
        return redirect()->to('/admin/categories')->with('success', 'Category edited.');
    }
}
