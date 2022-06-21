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
                            {{ __('Deliveries') }}
                        </div>
                        <div class="col-md-6">
                            <button type="button" class="btn btn-dark float-end" data-bs-toggle="modal" data-bs-target="#deliveryModal">{{ __('Add Delivery') }}</button>
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

@push('modals')
    <!-- Delivery Modal -->
    <div class="modal fade" id="deliveryModal" tabindex="-1" role="dialog" aria-labelledby="deliveryModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('Add Delivery') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="customer_id" class="form-label">{{ __('Customer') }}</label>
                        <select class="form-select select2-customer" name="customer_id" id="customer_id" data-placeholder="{{ __('Choose the customer') }}">
                            <option value="select" selected disabled>{{ __('Select a customer') }}</option>
                            @foreach ($customers as $customer)
                                <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                            @endforeach
                        </select>
                        @error('customer_id')
                            <div class="alert alert-danger mt-2 mb-0" role="alert">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="product_id" class="form-label">{{ __('Product') }}</label>
                        <select class="form-select" name="product_id" id="product_id">
                            <option value="select" selected disabled>{{ __('Select a Product') }}</option>
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}" data-type="{{ json_encode($product->productTypes) }}">{{ $product->name }}</option>
                            @endforeach
                        </select>
                        @error('product_id')
                            <div class="alert alert-danger mt-2 mb-0" role="alert">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="product_type_id" class="form-label">{{ __('Product Type') }}</label>
                        <select class="form-select select2-brand" name="product_type_id" id="product_type_id">
                        </select>
                        @error('product_type_id')
                            <div class="alert alert-danger mt-2 mb-0" role="alert">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="weight" class="form-label">{{ __('Weight') }}</label>
                        <input type="number" class="form-control" name="weight" id="weight" min="0">
                        @error('weight')
                            <div class="alert alert-danger mt-2 mb-0" role="alert">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="total_price" class="form-label">{{ __('Total Price') }}</label>
                        <input type="number" class="form-control" name="total_price" id="total_price" min="0" step="any">
                        @error('total_price')
                            <div class="alert alert-danger mt-2 mb-0" role="alert">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Close') }}</button>
                    <button type="button" class="btn btn-primary" id="addDestination" data-bs-dismiss="modal">{{ __('Add') }}</button>
                </div>
            </div>
        </div>
    </div>
@endpush

@push('scripts')
    <script src="{{ asset('plugins/sweetalert2/sweetalert2.all.min.js') }}"></script>
    <script>
        $('select[name=product_id]').on('change',function() {
            $('select[name=product_type_id]').html('<option value="" selected disabled>{{ __("Select a type of product") }}</option>');
            var productType = $('select[name=product_id] :selected').data('type');
            var html = '';
            productType.forEach(function myFunction(item, index) {
                html += `<option value="${item.id}">${item.name}</option>`
            });
            $('select[name=product_type_id]').append(html);
        });

        var cont = 1;

        $('#addDestination').click(function () { 
            customerData = document.getElementById('customer_id').value.split('_');
            customer_id = customerData[0];
            customer = $('#customer_id option:selected').text();
            productData = document.getElementById('product_id').value.split('_');
            product_id = productData[0];
            product = $('#product_id option:selected').text();
            productTypeData = document.getElementById('product_type_id').value.split('_');
            product_type_id = productTypeData[0];
            productType = $('#product_type_id option:selected').text();
            weight = $('#weight').val();
            total_price = $('#total_price').val();
            if (product_id != "select" && product_type_id != "" && weight != "" && total_price != "") {
                var row = '<tr id="row'+cont+'">'+
                    '<td><input type="hidden" name="customer_id[]" value="'+customer_id+'">'+customer+'</td>'+
                    '<td><input type="hidden" name="product_id[]" value="'+product_id+'">'+product+'</td>'+
                    '<td><input type="hidden" name="product_type_id[]" value="'+product_type_id+'">'+productType+'</td>'+
                    '<td><input type="hidden" name="weight[]" value="'+weight+'">'+weight+' Kg</td>'+
                    '<td><input type="hidden" name="total_price[]" value="'+total_price+'">'+total_price+'</td>'+
                    '<td><button type="button" class="btn btn-danger btn-sm" onclick="delete_row('+cont+');"><i class="fa-solid fa-xmark"></i></button></td>'+
                '</tr>';
                cont++;
                clean();
                $('#details').append(row);
            } else {
                Swal.fire({
                    icon: 'error',
                    text: 'Rellene todos los campos del producto.',
                })
            }
        });

        function clean() {
            $("#customer_id").val("select");
            $("#product_id").val("select");
            $("#product_type_id").empty();
            $("#weight").val("");
            $("#total_price").val("");
            $("#product_type_id").html('<option value="">{{ __("Select a type of product") }}</option>');
        }

        function delete_row(index) {
            $("#row"+index).remove();
        }
    </script>
@endpush