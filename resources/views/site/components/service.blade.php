<div class="amazing-course-area course-area-6 amazing-section-gap bg-lighten01">
    <div class="container">
        <div class="section-title section-center" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
            <span class="pre-title pre-textsecondary">Service</span>
            <h2 class="title">Pick A Service To Get Started</h2>
            <span class="shape-line"><i class="icon-19"></i></span>
        </div>
        <div class="course-activation  swiper">
            <div class="swiper-wrapper">
                @foreach($services as $service)
                <div class="swiper-slide">
                    <div class="amazing-course course-style-6">
                        <div class="inner">
                            <div class="thumbnail">
                                <a href="{{ route('service.details', $service->id) }}">
                                    <img src="/storage/app/public/{{ $service->image }}" alt="{{ $service->name }}">
                                </a>
                                <div class="course-price price-round">$ {{ $service->price }}</div>
                            </div>
                            <div class="content">
                                <span class="course-level">{{ $service->name }}</span>
                                <h5 class="title">
                                    <a href="{{ route('service.details', $service->id) }}">{{ $service->title }}</a>
                                </h5>
                                <ul class="course-meta">
                                    <li><i class="icon-24"></i>{{ $service->location }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
        <div class="swiper-pagination"></div>
    </div>

</div>
