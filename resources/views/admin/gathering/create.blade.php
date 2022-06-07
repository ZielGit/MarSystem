@extends('layouts.app')
@section('title') {{ __('Gathering Register') }} @endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-3">{{ __('Gathering Register') }} </h4>

    <form action="{{ route('gatherings.store') }}" method="post">
        @csrf
        <div class="card mb-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <label for="provider_id" class="form-label">{{ __('Provider') }}</label>
                        <select class="form-control" name="provider_id" id="provider_id">
                            <option value="" selected disabled>{{ __('Select a provider') }}</option>
                            @foreach ($providers as $provider)
                                <option value="{{ $provider->id }}">{{ $provider->name }}</option>
                            @endforeach
                        </select>
                        @error('provider_id')
                            <div class="alert alert-danger mt-2 mb-0" role="alert">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <label for="start_time" class="form-label">{{ __('Start Time') }}</label>
                        <input type="time" class="form-control" name="start_time" id="start_time">
                        @error('start_time')
                            <div class="alert alert-danger mt-2 mb-0" role="alert">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <label for="end_time" class="form-label">{{ __('End Time') }}</label>
                        <input type="time" class="form-control" name="end_time" id="end_time">
                        @error('end_time')
                            <div class="alert alert-danger mt-2 mb-0" role="alert">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-body">
                <button type="button" class="btn btn-dark float-end" data-bs-toggle="modal" data-bs-target="#productModal">{{ __('Add Product') }}</button>
                <table class="table">
                    <thead>
                        <tr>
                            {{-- <th>{{  }}</th> --}}
                            <th>{{ __('Product') }}</th>
                            <th>{{ __('Product Type') }}</th>
                            <th>{{ __('Packages') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="row"></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">{{ __('Create') }}</button>
        <a href="{{ route('gatherings.index') }}" class="btn btn-secondary float-end">{{ __('Cancel') }}</a>
    </form>
</div>
@endsection

@push('modals')
    <!-- Product Modal -->
    <div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="productModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('Add Product') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="product_id" class="form-label">{{ __('Product') }}</label>
                        <select class="form-select select2-product" name="product_id" id="product_id" data-placeholder="{{ __('Choose the product') }}">
                            <option value=""></option>
                            {{-- @foreach ($products as $product)
                                <option value="{{ $product->id }}" data-brands="{{ json_encode($product->brands) }}" data-services="{{ json_encode($product->services) }}">{{ $product->name }}</option>
                            @endforeach --}}
                        </select>
                        @error('product_id')
                            <div class="alert alert-danger mt-2 mb-0" role="alert">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="brand" class="form-label">{{ __('Product Type') }}</label>
                        <select class="form-select select2-brand" name="brand" id="brand"  data-placeholder="{{ __('Choose the brand') }}">
                            {{-- <option value=""></option> --}}
                        </select>
                        @error('brand_id')
                            <div class="alert alert-danger mt-2 mb-0" role="alert">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="packages" class="form-label">{{ __('Packages') }}</label>
                        <input type="number" class="form-control" name="packages" id="packages" min="0">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Close') }}</button>
                    <button type="button" class="btn btn-primary">{{ __('Add') }}</button>
                </div>
            </div>
        </div>
    </div>
@endpush

@push('scripts')
    
@endpush