<?php

namespace App\Http\Controllers;

use App\Models\BranchOffice;
use App\Http\Requests\Admin\BranchOffice\StoreBranchOfficeRequest;
use App\Http\Requests\Admin\BranchOffice\UpdateBranchOfficeRequest;

class BranchOfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $branchOffices = BranchOffice::get();
        return view('admin.branch_office.index', compact('branchOffices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.branch_office.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBranchOfficeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBranchOfficeRequest $request)
    {
        BranchOffice::create($request->all());
        return redirect()->route('branch.offices.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BranchOffice  $branchOffice
     * @return \Illuminate\Http\Response
     */
    public function show(BranchOffice $branchOffice)
    {
        return view('admin.branch_office.show', compact('branchOffice'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BranchOffice  $branchOffice
     * @return \Illuminate\Http\Response
     */
    public function edit(BranchOffice $branchOffice)
    {
        return view('admin.branch_office.edit', compact('branchOffice'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBranchOfficeRequest  $request
     * @param  \App\Models\BranchOffice  $branchOffice
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBranchOfficeRequest $request, BranchOffice $branchOffice)
    {
        $branchOffice->update($request->all());
        return redirect()->route('branch.offices.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BranchOffice  $branchOffice
     * @return \Illuminate\Http\Response
     */
    public function destroy(BranchOffice $branchOffice)
    {
        //
    }
}
