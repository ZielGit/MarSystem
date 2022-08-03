<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\Release\StoreReleaseRequest;
use App\Models\Customer;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\Release;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReleaseController extends Controller
{
    public function index()
    {
        $releases = Release::get();
        return view('admin.release.index', compact('releases'));
    }

    public function create()
    {
        $customers = Customer::get();
        $products = Product::get();
        return view('admin.release.create', compact('customers', 'products'));
    }

    public function store(StoreReleaseRequest $request)
    {
        Release::create($request->all()+[
            'user_id'=>Auth::user()->id,
        ]);

        ProductType::where('id', $request->product_type_id)->decrement('stock', $request->quantity_released);

        return redirect()->route('releases.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Release  $release
     * @return \Illuminate\Http\Response
     */
    public function show(Release $release)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Release  $release
     * @return \Illuminate\Http\Response
     */
    public function edit(Release $release)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Release  $release
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Release $release)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Release  $release
     * @return \Illuminate\Http\Response
     */
    public function destroy(Release $release)
    {
        //
    }
}
