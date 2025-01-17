<div class="sales-coach-course amazing-course-area course-area-4 bg-image">
    <div class="container amazing-animated-shape">
        <div class="section-title section-center sal-animate" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
            <span class="pre-title">Popular Services</span>
            <h2 class="title">Pick A Service To Get Started</h2>
            <span class="shape-line"><i class="icon-19"></i></span>
        </div>
        <div class="row g-5">
            @foreach($services as $service)
                <!-- Start Single Service  -->
                <div class="col-xl-6 sal-animate" data-sal-delay="100" data-sal="slide-up" data-sal-duration="800">
                    <div class="amazing-course course-style-4 course-style-20">
                        <div class="inner">
                            <div class="thumbnail">
                                <a href="{{ route('service.details', $service->id) }}"style="width: 15rem;">
                                    <img src="/storage/app/public/{{ $service->image }}" alt="{{ $service->name }}">
                                </a>
                            </div>
                            <div class="content">
                                <div class="course-price">${{ $service->price }}</div>
                                <h6 class="title">
                                    <a href="{{ route('service.details', $service->id) }}">{{ $service->name }}</a>
                                </h6>
                                <ul class="course-meta">
                                    <li><i class="icon-24"></i>{{ $service->title }}</li>
                                    <li><i class="icon-25"></i>{{ $service->location }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Service  -->
            @endforeach
        </div>
        <div class="course-view-all sal-animate" data-sal-delay="150" data-sal="slide-up" data-sal-duration="1200">
            {{-- <a href="{{ route('services.all') }}" class="amazing-btn">Browse more services <i class="icon-4"></i></a> --}}
        </div>
    </div>
</div>
