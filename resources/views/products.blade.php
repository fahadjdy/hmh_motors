@extends('layouts.base')

@section('title', $profile->name .' - Home')

@section('content')

 <!-- Breadcrumb Banner -->
    <section class="breadcrumb-banner">
        <div class="breadcrumb-container">
            <ul class="breadcrumb-list">
                <li><a href="index.html">Home</a></li>
                <li><span>/</span></li>
                <li>Products</li>
            </ul>
            <h1 class="breadcrumb-title">Products</h1>
        </div>
    </section>


      <!-- Product Listing -->
    <section class="products">
        <div class="products-container">
          
            <div class="products-grid">
                <!-- Product cards will be generated here -->
            </div>
            <div class="pagination">
            </div>
        </div>
    </section>

    <script>
          window.products = @json($products);
    </script>
@endsection
