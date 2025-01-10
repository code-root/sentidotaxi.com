{{-- @extends('layouts.app') --}}

@section('title', 'Content Page')

@section('content')

    @include('site.components.sliders')
    @include('site.components.about-us')
    @include('site.components.service')
    @include('site.components.gallery')
    @include('site.components.faq')
    @include('site.pages.testimonial-all')


    <div class="amazing-blog-area blog-area-3 amazing-section-gap sales-coach-blog">
        <div class="container">
            <ul class="blog-section-title">
                <li>
                    <div class="section-title section-left sal-animate" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                        <span class="pre-title">Latest Articles</span>
                        <h2 class="title">Get News with EduBlink</h2>
                        <span class="shape-line"><i class="icon-19"></i></span>
                    </div>
                </li>
                <li>
                    <div class="blog-view-all sal-animate" data-sal-delay="150" data-sal="slide-up" data-sal-duration="1200">
                        <a href="blog-details.html" class="amazing-btn">More Article <i class="icon-4"></i></a>
                    </div>
                </li>
            </ul>
            <div class="row g-5">
                <!-- Start Blog Grid  -->
                <div class="col-lg-6 col-12 sal-animate" data-sal-delay="50" data-sal="slide-up" data-sal-duration="800">
                    <div class="amazing-blog blog-style-2 blog-style-10 first-large-blog">
                        <div class="inner">
                            <div class="thumbnail">
                                <a href="blog-details.html">
                                    <img src="assets/images/blog/blog-39.jpg" alt="Blog Images">
                                </a>
                                <div class="content">
                                    <div class="category-wrap">
                                        <a href="#" class="blog-category">Lecture</a>
                                    </div>
                                    <h3 class="title"><a href="blog-details.html">Balancing Profitability and Integrity in Sales</a></h3>
                                    <ul class="blog-meta">
                                        <li><i class="icon-27"></i>Oct 10, 2024</li>
                                        <li><i class="icon-28"></i>Com 09</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Blog Grid  -->
                <div class="col-lg-3 sal-animate" data-sal-delay="100" data-sal="slide-up" data-sal-duration="800">
                    <div class="amazing-blog blog-style-2 blog-style-10">
                        <div class="inner">
                            <div class="thumbnail">
                                <a href="blog-details.html">
                                    <img src="assets/images/blog/blog-40.jpg" alt="Blog Images">
                                </a>
                            </div>
                            <div class="content">
                                <div class="category-wrap">
                                    <a href="#" class="blog-category small-category">Lecture</a>
                                </div>
                                <h5 class="title"><a href="blog-details.html">How to Handle Common Sales Challenges</a></h5>
                                <ul class="blog-meta">
                                    <li><i class="icon-27"></i>sep 10, 2024</li>
                                    <li><i class="icon-28"></i>Com 09</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 sal-animate" data-sal-delay="100" data-sal="slide-up" data-sal-duration="800">
                    <div class="amazing-blog blog-style-2 blog-style-10">
                        <div class="inner">
                            <div class="thumbnail">
                                <a href="blog-details.html">
                                    <img src="assets/images/blog/blog-41.jpg" alt="Blog Images">
                                </a>
                            </div>
                            <div class="content">
                                <div class="category-wrap">
                                    <a href="#" class="blog-category small-category">Lecture</a>
                                </div>
                                <h5 class="title"><a href="blog-details.html">Maximizing Your Sales Potential Tips</a></h5>
                                <ul class="blog-meta">
                                    <li><i class="icon-27"></i>Nov 10, 2024</li>
                                    <li><i class="icon-28"></i>Com 09</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
