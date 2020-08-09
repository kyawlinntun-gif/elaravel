<?php

namespace App\Http\Controllers;

use App\Category;
use App\User;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    
    public function index()
    {
        $categories = Category::all();
        return view('admin.Category.index', [
            'categories' => $categories
        ]);
    }

    public function show()
    {

    }

    public function create()
    {
        return view('admin.Category.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'category_name' => 'required|min:3|unique:categories,name',
            'category_description' => 'required',
        ]); 

        // Category::create($request->all());
        $category = new Category;
        $category->name = $request->category_name;
        $category->description = $request->category_description;
        $category->publication_status = $request->publication_status ? $request->publication_status : false;
        $category->save();
        return redirect()->back()->with('success', 'Category was created successfully!');
    }

    public function status(Request $request)
    {
        $id = $request->id;
        $status = $request->status;
        $category = Category::findOrFail($id);
        $category->publication_status = $status;
        $category->update();

        return response([
            'category' => $category 
        ]);
    }

}
