@extends('layouts.app')
@section('title') {{ __('Product Type List') }} @endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-6">
            <h4 class="fw-bold py-3 mb-3">{{ __('Types of Products') }} </h4>
        </div>
        <div class="col-lg-6">
            <a href="{{ route('product.types.create') }}" class="btn btn-primary float-end mt-2">{{ __('Create New Type') }}</a>
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
                            <th>{{ __('Product') }}</th>
                            <th>{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($product_types as $product_type)
                            <tr>
                                <td>{{ $product_type->id }}</td>
                                <td>{{ $product_type->name }}</td>
                                <td>{{ $product_type->product->name }}</td>
                                <td>
                                    {{-- <a href="{{ route('product.types.show', $product_type->id) }}" class="btn btn-info">{{ __('Show') }}</a> --}}
                                    <a href="{{ route('product.types.edit', $product_type->id) }}" class="btn btn-warning">{{ __('Edit') }}</a>
                                    {{-- <form action="{{ route('products.destroy', $product->id) }}" class="d-inline" method="post">
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