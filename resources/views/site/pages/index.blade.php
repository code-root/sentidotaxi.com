@extends('site.layouts.app')

@section('title', $page->{'name_' . $locale})
@section('content')
    <div class="amazing-breadcrumb-area" @if ($locale === 'ar') style="direction: rtl;" @endif>
        <div class="container">
            <div class="breadcrumb-inner">
                <div class="page-title">
                    <h1 class="title">{{ $locale === 'ar' ? $page->name_ar : $page->name_en }}</h1>
                </div>
                <ul class="amazing-breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ url('/') }}">
                            {{ $locale === 'ar' ? 'الرئيسية' : 'Home' }}
                        </a>
                    </li>
                    <li class="separator">
                        <i class="{{ $locale === 'ar' ? 'icon-angle-left' : 'icon-angle-right' }}"></i>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ $locale === 'ar' ? $page->name_ar : $page->name_en }}
                    </li>
                </ul>
            </div>
        </div>

        <ul class="shape-group">
            <li class="shape-1"><span></span></li>
            <li class="shape-2 scene"></li>
            <li class="shape-3 scene"></li>
            <li class="shape-4"><span></span></li>
            <li class="shape-5 scene"></li>
        </ul>
    </div>
    <section class="section-gap-equal contact-me-area">
        <div class="container">
            <div class="row justify-content-center" @if ($locale == 'ar') style="direction: rtl;" @endif>
                <div class="col-xl-9">
                    <div class="contact-me">
                        <div class="inner">
                            <div class="contact-us-info">
                                <h3 class="heading-title">{!! $page->{'name_' . $locale} !!}</h3>
                                <p>{!! $page->{'description_' . $locale} !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
