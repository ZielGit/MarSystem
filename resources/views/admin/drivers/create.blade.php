@extends('layouts.app')
@section('title') {{ __('Create Driver') }} @endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-3">{{ __('Create Driver') }} </h4>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('drivers.store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label for="name" class="form-label">{{ __('Name') }}</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
                        @error('name')
                            <div class="alert alert-danger mt-2 mb-0" role="alert">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="phone" class="form-label">{{ __('Phone') }}</label>
                        <input type="tel" class="form-control" name="phone" id="phone" value="{{ old('phone') }}">
                        @error('phone')
                            <div class="alert alert-danger mt-2 mb-0" role="alert">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="license_plate" class="form-label">{{ __('License Plate') }}</label>
                        <input type="text" class="form-control" name="license_plate" id="license_plate" value="{{ old('license_plate') }}">
                        @error('license_plate')
                            <div class="alert alert-danger mt-2 mb-0" role="alert">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="freighter" class="form-label">{{ __('Freighter') }}</label>
                        <input type="text" class="form-control" name="freighter" id="freighter" value="{{ old('freighter') }}">
                        @error('freighter')
                            <div class="alert alert-danger mt-2 mb-0" role="alert">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="license" class="form-label">{{ __('License') }}</label>
                        <input type="text" class="form-control" name="license" id="license" value="{{ old('license') }}">
                        @error('license')
                            <div class="alert alert-danger mt-2 mb-0" role="alert">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">{{ __('Create') }}</button>
                <a href="{{ route('drivers.index') }}" class="btn btn-secondary float-end">{{ __('Cancel') }}</a>
            </form>
        </div>
    </div>
</div>
@endsection