<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\ProductType\StoreProductTypeRequest;
use App\Http\Requests\Admin\ProductType\UpdateProductTypeRequest;
use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Http\Request;

class ProductTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product_types = ProductType::get();
        $products = Product::get();
        return view('admin.product_type.index', compact('product_types', 'products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::get();
        return view('admin.product_type.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductTypeRequest $request)
    {
        ProductType::create($request->all());
        return redirect()->route('product.types.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductType  $product_types
     * @return \Illuminate\Http\Response
     */
    public function show(ProductType $product_type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductType  $product_type
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductType $product_type)
    {
        $products = Product::get();
        return view('admin.product_type.edit', compact('product_type', 'products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @param  \App\Models\ProductType  $product_type
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductTypeRequest $request, ProductType $product_type)
    {
        $product_type->update($request->all());
        return redirect()->route('product.types.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductType  $product_type
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductType $product_type)
    {
        //
    }
}
