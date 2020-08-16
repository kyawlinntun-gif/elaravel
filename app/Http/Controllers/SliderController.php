<?php

namespace App\Http\Controllers;

use Image;
use App\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        return view('admin.slider.index', [
            'sliders' => $sliders
        ]);
    }

    public function create()
    {
        return view('admin.slider.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'slider_image' => 'required|max:1999'
        ]);

        // Get filename with extension
        $filenameWithExt = $request->file('slider_image')->getClientOriginalName();

        // Get just the filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

        // Get extension
        $extension = $request->file('slider_image')->getClientOriginalExtension();

        // Create new filename
        $filenameToStore = $filename . '_' . time() . '.' . $extension;

        // Get the public path with $filenameToStore
        // $publicPathWithFilename = public_path('storage/product/' . $filenameToStore);
        $publicPathWithFilename = 'slider/'.$filenameToStore;

        // Storage image
        $request->file('slider_image')->storeAs('public/slider', $filenameToStore);

        // Create path and Upload image
        Image::make(storage_path('app/public/slider/' . $filenameToStore))->resize(1200, 1200)->save(storage_path('app/public/slider/' . $filenameToStore));

        $slider = new Slider;
        $slider->image = $publicPathWithFilename;
        $slider->publication_status = $request->publication_status ? $request->publication_status : 0;
        $slider->save();

        return redirect()->back()->with('success', 'Slider was created successfully!');
    }

    public function status(Request $request)
    {
        $id = $request->id;
        $status = $request->status;
        $slider = Slider::findOrFail($id);
        $slider->publication_status = $status;
        $slider->update();

        return response([
            'slider' => $slider 
        ]);
    }

    public function destroy(Slider $slider)
    {
        $slider->delete();

        Session::flash('success', 'Brand was deleted successfully!');
        
        return response([
            'success' => true
        ]);
    }
}
