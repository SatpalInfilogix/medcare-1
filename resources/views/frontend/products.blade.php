@extends('layouts.frontend-layout')
@section('title', 'Products')

@section('content')
<section class="section-b-space shop-section">
    <div class="container-fluid-lg">
        <products></products>
    </div>
</section>

@push('scripts')
    <script src="{{ asset('assets/js/filter-sidebar.js') }}"></script>
@endpush
@endsection