@extends('layouts.app')
@section('title') {{ __('Create User') }} @endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-3">{{ __('Create User') }} </h4>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('users.store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label for="dni" class="form-label">{{ __('DNI') }}</label>
                        <div class="input-group">
                            <input type="number" class="form-control" name="dni" id="dni" min="0" value="{{ old('dni') }}" aria-describedby="buttonSearch"/>
                            <button class="btn btn-warning" type="button" id="buttonSearch">{{ __('Search') }}</button>
                        </div>
                        @error('dni')
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
                        <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}">
                        @error('email')
                            <div class="alert alert-danger mt-2 mb-0" role="alert">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="password" class="form-label">{{ __('Password') }}</label>
                        <input type="password" class="form-control" name="password" id="password">
                        @error('password')
                            <div class="alert alert-danger mt-2 mb-0" role="alert">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="shift" class="form-label">{{ __('Shift') }}</label>
                        <select class="form-control" name="shift" id="shift">
                            <option value="" disabled selected>{{ __('Select a shift') }}</option>
                            <option value="complete">{{ __('Complete') }}</option>
                            <option value="morning">{{ __('Morning') }}</option>
                            <option value="afternoon">{{ __('Afternoon') }}</option>
                        </select>
                        @error('shift')
                            <div class="alert alert-danger mt-2 mb-0" role="alert">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label">{{ __('Role') }}</label>
                        <select class="form-control" name="roles[]" id="roles">
                            <option value="" disabled selected>{{ __('Select a role') }}</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}" {{ in_array( $role->id, old('roles', [])) ? ' selected' : '' }}>{{ $role->name }}</option>
                            @endforeach
                        </select>
                        @error('roles')
                            <div class="alert alert-danger mt-2 mb-0" role="alert">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="business" class="form-label">{{ __('Business') }}</label>
                        <select class="form-control" name="business" id="business">
                            <option value="" disabled selected>{{ __('Select an option') }}</option>
                            <option value="main">{{ __('Main') }}</option>
                            <option value="branch_office">{{ __('Branch Office') }}</option>
                        </select>
                        @error('business')
                            <div class="alert alert-danger mt-2 mb-0" role="alert">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6" id="branch_offices">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">{{ __('Create') }}</button>
                <a href="{{ route('users.index') }}" class="btn btn-secondary float-end">{{ __('Cancel') }}</a>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script>
        "use strict"
        
        $('#buttonSearch').click(function(){
            var dni = $('#dni');
            $.ajax({
                url: "{{ route('search.dni') }}",
                method: 'GET',
                data: {
                    dni: dni.val(),
                },
                dataType: 'json',
                success:function(data){
                    $('#name').val(data.nombre);
                }
            });
        });

        $("#business").change(function (e) { 
            var business = $(this).val();
            if (business == "branch_office") {
                $(this).parent().parent().children("#branch_offices").html(
                    '<label for="branch_office_id" class="form-label">{{ __('Branch Office') }}</label>'+
                    '<select class="form-control" name="branch_office_id" id="branch_office_id">'+
                        '<option value="" disabled selected>{{ __('Select a branch office') }}</option>'+
                        '@foreach ($branchOffices as $branchOffice)'+
                            '<option value="{{ $branchOffice->id }}">{{ $branchOffice->name }}</option>'+
                        '@endforeach'+
                    '</select>'+
                    '@error('branch_office_id')'+
                        '<div class="alert alert-danger mt-2 mb-0" role="alert">{{ $message }}</div>'+
                    '@enderror'
                )
            } else {
                $(this).parent().parent().children("#branch_offices").html('')
            }
        });
    </script>
@endpush