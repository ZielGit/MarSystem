@extends('layouts.app')
@section('title') {{ __('Dashboard') }} @endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-3 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <span class="fw-semibold d-block mb-1">{{ __('Cardboard gathering of the day') }}</span>
                            <h3 class="card-title mb-1">{{ $gatheringCarton }} Kg</h3>
                        </div>
                        <h2>
                            <span class="badge bg-label-success mt-2">
                                <i class="fas fa-archive"></i>
                            </span>
                        </h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <span class="fw-semibold d-block mb-1">{{ __('Plastic gathering of the day') }}</span>
                            <h3 class="card-title text-nowrap mb-1">{{ $gatheringPlastic }} Kg</h3>
                        </div>
                        <h2>
                            <span class="badge bg-label-warning mt-2">
                                <i class="fa-solid fa-bag-shopping"></i>
                            </span>
                        </h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div>
                            <span class="fw-semibold d-block mb-1">Payments</span>
                            <h3 class="card-title text-nowrap mb-1">$2,456</h3>
                        </div>
                        <div class="avatar flex-shrink-0">
                            <img src="{{ asset('sneat/assets/img/icons/unicons/paypal.png') }}" alt="Credit Card" class="rounded" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div>
                            <span class="fw-semibold d-block mb-1">Transactions</span>
                            <h3 class="card-title mb-1">$14,857</h3>
                        </div>
                        <div class="avatar flex-shrink-0">
                            <img src="{{ asset('sneat/assets/img/icons/unicons/cc-primary.png') }}" alt="Credit Card" class="rounded" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <h5 class="m-0 me-2">{{ __('Gathering of the last 30 days') }}</h5>
                    </div>
                </div>
                <div class="card-body">
                    <canvas id="gathering" height="120"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <h5 class="m-0 me-2">{{ __('Release of the last 30 days') }}</h5>
                    </div>
                </div>
                <div class="card-body">
                    <canvas id="release" height="120"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script src="{{ asset('plugins/chartjs/chart.min.js') }}"></script>
    <script>
        const gathering = document.getElementById('gathering');
        const chartGathering = new Chart(gathering, {
            type: 'bar',
            data: {
                labels: [
                    @php
                        foreach ($dailyGatherings as $dailyGathering) {
                            $day = $dailyGathering->day;
                            echo '"'.$day.'",';
                        }
                    @endphp
                        
                ],
                datasets: [{
                    label: 'Acopios',
                    data: [
                        @php
                            foreach ($dailyGatherings as $dailyGathering) {
                                echo ''.$dailyGathering->total.',';
                            }
                        @endphp
                    ],
                    backgroundColor: 'rgba(231, 231, 255, 0.9)',
                    borderColor: 'rgba(105, 108, 255, 1)',
                    borderWidth: 2
                }]
            },
            option: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        const release = document.getElementById('release');
        const chartRelease = new Chart(release, {
            type: 'bar',
            data: {
                labels: [
                    @php
                        foreach ($dailyReleases as $dailyRelease) {
                            $day = $dailyRelease->day;
                            echo '"'.$day.'",';
                        }
                    @endphp
                        
                ],
                datasets: [{
                    label: 'Liberación',
                    data: [
                        @php
                            foreach ($dailyReleases as $dailyRelease) {
                                echo ''.$dailyRelease->total.',';
                            }
                        @endphp
                    ],
                    backgroundColor: 'rgba(238, 251, 231, 0.9)',
                    borderColor: 'rgba(126, 221, 76, 1)',
                    borderWidth: 2
                }]
            },
            option: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endpush