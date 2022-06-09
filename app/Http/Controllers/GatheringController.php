<?php

namespace App\Http\Controllers;

use App\Models\Gathering;
use App\Http\Requests\Admin\Gathering\StoreGatheringRequest;
use App\Http\Requests\Admin\Gathering\UpdateGatheringRequest;
use App\Models\Product;
use App\Models\Provider;
use Illuminate\Support\Facades\Auth;

class GatheringController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gatherings = Gathering::get();
        return view('admin.gathering.index', compact('gatherings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $providers = Provider::get();
        $products = Product::get();
        return view('admin.gathering.create', compact('providers', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreGatheringRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGatheringRequest $request)
    {
        $gathering = Gathering::create($request->all()+[
            'user_id'=>Auth::user()->id
        ]);

        foreach ($request->product_id as $key => $product) {
            $result[] = array(
                "product_id"=>$request->product_id[$key],
                "product_type_id"=>$request->product_type_id[$key],
                "packages"=>$request->packages[$key]
            );
        }

        $gathering->gatheringDetails()->createMany($result);
        return redirect()->route('gatherings.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gathering  $gathering
     * @return \Illuminate\Http\Response
     */
    public function show(Gathering $gathering)
    {
        //
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
