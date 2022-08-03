<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\ProductType\StoreProductTypeRequest;
use App\Http\Requests\Admin\ProductType\UpdateProductTypeRequest;
use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Http\Request;

class ProductTypeController extends Controller
{
    public function index()
    {
        $product_types = ProductType::get();
        $products = Product::get();
        return view('admin.product_type.index', compact('product_types', 'products'));
    }

    public function create()
    {
        $products = Product::get();
        return view('admin.product_type.create', compact('products'));
    }

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

    public function edit(ProductType $product_type)
    {
        $products = Product::get();
        return view('admin.product_type.edit', compact('product_type', 'products'));
    }

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

    public function get_stock(Request $request)
    {
        if ($request->ajax()) {
            $products_type = ProductType::findOrFail($request->product_type_id);
            return response()->json($products_type);
        }
    }
}
