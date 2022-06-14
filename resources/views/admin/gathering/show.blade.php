@extends('layouts.app')
@section('title') {{ __('Gathering Details') }} @endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-3">{{ __('Gathering Details') }} </h4>

    <div class="card mb-3">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 text-center">
                    <label class="form-label">{{ __('Operator') }}</label>
                    <p>{{ $gathering->user->name }}</p>
                </div>
                <div class="col-md-4 text-center">
                    <label class="form-label">{{ __('Provider') }}</label>
                    <p>{{ $gathering->provider->name }}</p>
                </div>
                <div class="col-md-4 text-center">
                    <label class="form-label"></label>
                    <p></p>
                </div>
                <div class="col-md-4 text-center">
                    <label for="" class="form-label">{{ __('Date') }}</label>
                    <p>{{ Carbon\Carbon::parse($gathering->created_at)->format('d-m-Y') }}</p>
                </div>
                <div class="col-md-4 text-center">
                    <label class="form-label">{{ __('Start Time') }}</label>
                    <p>{{ $gathering->start_time }}</p>
                </div>
                <div class="col-md-4 text-center">
                    <label class="form-label">{{ __('End Time') }}</label>
                    <p>{{ $gathering->end_time }}</p>
                </div>
            </div>
            <hr>
            <h5 class="card-title text-center">{{ __('Products') }}</h5>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>{{ __('Product') }}</th>
                            <th>{{ __('Product Type') }}</th>
                            <th>{{ __('Packages') }}</th>
                            <th>{{ __('Weight') }}</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($gatheringDetails as $gatheringDetail)
                            <tr>
                                <td>{{ $gatheringDetail->product->name }}</td>
                                <td>{{ $gatheringDetail->productType->name }}</td>
                                <td>{{ $gatheringDetail->packages }}</td>
                                <td>{{ $gatheringDetail->weight }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <a href="{{ route('gatherings.index') }}" class="btn btn-secondary float-end">{{ __('Go back') }}</a>
</div>
@endsection