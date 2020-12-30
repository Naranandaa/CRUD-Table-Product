<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $data_product = \App\Models\Product::all();
        return view('product.index',['data_product' => $data_product]);
    }
    
    public function create(Request $request)
    {
        $this->validate($request,[
            'product_code' => 'required',
            'product_name' => 'required',
            'stock' => 'required'
        ]);

        \App\Models\Product::create($request->all());
        return redirect('/product')->with('sukses','Data berhasil diinput');
    }

    public function edit($id)
    {
        $product = \App\Models\Product::find($id);
        return view('product/edit',['product' =>$product]);
    }

    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'product_code' => 'required',
            'product_name' => 'required',
            'stock' => 'required'
        ]);
        
        $product = \App\Models\Product::find($id);
        $product->update($request->all());
        return redirect('/product')->with('sukses','Data berhasil diupdate');
    }

    public function delete($id)
    {
        $product = \App\Models\Product::find($id);
        $product->delete($product);
        return redirect('/product')->with('sukses','Data berhasil di delete');
    }
}
