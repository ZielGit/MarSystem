@extends('layouts.app')
@section('title') {{ __('Edit User') }} @endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-3">{{ __('Edit User') }} </h4>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('users.update', $user) }}" method="post">
                @method('put')
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">{{ __('Name') }}</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ old('name', $user->name) }}">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">{{ __('Email') }}</label>
                    <input type="email" class="form-control" name="email" id="email" value="{{ old('email', $user->email) }}">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">{{ __('Password') }}</label>
                    <input type="password" class="form-control" name="password" id="password">
                </div>
                <div class="mb-3">
                    <label class="form-label">{{ __('Role') }}</label>
                    @foreach ($roles as $role)
                        <div class="form-check">
                            <label class="form-check-label" for="role_{{ $role->id }}">
                                <input type="radio" class="form-check-input" name="roles[]" id="role_{{ $role->id }}" value="{{ $role->id }}" {{ in_array($role->id, old('roles', $user->roles->pluck('id')->toArray())) ? ' checked' : '' }}>
                                {{ $role->name }}
                            </label>
                        </div> 
                    @endforeach
                </div>
                <button type="submit" class="btn btn-primary">{{ __('Edit') }}</button>
                <a href="{{ route('users.index') }}" class="btn btn-secondary float-end">{{ __('Cancel') }}</a>
            </form>
        </div>
    </div>
</div>
@endsection