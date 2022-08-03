@extends('layouts.app')
@section('title') {{ __('Release List') }} @endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-6">
            <h4 class="fw-bold py-3 mb-3">{{ __('Release') }} </h4>
        </div>
        <div class="col-lg-6">
            <a href="{{ route('releases.create') }}" class="btn btn-primary float-end mt-2">{{ __('Create New Release') }}</a>
        </div>
    </div>
    
    <div class="card">
        <div class="card-body">
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>{{ __('ID') }}</th>
                            <th>{{ __('Customer') }}</th>
                            <th>{{ __('Product Type') }}</th>
                            <th>{{ __('Quantity Released') }}</th>
                            <th>{{ __('Date') }}</th>
                            <th>{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($releases as $release)
                            <tr>
                                <td>{{ $release->id }}</td>
                                <td>{{ $release->customer->name }}</td>
                                <td>{{ $release->productType->name }}</td>
                                <td>{{ $release->quantity_released }}</td>
                                <td>{{ $release->created_at }}</td>
                                <td>
                                    <a href="{{ route('releases.show', $release->id) }}" class="btn btn-info">{{ __('Details') }}</a>
                                    <a href="{{ route('releases.edit', $release->id) }}" class="btn btn-warning">{{ __('Edit') }}</a>
                                    {{-- <form action="{{ route('releases.destroy', $release->id) }}" class="d-inline" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">{{ __('Delete') }}</button>
                                    </form> --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection