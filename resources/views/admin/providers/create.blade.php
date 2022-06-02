@extends('layouts.app')
@section('title') {{ __('Create Provider') }} @endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-3">{{ __('Create Provider') }} </h4>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('providers.store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label for="ruc" class="form-label">{{ __('RUC') }}</label>
                        <input type="number" class="form-control" name="ruc" id="ruc" value="{{ old('ruc') }}">
                        @error('ruc')
                            <div class="alert alert-danger mt-2 mb-0" role="alert">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="name" class="form-label">{{ __('Name') }}</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
                        @error('name')
                            <div class="alert alert-danger mt-2 mb-0" role="alert">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="email" class="form-label">{{ __('Email') }}</label>
                        <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text text-muted">{{ __('This is an optional field') }}</div>
                        @error('email')
                            <div class="alert alert-danger mt-2 mb-0" role="alert">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="phone" class="form-label">{{ __('Phone') }}</label>
                        <input type="tel" class="form-control" name="phone" id="phone" value="{{ old('phone') }}"  aria-describedby="phoneHelp">
                        <div id="phoneHelp" class="form-text text-muted">{{ __('This is an optional field') }}</div>
                        @error('phone')
                            <div class="alert alert-danger mt-2 mb-0" role="alert">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">{{ __('Create') }}</button>
                <a href="{{ route('providers.index') }}" class="btn btn-secondary float-end">{{ __('Cancel') }}</a>
            </form>
        </div>
    </div>
</div>
@endsection