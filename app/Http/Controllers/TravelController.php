<?php

namespace App\Http\Controllers;

use App\Models\Travel;
use App\Http\Requests\Admin\Travel\StoreTravelRequest;
use App\Http\Requests\Admin\Travel\UpdateTravelRequest;
use App\Models\BranchOffice;
use App\Models\Customer;
use App\Models\Driver;
use App\Models\Product;

class TravelController extends Controller
{
    public function index()
    {
        $travels = Travel::get();
        return view('admin.travel.index', compact('travels'));
    }

    public function create()
    {
        $drivers = Driver::get();
        $branchOffices = BranchOffice::get();
        $customers = Customer::get();
        $products = Product::get();
        return view('admin.travel.create', compact('drivers', 'branchOffices', 'customers', 'products'));
    }

    public function store(StoreTravelRequest $request)
    {
        $travel = Travel::create($request->all());

        foreach ($request->customer_id as $key => $customer) {
            $result[] = array(
                'customer_id' => $request->customer_id[$key],
                'product_id' => $request->product_id[$key],
                'product_type_id' => $request->product_type_id[$key],
                'weight' => $request->weight[$key],
                'price_kilo' => $request->price_kilo[$key],
                'total_price' => $request->total_price[$key]
            );
        }

        $travel->travelDetails()->createMany($result);
        return redirect()->route('travels.index');
    }

    public function show(Travel $travel)
    {
        return view('admin.travel.show', compact('travel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Travel  $travel
     * @return \Illuminate\Http\Response
     */
    public function edit(Travel $travel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTravelRequest  $request
     * @param  \App\Models\Travel  $travel
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTravelRequest $request, Travel $travel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Travel  $travel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Travel $travel)
    {
        //
    }
}
