@extends('layouts.app')
@section('title') {{ __('Gathering List') }} @endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-6">
            <h4 class="fw-bold py-3 mb-3">{{ __('Gathering') }} </h4>
        </div>
        <div class="col-lg-6">
            <a href="{{ route('gatherings.create') }}" class="btn btn-primary float-end mt-2">{{ __('Gathering Register') }}</a>
        </div>
    </div>
    
    <div class="card">
        <div class="card-body">
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>{{ __('ID') }}</th>
                            <th>{{ __('Provider') }}</th>
                            <th>{{ __('Overall Weight') }}</th>
                            <th>{{ __('Date') }}</th>
                            <th>{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($gatherings as $gathering)
                            <tr>
                                <td>{{ $gathering->id }}</td>
                                <td>{{ $gathering->provider->name }}</td>
                                <td>{{ $gathering->overall_weight }} Kg</td>
                                <td>{{ Carbon\Carbon::parse($gathering->created_at)->format('d-m-Y') }}</td>
                                <td>
                                    <a href="{{ route('gatherings.show', $gathering->id) }}" class="btn btn-info">{{ __('Details') }}</a>
                                    {{-- <a href="{{ route('gatherings.edit', $gathering->id) }}" class="btn btn-warning">{{ __('Edit') }}</a> --}}
                                    {{-- <form action="{{ route('gatherings.destroy', $gathering->id) }}" class="d-inline" method="post">
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