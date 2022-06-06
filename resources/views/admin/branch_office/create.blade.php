@extends('layouts.app')
@section('title') {{ __('Create Branch Office') }} @endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-3">{{ __('Create Branch Office') }} </h4>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('branch.offices.store') }}" method="post">
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
                        <label for="department" class="form-label">{{ __('Department') }}</label>
                        <input type="text" class="form-control" name="department" id="department" value="{{ old('department') }}">
                        @error('department')
                            <div class="alert alert-danger mt-2 mb-0" role="alert">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="province" class="form-label">{{ __('Province') }}</label>
                        <input type="text" class="form-control" name="province" id="province" value="{{ old('province') }}">
                        @error('province')
                            <div class="alert alert-danger mt-2 mb-0" role="alert">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="district" class="form-label">{{ __('District') }}</label>
                        <input type="text" class="form-control" name="district" id="district" value="{{ old('district') }}">
                        @error('district')
                            <div class="alert alert-danger mt-2 mb-0" role="alert">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="address" class="form-label">{{ __('Address') }}</label>
                        <input type="text" class="form-control" name="address" id="address" value="{{ old('address') }}">
                        @error('address')
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
                <a href="{{ route('branch.offices.index') }}" class="btn btn-secondary float-end">{{ __('Cancel') }}</a>
            </form>
        </div>
    </div>
</div>
@endsection