@extends('layouts.app')
@section('title') {{ __('Edit Customer') }} @endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-3">{{ __('Edit Customer') }} </h4>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('customers.update', $customer) }}" method="post">
                @method('put')
                @csrf
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label for="name" class="form-label">{{ __('Name') }}</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ old('name', $customer->name) }}">
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="email" class="form-label">{{ __('Email') }}</label>
                        <input type="email" class="form-control" name="email" id="email" value="{{ old('email', $customer->email) }}" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text text-muted">{{ __('This is an optional field') }}</div>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="document_type" class="form-label">{{ __('Document Type') }}</label>
                        <select class="form-control" name="document_type" id="document_type">
                            <option value="RUC" {{ (($customer->document_type == 'RUC')? 'selected' : '') }}>{{ __('RUC') }}</option>
                            <option value="DNI" {{ (($customer->document_type == 'DNI')? 'selected' : '') }}>{{ __('DNI') }}</option>
                        </select>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="document_number" class="form-label">{{ __('Document Number') }}</label>
                        <input type="number" class="form-control" name="document_number" id="document_number" value="{{ old('document_number', $customer->document_number) }}">
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="phone" class="form-label">{{ __('Phone') }}</label>
                        <input type="number" class="form-control" name="phone" id="phone" value="{{ old('phone', $customer->phone) }}"  aria-describedby="phoneHelp">
                        <div id="phoneHelp" class="form-text text-muted">{{ __('This is an optional field') }}</div>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="address" class="form-label">{{ __('Address') }}</label>
                        <input type="text" class="form-control" name="address" id="address" value="{{ old('address', $customer->address) }}"  aria-describedby="addressHelp">
                        <div id="addressHelp" class="form-text text-muted">{{ __('This is an optional field') }}</div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">{{ __('Edit') }}</button>
                <a href="{{ route('customers.index') }}" class="btn btn-secondary float-end">{{ __('Cancel') }}</a>
            </form>
        </div>
    </div>
</div>
@endsection