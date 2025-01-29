@if(count($testimonials) > 0)
  <!-- Start Testimonial Area  -->
  <div class="testimonial-area-8 section-gap-equal">
    <div class="container amazing-animated-shape">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-title section-center" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                    <span class="pre-title">Testimonials</span>
                    <h2 class="title">What Our Students <br> Have To Say</h2>
                    <span class="shape-line"><i class="icon-19"></i></span>
                </div>
            </div>
        </div>
        <div class="testimonial-activation swiper">
            <div class="swiper-wrapper">
                @foreach($testimonials as $testimonial)

                <div class="swiper-slide">
                    <div class="testimonial-slide">
                        <div class="content">
                            <p>{{ $testimonial->testimonial }}</p>
                            <div class="rating-icon">
                                <i class="icon-23"></i>
                                <i class="icon-23"></i>
                                <i class="icon-23"></i>
                                <i class="icon-23"></i>
                                <i class="icon-23"></i>
                            </div>
                            <div class="info">
                                <h5 class="title">{{ $testimonial->name }}</h5>
                                <span class="subtitle">{{ $testimonial->position }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
        <div class="swiper-pagination"></div>
    </div>
    <ul class="shape-group">
        <li class="shape-3" data-sal-delay="200" data-sal="fade" data-sal-duration="1000">
            <img class="d-block-shape-light" data-depth="2" src="/assets/site/images/others/map-shape-3.png" alt="Shape">
            <img class="d-none-shape-dark" data-depth="2" src="/assets/site/images/others/dark-map-2-shape-3.png" alt="Shape">
        </li>
    </ul>
</div>
<!-- End Testimonial Area  -->
@endif
