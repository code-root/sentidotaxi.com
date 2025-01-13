@extends('site.layouts.app')

@section('title', $blog->title)
@section('content')

<div class="amazing-breadcrumb-area breadcrumb-style-2 bg-image bg-image--19">
    <div class="container">
        <div class="breadcrumb-inner">
            <div class="page-title">
                <h1 class="title">{{ $blog->title }}</h1>
            </div>
            <ul class="amazing-breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="separator"><i class="icon-angle-right"></i></li>
                <li class="breadcrumb-item"><a href="{{ route('blog.index') }}">Blogs</a></li>
                <li class="separator"><i class="icon-angle-right"></i></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $blog->title }}</li>
            </ul>
        </div>
    </div>
</div>

<!--=====================================-->
<!--=       Blog Details Area Start     =-->
<!--=====================================-->
<div class="blog-details-area section-gap-equal">
    <div class="container">
        <div class="row row--30">
            <div class="col-lg-8">
                <div class="blog-details-content">
                    <div class="entry-content">
                        <h3 class="title">{{ $blog->title }}</h3>
                        <ul class="blog-meta">
                            <li><i class="icon-27"></i>{{ $blog->created_at->format('M d, Y') }}</li>
                            <li><i class="icon-28"></i>{{ $blog->author }}</li>
                        </ul>
                        <div class="thumbnail">
                            <img src="{{ asset('storage/' . $blog->image) }}" alt="Blog Image">
                        </div>
                    </div>
                    <p>{{ $blog->content }}</p>
                    <div class="blog-share-area">
                        <div class="row align-items-center">
                            <div class="col-md-5">
                                <div class="blog-share">
                                    <h6 class="title">Share on:</h6>
                                    <ul class="social-share icon-transparent">
                                        <li>
                                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(Request::fullUrl()) }}" target="_blank">
                                                <i class="icon-facebook"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://twitter.com/intent/tweet?url={{ urlencode(Request::fullUrl()) }}&text={{ urlencode($blog->title) }}" target="_blank">
                                                <i class="icon-twitter"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(Request::fullUrl()) }}&title={{ urlencode($blog->title) }}" target="_blank">
                                                <i class="icon-linkedin2"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://www.youtube.com/share?url={{ urlencode(Request::fullUrl()) }}" target="_blank">
                                                <i class="icon-youtube"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {!! getTranslations($blog->tr_token, 'description') !!}

            </div>
            <div class="col-lg-4">
                <div class="amazing-blog-sidebar">
                    <!-- End Single Widget  -->
                    <!-- Start Single Widget  -->
                    <div class="amazing-blog-widget widget-latest-post">
                        <div class="inner">
                            <h4 class="widget-title">Latest Post</h4>
                            <div class="content latest-post-list">
                                @foreach($latestBlogs as $latestBlog)
                                <div class="latest-post">
                                    <div class="thumbnail">
                                        <a href="{{ route('blog.show', $latestBlog->id) }}">
                                            <img src="{{ asset('storage/' . $latestBlog->image) }}" alt="Blog Images">
                                        </a>
                                    </div>
                                    <div class="post-content">
                                        <h6 class="title"><a href="{{ route('blog.show', $latestBlog->id) }}">{{ $latestBlog->title }}</a></h6>
                                        <ul class="blog-meta">
                                            <li><i class="icon-27"></i>{{ $latestBlog->created_at->format('M d, Y') }}</li>
                                        </ul>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
@endsection