<?php

namespace App\Http\Controllers;

use Image;
use App\Product;
use App\Category;
use App\Manufacture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::paginate(15);
        return view('admin.product.index', [
            'products' => $products
        ]);
    }

    public function create()
    {
        $categories = Category::where('publication_status', 1)->get();
        $brands = Manufacture::where('publication_status', 1)->get();
        return view('admin.product.create', [
            'categories' => $categories,
            'brands' => $brands
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'product_name' => 'required|min:3|unique:manufactures,name',
            'product_price' => 'required|numeric',
            'product_image' => 'required|max:1999',
            'product_size' => 'required',
            'product_color' => 'required',
            // 'publication_status' => 'required',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:manufactures,id',
        ]);

        // if($request->file('product_image'))
        // {
        //     foreach($request->file('product_image') as $image)
        //     {
        //         // Get filename with extension
        //         $filenameWithExt = $image->getClientOriginalName();

        //         // Get just the filename
        //         $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

        //         // Get extension
        //         $extension = $image->getClientOriginalExtension();

        //         // Create new filename
        //         $filenameToStore = $filename . '_' . time() . '.' . $extension;

        //         // Get the public path with $filenameToStore
        //         $publicPathWithFilename = public_path('storage/product/' . $filenameToStore);

        //         // Storage image
        //         $image->storeAs('public/product', $filenameToStore);

        //         // Create path and Upload image
        //         Image::make(storage_path('app/public/product/' . $filenameToStore))->resize(1200, 1200)->save(storage_path('app/public/product/' . $filenameToStore));
        //     }

        // }

        // Get filename with extension
        $filenameWithExt = $request->file('product_image')->getClientOriginalName();

        // Get just the filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

        // Get extension
        $extension = $request->file('product_image')->getClientOriginalExtension();

        // Create new filename
        $filenameToStore = $filename . '_' . time() . '.' . $extension;

        // Get the public path with $filenameToStore
        // $publicPathWithFilename = public_path('storage/product/' . $filenameToStore);
        $publicPathWithFilename = 'product/'.$filenameToStore;

        // Storage image
        $request->file('product_image')->storeAs('public/product', $filenameToStore);

        // Create path and Upload image
        Image::make(storage_path('app/public/product/' . $filenameToStore))->resize(1200, 1200)->save(storage_path('app/public/product/' . $filenameToStore));

        $product = new Product;
        $product->name = ucfirst($request->product_name);
        $product->short_description = ucfirst($request->product_short_description);
        $product->long_description = ucfirst($request->product_long_description);
        $product->price = $request->product_price;
        $product->image = $publicPathWithFilename;
        $product->size = $request->product_size;
        $product->color = ucfirst($request->product_color);
        $product->publication_status = $request->publication_status ? $request->publication_status : false;
        // $request->publication_status ?? $product->publication_status = $request->publication_status;
        $product->category_id = $request->category_id;
        $product->manufacture_id = $request->brand_id;
        $product->save();

        return redirect()->back()->with('success', 'Product was created successfully!');
    }

    public function status(Request $request)
    {
        $id = $request->id;
        $status = $request->status;
        $product = Product::findOrFail($id);
        $product->publication_status = $status;
        $product->update();

        return response([
            'product' => $product 
        ]);
    }

    public function destroy(Product $product)
    {
        $product->delete();

        Session::flash('success', 'Brand was deleted successfully!');
        
        return response([
            'success' => true
        ]);
    }
}
