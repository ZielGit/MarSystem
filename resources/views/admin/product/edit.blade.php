@extends('layouts.app')
@section('title') {{ __('Edit Product') }} @endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-3">{{ __('Edit Product') }} </h4>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('products.update', $product) }}" method="post">
                @method('put')
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">{{ __('Name') }}</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ old('name', $product->name) }}">
                    @error('name')
                        <div class="alert alert-danger mt-2 mb-0" role="alert">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">{{ __('Edit') }}</button>
                <a href="{{ route('products.index') }}" class="btn btn-secondary float-end">{{ __('Cancel') }}</a>
            </form>
        </div>
    </div>
</div>
@endsection