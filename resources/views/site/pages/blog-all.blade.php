@extends('site.layouts.app')

@section('title', 'All Blogs')
@section('content')

<div class="amazing-breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-inner">
            <div class="page-title">
                <h1 class="title">Our Blogs</h1>
            </div>
            <ul class="amazing-breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="separator"><i class="icon-angle-right"></i></li>
                <li class="breadcrumb-item active" aria-current="page">Blogs</li>
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
<!--=        Blogs Area Start           =-->
<!--=====================================-->
<div class="amazing-course-area course-area-1 gap-tb-text">
    <div class="container">
        <div class="amazing-sorting-area">
            <div class="sorting-left">
                <h6 class="showing-text">We found <span>{{ $blogs->count() }}</span> blogs available for you</h6>
            </div>
        </div>

        <div class="row g-5">
            @foreach($blogs as $blog)
                <!-- Start Single Blog  -->
                <div class="col-md-6 col-lg-4 col-xl-3" data-sal-delay="100" data-sal="slide-up" data-sal-duration="800">
                    <div class="amazing-course course-style-1 course-box-shadow hover-button-bg-white">
                        <div class="inner">
                            <div class="thumbnail">
                                <a href="{{ route('blog.show', $blog->id) }}">
                                    <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}">
                                </a>
                            </div>
                            <div class="content">
                                <h6 class="title">
                                    <a href="{{ route('blog.show', $blog->id) }}">{{ $blog->title }}</a>
                                </h6>
                                <ul class="course-meta">
                                    <li><i class="icon-27"></i>{{ $blog->created_at->format('M d, Y') }}</li>
                                    <li><i class="icon-28"></i>{{ $blog->author }}</li>
                                </ul>
                                <p>{{ Str::limit($blog->description, 100) }}</p>
                                <a href="{{ route('blog.show', $blog->id) }}" class="amazing-btn btn-secondary btn-small">Read More <i class="icon-4"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Blog  -->
            @endforeach
        </div>
    </div>
</div>
<!-- End Blog Area -->
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        // Custom scripts if needed
    });
</script>
@endsection