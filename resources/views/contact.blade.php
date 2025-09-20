@extends('layouts.base')

@section('title', $profile->name .' - contact')
@section('meta_description', $profile->about)
@section('meta_keywords', $profile->name . ', rikshaw spare parts, auto parts')

@section('content')
 <!-- Breadcrumb Banner -->
    <section class="breadcrumb-banner">
        <div class="breadcrumb-container">
            <ul class="breadcrumb-list">
                <li><a href="index.html">Home</a></li>
                <li><span>/</span></li>
                <li>Contact</li>
            </ul>
            <h1 class="breadcrumb-title">Contact</h1>
        </div>
    </section>

    <!-- Contact Section -->
    <x-contact-form />

@endsection
