@extends('layouts.app')
@section('title') {{ __('Create Trip') }} @endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-3">{{ __('Create Trip') }} </h4>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('travels.store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label for="driver_id" class="form-label">{{ __('Driver') }}</label>
                        <select class="form-control" name="driver_id" id="driver_id">
                            <option value="" selected disabled>{{ __('Select a driver') }}</option>
                            @foreach ($drivers as $driver)
                                <option value="{{ $driver->id }}">{{ $driver->name }}</option>
                            @endforeach
                        </select>
                        @error('driver_id')
                            <div class="alert alert-danger mt-2 mb-0" role="alert">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-3">
                        <label for="departure_date" class="form-label">{{ __('Departure Date') }}</label>
                        <input type="date" class="form-control" name="departure_date" id="departure_date">
                        @error('departure_date')
                            <div class="alert alert-danger mt-2 mb-0" role="alert">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-3">
                        <label for="arrival_date" class="form-label">{{ __('Arrival Date') }}</label>
                        <input type="date" class="form-control" name="arrival_date" id="arrival_date">
                        @error('arrival_date')
                            <div class="alert alert-danger mt-2 mb-0" role="alert">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <h5 class="card-title">
                    <div class="row">
                        <div class="col-md-6 mt-2">
                            {{ __('Destinations') }}
                        </div>
                        <div class="col-md-6">
                            <button type="button" class="btn btn-dark float-end" data-bs-toggle="modal" data-bs-target="#destinationModal">{{ __('Add Destination') }}</button>
                        </div>
                    </div>
                </h5>
                <div class="table-responsive text-nowrap mb-3">
                    <table class="table" id="details">
                        <thead>
                            <tr>
                                <th>{{ __('Customer') }}</th>
                                <th>{{ __('Product') }}</th>
                                <th>{{ __('Product Type') }}</th>
                                <th>{{ __('Weight') }}</th>
                                <th>{{ __('Total Price') }}</th>
                                <th>{{ __('Delete') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <button type="submit" class="btn btn-primary">{{ __('Create') }}</button>
                <a href="{{ route('travels.index') }}" class="btn btn-secondary float-end">{{ __('Cancel') }}</a>
            </form>
        </div>
    </div>
</div>
@endsection