@extends('layouts.app')
@section('title') {{ __('List of Providers') }} @endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-6">
            <h4 class="fw-bold py-3 mb-3">{{ __('Providers') }} </h4>
        </div>
        <div class="col-lg-6">
            <a href="{{ route('providers.create') }}" class="btn btn-primary float-end mt-2">{{ __('Create New Provider') }}</a>
        </div>
    </div>
    
    <div class="card">
        <div class="card-body">
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>{{ __('ID') }}</th>
                            <th>{{ __('Name') }}</th>
                            <th>{{ __('RUC') }}</th>
                            <th>{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($providers as $provider)
                            <tr>
                                <td>{{ $provider->id }}</td>
                                <td>{{ $provider->name }}</td>
                                <td>{{ $provider->ruc }}</td>
                                <td>
                                    <a href="{{ route('providers.show', $provider->id) }}" class="btn btn-info">{{ __('Show') }}</a>
                                    <a href="{{ route('providers.edit', $provider->id) }}" class="btn btn-warning">{{ __('Edit') }}</a>
                                    {{-- <form action="{{ route('providers.destroy', $provider->id) }}" class="d-inline" method="post">
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