{{-- @extends('layouts.app') --}}

@section('title', 'Content Page')

@section('content')

    @include('site.components.sliders')
    @include('site.components.about-us')
    @include('site.components.service')
    @include('site.components.gallery')
    @include('site.components.faq')
    @include('site.pages.testimonial-all')
    @include('site.components.blog')


 
@endsection
