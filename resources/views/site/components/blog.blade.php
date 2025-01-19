@if(count($blogs) > 0)
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
                        <a href="{{ route('blog.index') }}" class="amazing-btn">More Articles <i class="icon-4"></i></a>
                    </div>
                </li>
            </ul>
            <div class="row g-5">
                @foreach($blogs as $blog)
                    <!-- Start Blog Grid  -->
                    <div class="col-lg-4 col-12 sal-animate" data-sal-delay="50" data-sal="slide-up" data-sal-duration="800">
                        <div class="amazing-blog blog-style-2 blog-style-10 first-large-blog">
                            <div class="inner">
                                <div class="thumbnail">
                                    <a href="{{ route('blog.show', $blog->id) }}">
                                        <img src="/storage/app/public/{{ $blog->image }}" alt="Blog Images">
                                    </a>
                                    <div class="content">
                                        <h3 class="title"><a href="{{ route('blog.show', $blog->id) }}">{{ $blog->title }}</a></h3>
                                        <ul class="blog-meta">
                                            <li><i class="icon-27"></i>{{ $blog->created_at->format('M d, Y') }}</li>
                                            <li><i class="icon-28"></i>{{ $blog->author }}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Blog Grid  -->
                @endforeach
            </div>
        </div>
    </div>
@endif
