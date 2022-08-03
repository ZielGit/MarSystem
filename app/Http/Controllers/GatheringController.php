<?php

namespace App\Http\Controllers;

use App\Models\Gathering;
use App\Http\Requests\Admin\Gathering\StoreGatheringRequest;
use App\Http\Requests\Admin\Gathering\UpdateGatheringRequest;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\Provider;
use Illuminate\Support\Facades\Auth;

class GatheringController extends Controller
{
    public function index()
    {
        $gatherings = Gathering::get();
        return view('admin.gathering.index', compact('gatherings'));
    }

    public function create()
    {
        $providers = Provider::get();
        $products = Product::get();
        return view('admin.gathering.create', compact('providers', 'products'));
    }

    public function store(StoreGatheringRequest $request)
    {
        $gathering = Gathering::create($request->all()+[
            'user_id'=>Auth::user()->id
        ]);

        foreach ($request->product_type_id as $key => $product) {
            $result[] = array(
                "product_id" => $request->product_id[$key],
                "product_type_id" => $request->product_type_id[$key],
                "packages" => $request->packages[$key],
                "weight" => $request->weight[$key]
            );
            ProductType::where('id', $request->product_type_id[$key])->increment('stock', $request->weight[$key]);
        }
        
        $gathering->gatheringDetails()->createMany($result);
        return redirect()->route('gatherings.index');
    }

    public function show(Gathering $gathering)
    {
        $gatheringDetails = $gathering->gatheringDetails;

        // foreach ($gatheringDetails as $gatheringDetail) {
        //     # code...
        // }

        return view('admin.gathering.show', compact('gathering', 'gatheringDetails'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gathering  $gathering
     * @return \Illuminate\Http\Response
     */
    public function edit(Gathering $gathering)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGatheringRequest  $request
     * @param  \App\Models\Gathering  $gathering
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGatheringRequest $request, Gathering $gathering)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gathering  $gathering
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gathering $gathering)
    {
        //
    }
}
