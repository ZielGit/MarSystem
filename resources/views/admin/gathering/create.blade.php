@extends('layouts.app')
@section('title') {{ __('Gathering Register') }} @endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-3">{{ __('Gathering Register') }} </h4>

    <form action="{{ route('gatherings.store') }}" method="post">
        @csrf
        <div class="card mb-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <label for="provider_id" class="form-label">{{ __('Provider') }}</label>
                        <select class="form-control select2-provider" name="provider_id" id="provider_id" data-placeholder="{{ __('Select a provider') }}">
                            <option value=""></option> {{-- Para el placeholder --}}
                            @foreach ($providers as $provider)
                                <option value="{{ $provider->id }}">{{ $provider->name }}</option>
                            @endforeach
                        </select>
                        @error('provider_id')
                            <div class="alert alert-danger mt-2 mb-0" role="alert">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <label for="start_time" class="form-label">{{ __('Start Time') }}</label>
                        <input type="time" class="form-control" name="start_time" id="start_time">
                        @error('start_time')
                            <div class="alert alert-danger mt-2 mb-0" role="alert">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <label for="end_time" class="form-label">{{ __('End Time') }}</label>
                        <input type="time" class="form-control" name="end_time" id="end_time">
                        @error('end_time')
                            <div class="alert alert-danger mt-2 mb-0" role="alert">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-3">
            <h5 class="card-header">
                <div class="row">
                    <div class="col-md-6 mt-2">
                        {{ __('Gathering of Products') }}
                    </div>
                    <div class="col-md-6">
                        <button type="button" class="btn btn-dark float-end" data-bs-toggle="modal" data-bs-target="#productModal">{{ __('Add Product') }}</button>
                    </div>
                </div>
            </h5>
            <div class="card-body">
                <div class="table-responsive text-nowrap mb-3">
                    <table class="table" id="details">
                        <thead>
                            <tr>
                                <th>{{ __('Product') }}</th>
                                <th>{{ __('Product Type') }}</th>
                                <th>{{ __('Packages') }}</th>
                                <th>{{ __('Weight') }}</th>
                                <th>{{ __('Delete') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <label for="carton_weight" class="form-label">{{ __('Carton Weight') }}</label>
                        <input type="number" class="form-control" name="carton_weight" id="carton_weight" readonly>
                    </div>
                    <div class="col-md-3">
                        <label for="plastic_weight" class="form-label">{{ __('Plastic Weight') }}</label>
                        <input type="text" class="form-control" name="plastic_weight" id="plastic_weight" readonly>
                    </div>
                    <div class="col-md-3">
                        <label for="paper_weight" class="form-label">{{ __('Paper Weight') }}</label>
                        <input type="text" class="form-control" name="paper_weight" id="paper_weight" readonly>
                    </div>
                    <div class="col-md-3">
                        <label for="overall_weight" class="form-label">{{ __('Overall Weight') }}</label>
                        <input type="text" class="form-control" name="overall_weight" id="overall_weight" readonly>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">{{ __('Create') }}</button>
        <a href="{{ route('gatherings.index') }}" class="btn btn-secondary float-end">{{ __('Cancel') }}</a>
    </form>
</div>
@endsection

@push('modals')
    <!-- Product Modal -->
    <div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="productModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('Add Product') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="product_id" class="form-label">{{ __('Product') }}</label>
                        <select class="form-select select2-product" name="product_id" id="product_id" data-placeholder="{{ __('Choose the product') }}">
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
                        @error('brand_id')
                            <div class="alert alert-danger mt-2 mb-0" role="alert">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="packages" class="form-label">{{ __('Packages') }}</label>
                        <input type="number" class="form-control" name="packages" id="packages" min="0">
                        @error('packages')
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
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Close') }}</button>
                    <button type="button" class="btn btn-primary" id="addProduct" data-bs-dismiss="modal">{{ __('Add') }}</button>
                </div>
            </div>
        </div>
    </div>
@endpush

@push('styles')
    <link rel="stylesheet" href="{{ asset('plugins/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2/select2-bootstrap-5-theme.min.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('plugins/select2/select2.min.js') }}"></script>
    <script src="{{ asset('plugins/sweetalert2/sweetalert2.all.min.js') }}"></script>
    <script>
        $(".select2-provider").select2({
            theme: "bootstrap-5",
            placeholder: $( this ).data( 'placeholder' ),
        });

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
        product_id_array = [];      // Para guardar los id de cada producto
        product_weight = [];        // Para guardar los pesos de cada producto
        total_carton_weight = 0;    // Para guardar peso total de carton
        total_plastic_weight = 0;   // Para guardar peso total de plastico
        total_paper_weight = 0;     // Para guardar peso total de papel
        overall_weight = 0;         // Para guardar peso total general

        $('#addProduct').click(function () { 
            productData = document.getElementById('product_id').value.split('_');
            product_id = productData[0];
            product = $('#product_id option:selected').text();
            productTypeData = document.getElementById('product_type_id').value.split('_');
            product_type_id = productTypeData[0];
            productType = $('#product_type_id option:selected').text();
            packages = $('#packages').val();
            weight = $('#weight').val();
            if (product_id != "select" && product_type_id != "" && packages != "" && weight != "") {
                product_id_array[cont] = parseInt(product_id);
                product_weight[cont] = parseInt(weight);
                overall_weight = overall_weight + product_weight[cont];
                var row = '<tr id="row'+cont+'">'+
                    '<td><input type="hidden" name="product_id[]" value="'+product_id+'">'+product+'</td>'+
                    '<td><input type="hidden" name="product_type_id[]" value="'+product_type_id+'">'+productType+'</td>'+
                    '<td><input type="hidden" name="packages[]" value="'+packages+'">'+packages+'</td>'+
                    '<td><input type="hidden" name="weight[]" value="'+weight+'">'+weight+' Kg</td>'+
                    '<td><button type="button" class="btn btn-danger btn-sm" onclick="delete_row('+cont+');"><i class="fa-solid fa-xmark"></i></button></td>'+
                '</tr>';
                cont++;
                clean();
                totals();
                $('#carton_weight').val(total_carton_weight);
                $('#plastic_weight').val(total_plastic_weight);
                $('#paper_weight').val(total_paper_weight);
                $('#overall_weight').val(overall_weight);
                $('#details').append(row);
            } else {
                Swal.fire({
                    icon: 'error',
                    text: 'Rellene todos los campos del producto.',
                })
            }
        });

        function clean() {
            $("#product_id").val("select");
            $("#product_type_id").empty();
            $("#packages").val("");
            $("#weight").val("");
            $("#product_type_id").html('<option value="">{{ __("Select a type of product") }}</option>');
        }

        function totals() {
            if (product_id == 1) {
                product_weight[cont] = parseInt(weight);
                total_carton_weight = total_carton_weight + product_weight[cont];
            } else if (product_id == 2) {
                product_weight[cont] = parseInt(weight);
                total_plastic_weight = total_plastic_weight + product_weight[cont];
            } else if (product_id == 3) {
                product_weight[cont] = parseInt(weight);
                total_paper_weight = total_paper_weight + product_weight[cont];
            }
        }

        function delete_row(index) {
            if (product_id_array[index] == 1) {
                total_carton_weight = total_carton_weight - product_weight[index];
            } else if (product_id_array[index] == 2) {
                total_plastic_weight = total_plastic_weight - product_weight[index];
            } else if (product_id_array[index] == 3){
                total_paper_weight = total_paper_weight - product_weight[index];
            }
            overall_weight = overall_weight - product_weight[index];
            $('#carton_weight').val(total_carton_weight);
            $('#plastic_weight').val(total_plastic_weight);
            $('#paper_weight').val(total_paper_weight);
            $('#overall_weight').val(overall_weight);
            $("#row"+index).remove();
        }
    </script>
@endpush