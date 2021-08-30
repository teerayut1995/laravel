@extends('layouts.master')

@section('title', 'กล่องความรู้')

@section('style')
@endsection

@section('content')
<section class="blog-carousel">
    @include('components.carousel')
</section>
<section class="blog-grid">
    <div class="row">
        <div class="col-8 col-md-8 col-lg-9">
            <!-- recommend -->
            @include('components.recommend')
            <!-- list -->
            @include('components.list')
        </div>
        <div class="col-4 col-md-4 col-lg-3">
            <!-- aside -->
            @include('components.aside')
        </div>
    </div>
</section>
@endsection

@section('script')
@endsection