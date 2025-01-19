@extends('site.layouts.app')

@section('title', 'All Services')
@section('content')

<div class="amazing-breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-inner">
            <div class="page-title">
                <h1 class="title">Our Services</h1>
            </div>
            <ul class="amazing-breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="separator"><i class="icon-angle-right"></i></li>
                <li class="breadcrumb-item active" aria-current="page">Services</li>
            </ul>
        </div>
    </div>
    <ul class="shape-group">
        <li class="shape-1">
            <span></span>
        </li>
        <li class="shape-2 scene"><img data-depth="2" src="/assets/site/images/about/shape-13.png" alt="shape"></li>
        <li class="shape-3 scene"><img data-depth="-2" src="/assets/site/images/about/shape-15.png" alt="shape"></li>
        <li class="shape-4">
            <span></span>
        </li>
        <li class="shape-5 scene"><img data-depth="2" src="/assets/site/images/about/shape-07.png" alt="shape"></li>
    </ul>
</div>

<!--=====================================-->
<!--=        Services Area Start         =-->
<!--=====================================-->
<div class="amazing-course-area course-area-1 gap-tb-text">
    <div class="container">
        <div class="amazing-sorting-area">
            <div class="sorting-left">
                <h6 class="showing-text">We found <span>{{ $services->count() }}</span> services available for you</h6>
            </div>
        </div>

        <div class="row g-5">
            @foreach($services as $service)
                <!-- Start Single Service  -->
                <div class="col-md-6 col-lg-4 col-xl-3" data-sal-delay="100" data-sal="slide-up" data-sal-duration="800">
                    <div class="amazing-course course-style-1 course-box-shadow hover-button-bg-white">
                        <div class="inner">
                            <div class="thumbnail">
                                <a href="{{ route('service.details', $service->id) }}">
                                    <img src="{{ asset('/storage/app/public/' . $service->image) }}" alt="{{ $service->name }}">
                                </a>
                                <div class="time-top">
                                    <span class="duration"><i class="icon-61"></i>{{ $service->duration }} Weeks</span>
                                </div>
                            </div>
                            <div class="content">
                                <span class="course-level">{{ $service->level }}</span>
                                <h6 class="title">
                                    <a href="{{ route('service.details', $service->id) }}">{{ $service->name }}</a>
                                </h6>
                                <div class="course-rating">
                                    <div class="rating">
                                        @for ($i = 0; $i < 5; $i++)
                                            <i class="icon-23"></i>
                                        @endfor
                                    </div>
                                    <span class="rating-count">(5.0 /{{ $service->reviews_count }} Rating)</span>
                                </div>
                                <div class="course-price">${{ $service->price }}</div>
                                <ul class="course-meta">
                                    <li><i class="icon-24"></i>{{ $service->lessons_count }} Lessons</li>
                                    <li><i class="icon-25"></i>{{ $service->students_count }} Students</li>
                                </ul>
                            </div>
                        </div>
                        <div class="course-hover-content-wrapper">
                            <button class="wishlist-btn"><i class="icon-22"></i></button>
                        </div>
                        <div class="course-hover-content">
                            <div class="content">
                                <button class="wishlist-btn"><i class="icon-22"></i></button>
                                <span class="course-level">{{ $service->level }}</span>
                                <h6 class="title">
                                    <a href="{{ route('service.details', $service->id) }}">{{ $service->name }}</a>
                                </h6>
                                <div class="course-rating">
                                    <div class="rating">
                                        @for ($i = 0; $i < 5; $i++)
                                            <i class="icon-23"></i>
                                        @endfor
                                    </div>
                                    <span class="rating-count">(5.0 /{{ $service->reviews_count }} Rating)</span>
                                </div>
                                <div class="course-price">${{ $service->price }}</div>
                                <p>{{ $service->description }}</p>
                                <ul class="course-meta">
                                    <li><i class="icon-24"></i>{{ $service->lessons_count }} Lessons</li>
                                    <li><i class="icon-25"></i>{{ $service->students_count }} Students</li>
                                </ul>
                                <a href="{{ route('service.details', $service->id) }}" class="amazing-btn btn-secondary btn-small">View Details <i class="icon-4"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Service  -->
            @endforeach
        </div>
    </div>
</div>
<!-- End Service Area -->
@endsection

@section('scripts')
<script>
    $(document).ready(function() {


    });
</script>
@endsection
