@extends('layouts.base')

@section('title', $profile->name .' - Home')

@section('content')
 <!-- Breadcrumb Banner -->
    <section class="breadcrumb-banner">
        <div class="breadcrumb-container">
            <ul class="breadcrumb-list">
                <li><a href="index.html">Home</a></li>
                <li><span>/</span></li>
                <li>About Us</li>
            </ul>
            <h1 class="breadcrumb-title">About Us</h1>
        </div>
    </section>



@endsection
