@extends('layouts.app')
@section('title') {{ __('Create User') }} @endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-3">{{ __('Create User') }} </h4>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('users.store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">{{ __('Name') }}</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
                    @error('name')
                        <div class="alert alert-danger mt-2 mb-0" role="alert">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">{{ __('Email') }}</label>
                    <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}">
                    @error('email')
                        <div class="alert alert-danger mt-2 mb-0" role="alert">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">{{ __('Password') }}</label>
                    <input type="password" class="form-control" name="password" id="password">
                    @error('password')
                        <div class="alert alert-danger mt-2 mb-0" role="alert">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">{{ __('Roles') }}</label>
                    @foreach ($roles as $role)
                        <div class="form-check">
                            <label class="form-check-label" for="role_{{ $role->id }}">
                                <input type="radio" class="form-check-input" name="roles[]" id="role_{{ $role->id }}" value="{{ $role->id }}">
                                {{ $role->name }}
                            </label>
                        </div>
                    @endforeach
                    @error('roles')
                        <div class="alert alert-danger mt-2 mb-0" role="alert">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">{{ __('Create') }}</button>
                <a href="{{ route('users.index') }}" class="btn btn-secondary float-end">{{ __('Cancel') }}</a>
            </form>
        </div>
    </div>
</div>
@endsection