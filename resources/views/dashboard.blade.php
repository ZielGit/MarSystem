@extends('layouts.app')
@section('title') {{ __('Dashboard') }} @endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-3 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                        <div class="avatar flex-shrink-0">
                            <img src="{{ asset('sneat/assets/img/icons/unicons/chart-success.png') }}" alt="chart success" class="rounded"/>
                        </div>
                        <div class="dropdown">
                            <button
                                class="btn p-0"
                                type="button"
                                id="cardOpt3"
                                data-bs-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                            >
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                <a class="dropdown-item" href="javascript:void(0);">{{ __('View More') }}</a>
                                <a class="dropdown-item" href="javascript:void(0);">{{ __('Delete') }}</a>
                            </div>
                        </div>
                    </div>
                    <span class="fw-semibold d-block mb-1">Profit</span>
                    <h3 class="card-title mb-1">$12,628</h3>
                    <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +72.80%</small>
                </div>
            </div>
        </div>
        <div class="col-lg-3 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                        <div class="avatar flex-shrink-0">
                            <img src="{{ asset('sneat/assets/img/icons/unicons/wallet-info.png') }}" alt="Credit Card" class="rounded"/>
                        </div>
                        <div class="dropdown">
                            <button
                                class="btn p-0"
                                type="button"
                                id="cardOpt6"
                                data-bs-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                            >
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                                <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                            </div>
                        </div>
                    </div>
                    <span class="fw-semibold d-block mb-1">Sales</span>
                    <h3 class="card-title text-nowrap mb-1">$4,679</h3>
                    <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +28.42%</small>
                </div>
            </div>
        </div>
        <div class="col-lg-3 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                        <div class="avatar flex-shrink-0">
                            <img src="{{ asset('sneat/assets/img/icons/unicons/paypal.png') }}" alt="Credit Card" class="rounded" />
                        </div>
                        <div class="dropdown">
                            <button
                                class="btn p-0"
                                type="button"
                                id="cardOpt4"
                                data-bs-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                            >
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt4">
                                <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                            </div>
                        </div>
                    </div>
                    <span class="fw-semibold d-block mb-1">Payments</span>
                    <h3 class="card-title text-nowrap mb-1">$2,456</h3>
                    <small class="text-danger fw-semibold"><i class="bx bx-down-arrow-alt"></i> -14.82%</small>
                </div>
            </div>
        </div>
        <div class="col-lg-3 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                        <div class="avatar flex-shrink-0">
                            <img src="{{ asset('sneat/assets/img/icons/unicons/cc-primary.png') }}" alt="Credit Card" class="rounded" />
                        </div>
                        <div class="dropdown">
                            <button
                                class="btn p-0"
                                type="button"
                                id="cardOpt1"
                                data-bs-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                            >
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="cardOpt1">
                                <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                            </div>
                        </div>
                    </div>
                    <span class="fw-semibold d-block mb-1">Transactions</span>
                    <h3 class="card-title mb-1">$14,857</h3>
                    <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +28.14%</small>
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
                    <canvas id="gathering"></canvas>
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
                    <canvas id="release"></canvas>
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