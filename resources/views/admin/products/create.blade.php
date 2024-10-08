@extends('layouts.admin-layout')

@section('content')
<div class="row">
    <div class="col-sm-10 m-auto">


        <div class="theme-form theme-form-2 mega-form">
            <form action="{{ route('products.store') }}" id="productForm" method="post" enctype="multipart/form-data">
                @csrf

                @include('admin.products.partials.product-information')

                @include('admin.products.partials.product-pricing')

                @include('admin.products.partials.product-variants')

                @include('admin.products.partials.product-images')

                @include('admin.products.partials.product-additional-details')

                @include('admin.products.partials.product-description')

                @include('admin.products.partials.product-specifications')

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary w-25">Save Product</button>
                </div>
            </form>
        </div>
    </div>
</div>


<x-include-plugins :plugins="['contentEditor', 'jQueryValidate', 'chosen', 'datePicker']"></x-include-plugins>

@include('admin.products.partials.validate-product')


@push('scripts')
<script>
    $(document).ready(function(){
        // Function to populate categories based on primary category
        function populateCategories(primaryCategoryId, selectedCategoryId) {
            $.ajax({
                url: "{{ route('categories.get-by-primary-category') }}",
                method: 'GET',
                data: {
                    category_id: primaryCategoryId
                },
                success: function(response){
                    if(response.success){
                        let categories = response.categories;
                        let $categorySelect = $('#category');
                        $categorySelect.html('<option value="" selected disabled>Select Category</option>');

                        categories.forEach(function(category){
                            $categorySelect.append(`<option value="${category.id}" ${selectedCategoryId == category.id ? 'selected' : ''}>${category.name}</option>`);
                        });
                    }
                }
            });
        }

        // On change event for primary category
        $('#primary_category').change(function(){
            let selectedPrimaryCategoryId = $(this).val();
            populateCategories(selectedPrimaryCategoryId, '');
        });
    });
</script>
@endpush
@endsection