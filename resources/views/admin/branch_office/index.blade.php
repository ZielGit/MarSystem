@extends('layouts.app')
@section('title') {{ __('Branch List') }} @endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-6">
            <h4 class="fw-bold py-3 mb-3">{{ __('Branch Offices') }} </h4>
        </div>
        <div class="col-lg-6">
            <a href="{{ route('branch.offices.create') }}" class="btn btn-primary float-end mt-2">{{ __('Create New Branch Office') }}</a>
        </div>
    </div>
    
    <div class="card">
        <div class="card-body">
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>{{ __('ID') }}</th>
                            <th>{{ __('Name') }}</th>
                            
                            <th>{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($branchOffices as $branchOffice)
                            <tr>
                                <td>{{ $branchOffice->id }}</td>
                                <td>{{ $branchOffice->name }}</td>
                                
                                <td>
                                    <a href="{{ route('branch.offices.show', $branchOffice->id) }}" class="btn btn-info">{{ __('Show') }}</a>
                                    <a href="{{ route('branch.offices.edit', $branchOffice->id) }}" class="btn btn-warning">{{ __('Edit') }}</a>
                                    {{-- <form action="{{ route('branchOffices.destroy', $branchOffice->id) }}" class="d-inline" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">{{ __('Delete') }}</button>
                                    </form> --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection