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
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label for="dni" class="form-label">{{ __('DNI') }}</label>
                        <input type="number" class="form-control" name="dni" id="dni" min="0" value="{{ old('dni', $user->dni) }}">
                        @error('dni')
                            <div class="alert alert-danger mt-2 mb-0" role="alert">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="name" class="form-label">{{ __('Name') }}</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ old('name', $user->name) }}">
                        @error('name')
                            <div class="alert alert-danger mt-2 mb-0" role="alert">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="email" class="form-label">{{ __('Email') }}</label>
                        <input type="email" class="form-control" name="email" id="email" value="{{ old('email', $user->email) }}">
                        @error('email')
                            <div class="alert alert-danger mt-2 mb-0" role="alert">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3 col-md-6 statusShift">
                        <label for="shift" class="form-label">{{ __('Shift') }}</label>
                        <select class="form-control" name="shift" id="shift">
                            <option value="complete" {{ (($user->shift == 'complete') ? 'selected' : '') }}>{{ __('Complete') }}</option>
                            <option value="morning" {{ (($user->shift == 'morning') ? 'selected' : '') }}>{{ __('Morning') }}</option>
                            <option value="afternoon" {{ (($user->shift == 'afternoon') ? 'selected' : '') }}>{{ __('Afternoon') }}</option>
                        </select>
                        @error('shift')
                            <div class="alert alert-danger mt-2 mb-0" role="alert">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label">{{ __('Role') }}</label>
                        <select class="form-control" name="roles[]" id="roles">
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}" {{ (in_array($role->id, old('roles', [])) || $user->roles->contains($role->id)) ? 'selected' : '' }}>{{ $role->name }}</option>
                            @endforeach
                        </select>
                        @error('roles')
                            <div class="alert alert-danger mt-2 mb-0" role="alert">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="business" class="form-label">{{ __('Business') }}</label>
                        <select class="form-control" name="business" id="business">
                            <option value="main" {{ (($user->business == 'main') ? 'selected' : '') }}>{{ __('Main') }}</option>
                            <option value="branch_office" {{ (($user->business == 'branch_office') ? 'selected' : '') }}>{{ __('Branch Office') }}</option>
                        </select>
                        @error('business')
                            <div class="alert alert-danger mt-2 mb-0" role="alert">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">{{ __('Edit') }}</button>
                <a href="{{ route('users.index') }}" class="btn btn-secondary float-end">{{ __('Cancel') }}</a>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script>
        "use strict"
        // $(".statusShift").hide();

        // Mostrar si es operario que es el id = 3
        // $("input[type='radio']").click(function() {
        //     var shift = $(this).val();
        //     if (shift == "3") {
        //         $(".statusShift").show();
        //     } else {
        //         $(".statusShift").hide();
        //         // Para limpiar tenemos que llamar denuevo en el if
        //         // Otra solucion crear un option value vacio y ponerlo por defecto
        //         // $("#shift").empty();
        //     }
        // });
    </script>
@endpush