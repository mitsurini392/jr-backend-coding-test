<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(3);
        return view('products.index',['products' => $products]);
    }

    public function create()
    {
        $edit = 0;
        return view('products.edit-add',['edit'=> $edit]);
    }

    public function edit($id)
    {
        $edit = 1;
        $product = Product::find($id);
        return view('products.edit-add',['edit'=> $edit,'product' => $product]);
    }

    public function update(Request $request,$id)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'desc' => 'required',
            'price' => 'required|regex:/^\d+(\.\d{1,2})?$/'
        ]);

        $product = Product::find($id);
        $product->name = $request->name;
        $product->description = $request->desc;
        $product->price = $request->price;
        $product->save();
        return redirect()->route('products.index');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'desc' => 'required',
            'price' => 'required|regex:/^\d+(\.\d{1,2})?$/'
        ]);

        $product = new Product;
        $product->name = $request->name;
        $product->description = $request->desc;
        $product->price = $request->price;
        $product->save();
        return redirect()->route('products.index');
    }

    public function delete($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('products.index');
    }

    public function show($id)
    {
        //
    }
}
