<?php

namespace App\Http\Controllers;

use App\Models\BranchOffice;
use App\Http\Requests\Admin\BranchOffice\StoreBranchOfficeRequest;
use App\Http\Requests\Admin\BranchOffice\UpdateBranchOfficeRequest;

class BranchOfficeController extends Controller
{
    public function index()
    {
        $branchOffices = BranchOffice::get();
        return view('admin.branch_office.index', compact('branchOffices'));
    }

    public function create()
    {
        return view('admin.branch_office.create');
    }

    public function store(StoreBranchOfficeRequest $request)
    {
        BranchOffice::create($request->all());
        return redirect()->route('branch.offices.index');
    }

    public function show(BranchOffice $branchOffice)
    {
        return view('admin.branch_office.show', compact('branchOffice'));
    }

    public function edit(BranchOffice $branchOffice)
    {
        return view('admin.branch_office.edit', compact('branchOffice'));
    }

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
