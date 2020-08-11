<?php

namespace App\Http\Controllers;

use App\User;
use App\Category;
use Axiom\Rules\Uppercase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
// use Session;

class CategoryController extends Controller
{
    
    public function index()
    {
        $categories = Category::all();
        return view('admin.Category.index', [
            'categories' => $categories
        ]);
    }

    public function create()
    {
        return view('admin.Category.create');
    }

    public function store(Request $request)
    {
        // return $request->all();
        $this->validate($request, [
            // 'category_name' => 'required|min:3|regex:/[A-Z]/|unique:categories,name',
            'category_name' => ['required', 'min:3', 'unique:categories,name', new Uppercase],
            'category_description' => 'required',
        ]); 

        // Category::create($request->all());
        $category = new Category;
        $category->name = $request->category_name;
        $category->description = ucfirst($request->category_description);
        $category->publication_status = $request->publication_status ? $request->publication_status : false;
        $category->save();
        return redirect()->back()->with('success', 'Category was created successfully!');
    }

    public function edit(Category $category)
    {
        return view('admin.Category.edit', [
            'category' => $category
        ]);
    }

    public function update(Category $category, Request $request)
    {
        $this->validate($request, [
            // 'category_name' => 'required|min:3|regex:/[A-Z]/|unique:categories,name,'.$category->id,
            'category_name' => ['required', 'min:3', 'unique:categories,name,'.$category->id, new Uppercase],
            'category_description' => 'required',
        ]);

        // $category->update($request->all());
        $category->name = $request->category_name;
        $category->description = ucfirst($request->category_description);
        $category->update();
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

    public function destroy(Category $category, Request $request)
    {
        $category->delete();
        Session::flash('success', 'Category was deleted successfully!');
        // $request->session()->flash('success', 'Category was deleted successfully!');
        return response([
            'success' => true
        ]);
    }

}
