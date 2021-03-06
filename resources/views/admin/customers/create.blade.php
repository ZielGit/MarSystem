@extends('layouts.app')
@section('title') {{ __('Create Customer') }} @endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-3">{{ __('Create Customer') }} </h4>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('customers.store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label for="document_type" class="form-label">{{ __('Document Type') }}</label>
                        <select class="form-control" name="document_type" id="document_type">
                            <option value="RUC">{{ __('RUC') }}</option>
                            <option value="DNI">{{ __('DNI') }}</option>
                        </select>
                        @error('document_type')
                            <div class="alert alert-danger mt-2 mb-0" role="alert">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="document_number" class="form-label">{{ __('Document Number') }}</label>
                        <div class="input-group">
                            <input type="number" class="form-control" name="document_number" id="document_number" min="0" value="{{ old('document_number') }}" aria-describedby="buttonSearch"/>
                            <button class="btn btn-warning" type="button" id="buttonSearch">{{ __('Search') }}</button>
                        </div>
                        @error('document_number')
                            <div class="alert alert-danger mt-2 mb-0" role="alert">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="name" class="form-label">{{ __('Name - Business Name') }}</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
                        @error('name')
                            <div class="alert alert-danger mt-2 mb-0" role="alert">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="type" class="form-label">{{ __('Type') }}</label>
                        <select class="form-control" name="type" id="type">
                            <option value="store">{{ __('Store') }}</option>
                            <option value="municipality">{{ __('Municipality') }}</option>
                        </select>
                        @error('type')
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
                    <div class="mb-3 col-md-6">
                        <label for="address" class="form-label">{{ __('Address') }}</label>
                        <input type="text" class="form-control" name="address" id="address" value="{{ old('address') }}"  aria-describedby="addressHelp">
                        <div id="addressHelp" class="form-text text-muted">{{ __('This is an optional field') }}</div>
                        @error('address')
                            <div class="alert alert-danger mt-2 mb-0" role="alert">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">{{ __('Create') }}</button>
                <a href="{{ route('customers.index') }}" class="btn btn-secondary float-end">{{ __('Cancel') }}</a>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script>
        "use strict"
        
        $('#buttonSearch').click(function(){
            var document_type = $('#document_type');
            var document_number = $('#document_number');
            $.ajax({
                url: "{{ route('search') }}",
                method: 'GET',
                data: {
                    document_type: document_type.val(),
                    document_number: document_number.val(),
                },
                dataType: 'json',
                success:function(data){
                    $('#name').val(data.nombre);
                }
            });
        });
    </script>
@endpush