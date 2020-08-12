<?php

namespace App\Http\Controllers;

use App\Manufacture;
use Axiom\Rules\Uppercase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BrandController extends Controller
{

    public function index()
    {
        $brands = Manufacture::all();
        return view('admin.brand.index', [
            'brands' => $brands
        ]);
    }

    public function create()
    {
        return view('admin.brand.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'brand_name' => ['required', 'min:3', 'unique:manufactures,name', new Uppercase],
            'brand_description' => 'required'
        ]);

        $manufacture = new Manufacture;
        $manufacture->name = $request->brand_name;
        $manufacture->description = ucfirst($request->brand_description);
        $manufacture->publication_status = $request->publication_status ? $request->publication_status : false;
        $manufacture->save();

        return redirect()->back()->with('success', 'Brand was created successfully!');
    }

    public function destroy(Manufacture $brand)
    {
        $brand->delete();

        Session::flash('success', 'Brand was deleted successfully!');
        
        return response([
            'success' => true
        ]);
    }

    public function status(Request $request)
    {
        $id = $request->id;
        $status = $request->status;
        $brand = Manufacture::findOrFail($id);
        $brand->publication_status = $status;
        $brand->update();

        return response([
            'brand' => $brand 
        ]);
    }

    public function edit(Manufacture $brand)
    {
        return view('admin.brand.edit', [
            'manufacture' => $brand
        ]);
    }

    public function update(Manufacture $brand, Request $request)
    {
        $this->validate($request, [
            'brand_name' => ['required', 'min:3', 'unique:manufactures,name,'.$brand->id, new Uppercase],
            'brand_description' => 'required'
        ]);

        $brand->name = $request->brand_name;
        $brand->description = ucfirst($request->brand_description);
        $brand->update();

        return redirect()->back()->with('success', 'Brand was edited successfully!');
    }
}
