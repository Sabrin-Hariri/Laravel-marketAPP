<?php

namespace App\Http\Controllers;
use App\Models\Product; 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
 
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    
    //$product=Product::all();
        $product=Product::latest()->paginate(4); // المنتج الجديد رح يكون اول واحد عرض عند اليوزر 
        return view('products.index',compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('products.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // add the culmn to the database .
        $request->validate(
            [
               'name'=>'required',
               'price'=>'required',
               'info'=>'required'
            ]); 
        $product=prodect::create($request->all());
        //reveiw to the page "index" show all prodect"
        // with : to send masseg    
        return  redirect()->route('product.create')->with('success','add products');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return  view('product.show', compact('product'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
        return  view('product.edit', compact('product'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
        $request->validate(
            [
               'name'=>'required',
               'teacher'=>'required',
               'details'=>'required'
            ]); 
        $product=Product::update($request->all());
        //reveiw to the page "index" show all prodect"
        // with : to send masseg    
        return  redirect()->route('product.create')->with('success','update the products');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
