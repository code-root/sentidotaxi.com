<div class="home-photography-course amazing-course-area">
    <div class="container amazing-animated-shape">
        <ul>
            <li>
                <div class="section-title section-left sal-animate" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                    <span class="pre-title">Popular Service </span>
                    <h2 class="title">Find The Service That’s Right for You.</h2>
                    <span class="shape-line"><i class="icon-19"></i></span>
                </div>
            </li>
            <li>
                <div class="course-view-all sal-animate" data-sal-delay="150" data-sal="slide-up" data-sal-duration="1200">
                    <a href="{{ route('service.home') }}" class="amazing-btn">View All Service <i class="icon-4"></i></a>
                </div>
            </li>
        </ul>
        <div class="row g-5">
            @foreach($services as $service)
            <!-- Start Single Course  -->
            <div class="col-xl-3 col-md-6 sal-animate" data-sal-delay="100" data-sal="slide-up" data-sal-duration="800">
                <div class="amazing-course course-style-3 course-style-11 course-style-13">
                    <div class="inner">
                        <div class="thumbnail">
                            <a href="{{ route('service.details', $service->id) }}">
                                <img src="/storage/app/public/{{ $service->image }}" alt="{{ $service->name }}" style="wi">
                            </a>
                            <div class="course-price">${{ $service->price }}</div>
                            <ul class="course-meta">
                                <li><i class="icon-25 icon-location"></i>{{ $service->location }}</li>
                            </ul>
                        </div>
                        <div class="content">
                            <p class="text pre-textsecondary">{{ $service->name }}</p>
                            <h6 class="title">
                                <a href="{{ route('service.details', $service->id) }}">{{ $service->title }}.</a>
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Single Course  -->
            @endforeach
        </div>
    </div>
</div>
