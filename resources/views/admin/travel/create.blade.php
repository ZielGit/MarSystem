@extends('layouts.app')
@section('title') {{ __('Create Trip') }} @endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-3">{{ __('Create Trip') }} </h4>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('travels.store') }}" method="post">
                @csrf
                {{-- <div class="mb-3">
                    <label for="name" class="form-label">{{ __('Name') }}</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
                    @error('name')
                        <div class="alert alert-danger mt-2 mb-0" role="alert">{{ $message }}</div>
                    @enderror
                </div> --}}
                <button type="submit" class="btn btn-primary">{{ __('Create') }}</button>
                <a href="{{ route('travels.index') }}" class="btn btn-secondary float-end">{{ __('Cancel') }}</a>
            </form>
        </div>
    </div>
</div>
@endsection