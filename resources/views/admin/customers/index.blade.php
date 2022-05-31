@extends('layouts.app')
@section('title') {{ __('Customers List') }} @endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-6">
            <h4 class="fw-bold py-3 mb-3">{{ __('Customers') }} </h4>
        </div>
        <div class="col-lg-6">
            <a href="{{ route('customers.create') }}" class="btn btn-primary float-end mt-2">{{ __('Create New Customer') }}</a>
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
                            <th>{{ __('Document Type') }}</th>
                            <th>{{ __('Document Number') }}</th>
                            <th>{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($customers as $customer)
                            <tr>
                                <td>{{ $customer->id }}</td>
                                <td>{{ $customer->name }}</td>
                                <td>{{ $customer->document_type }}</td>
                                <td>{{ $customer->document_number }}</td>
                                <td>
                                    <a href="{{ route('customers.show', $customer->id) }}" class="btn btn-info">{{ __('Show') }}</a>
                                    <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-warning">{{ __('Edit') }}</a>
                                    <form action="{{ route('customers.destroy', $customer->id) }}" class="d-inline" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">{{ __('Delete') }}</button>
                                    </form>
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