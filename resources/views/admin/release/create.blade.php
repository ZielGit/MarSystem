@extends('layouts.app')
@section('title') {{ __('Create Release') }} @endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-3">{{ __('Create Release') }} </h4>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('releases.store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label for="customer_id" class="form-label">{{ __('Customer') }}</label>
                        <select class="form-control" name="customer_id" id="customer_id">
                            <option value="" selected disabled>{{ __('Select a customer') }}</option>
                            @foreach ($customers as $customer)
                                <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                            @endforeach
                        </select>
                        @error('customer_id')
                            <div class="alert alert-danger mt-2 mb-0" role="alert">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="lot" class="form-label">{{ __('Lot') }}</label>
                        <input type="number" class="form-control" name="lot" id="lot" min="0" value="{{ old('lot') }}" aria-describedby="lotHelp">
                        <div id="lotHelp" class="form-text text-muted">{{ __('This is an optional field') }}</div>
                        @error('lot')
                            <div class="alert alert-danger mt-2 mb-0" role="alert">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="product_id" class="form-label">{{ __('Product') }}</label>
                        <select class="form-control" name="product_id" id="product_id">
                            <option value="" selected disabled>{{ __('Select a product') }}</option>
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}" data-type="{{ json_encode($product->productTypes) }}">{{ $product->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="product_type_id" class="form-label">{{ __('Product Type') }}</label>
                        <select class="form-select select2-brand" name="product_type_id" id="product_type_id">
                        </select>
                        @error('product_type_id')
                            <div class="alert alert-danger mt-2 mb-0" role="alert">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="current_stock" class="form-label">{{ __('Current Stock') }}</label>
                        <div class="input-group">
                            <input type="number" class="form-control" id="current_stock" min="0" readonly>
                            <span class="input-group-text">Kg</span>
                        </div>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="quantity_released" class="form-label">{{ __('Quantity to Release') }}</label>
                        <div class="input-group">
                            <input type="number" class="form-control" name="quantity_released" id="quantity_released" min="0" value="{{ old('quantity_released') }}">
                            <span class="input-group-text">Kg</span>
                        </div>
                        @error('quantity_released')
                            <div class="alert alert-danger mt-2 mb-0" role="alert">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="observations" class="form-label">{{ __('Observations') }}</label>
                        <textarea class="form-control" name="observations" id="observations" rows="2" aria-describedby="observationsHelp">{{ old('observations') }}</textarea>
                        <div id="observationsHelp" class="form-text text-muted">{{ __('This is an optional field') }}</div>
                        @error('observations')
                            <div class="alert alert-danger mt-2 mb-0" role="alert">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">{{ __('Create') }}</button>
                <a href="{{ route('releases.index') }}" class="btn btn-secondary float-end">{{ __('Cancel') }}</a>
            </form>
        </div>
    </div>
</div>
@endsection

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

        $("#product_type_id").change(function () { 
            var product_type_id = $('#product_type_id');
            $.ajax({
                method: "GET",
                url: "{{ route('get.stock') }}",
                data: {
                    product_type_id: product_type_id.val(),
                },
                success: function (data) {
                    $("#current_stock").val(data.stock);
                }
            });
        });

        $("#current_stock, #quantity_released").change(function () { 
            current_stock = $("#current_stock").val();
            quantity_released = $("#quantity_released").val();
            if (current_stock < quantity_released) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: '{{ __("The quantity to be released exceeds the current stock") }}',
                })
            }
        });
    </script>
@endpush