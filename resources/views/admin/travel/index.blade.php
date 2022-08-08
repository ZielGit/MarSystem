@extends('layouts.app')
@section('title') {{ __('Travel List') }} @endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-6">
            <h4 class="fw-bold py-3 mb-3">{{ __('Travels') }} </h4>
        </div>
        <div class="col-lg-6">
            <a href="{{ route('travels.create') }}" class="btn btn-primary float-end mt-2">{{ __('Create New Travel') }}</a>
        </div>
    </div>
    
    <div class="card">
        <div class="card-body">
            <div class="table-responsive text-nowrap">
                <table class="table" id="table-travel">
                    <thead>
                        <tr>
                            <th>{{ __('ID') }}</th>
                            <th>{{ __('Driver') }}</th>
                            <th>{{ __('Origin') }}</th>
                            <th>{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($travels as $travel)
                            <tr>
                                <td>{{ $travel->id }}</td>
                                <td>{{ $travel->driver->name }}</td>
                                <td>{{ $travel->branchOffice->name }}</td>
                                <td>
                                    <a href="{{ route('travels.show', $travel->id) }}" class="btn btn-info">{{ __('Details') }}</a>
                                    <a href="{{ route('travels.edit', $travel->id) }}" class="btn btn-warning">{{ __('Edit') }}</a>
                                    <a href="{{ route('carrier.guide') }}" class="btn btn-success" target="_blank">{{ __('Carrier Guide') }}</a>
                                    {{-- <form action="{{ route('travels.destroy', $travel->id) }}" class="d-inline" method="post">
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

@push('scripts')
    <script>
        $(document).ready(function() {
            var table = $('#table-travel').DataTable( {
                lengthChange: false,
                buttons: [ 'excel', 'pdf' ]
            } );
        
            table.buttons().container()
                .appendTo( '#table-travel_wrapper .col-md-6:eq(0)' );
        } );
    </script>
@endpush