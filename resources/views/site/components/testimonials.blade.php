@if(count($testimonials) > 0)
<div class="testimonial-area-4">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-5">
                <div class="testimonial-heading-area">
                    <div class="section-title section-left" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                        <span class="pre-title pre-textsecondary">Testimonials</span>
                        <h2 class="title">{!! __('messages.what_our_clients_say') !!}</h2>
                        <span class="shape-line"><i class="icon-19"></i></span>
                        <p>{{ __('messages.testimonials') }}</p>
                    </div>
                </div>
                <div class="swiper-navigation">
                    <div class="swiper-btn-nxt">
                        <i class="icon-west"></i>
                    </div>
                    <div class="swiper-btn-prv">
                        <i class="icon-east"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="testimonial-activation-3 swiper">
                    <div class="swiper-wrapper">
                        @foreach($testimonials as $testimonial)
                        <div class="swiper-slide">
                            <div class="testimonial-grid testimonial-style-3">
                                <div class="thumbnail">
                                    <img src="https://edublink.html.rtl.devsblink.com/assets/images/svg-icons/quote.svg" alt="Testimonial">
                                </div>
                                <div class="content">
                                    <p>{{ $testimonial->testimonial }}</p>
                                    <div class="rating-icon">
                                        <i class="icon-23"></i>
                                        <i class="icon-23"></i>
                                        <i class="icon-23"></i>
                                        <i class="icon-23"></i>
                                        <i class="icon-23"></i>
                                    </div>
                                    <h5 class="title">{{ $testimonial->name }}</h5>
                                    <span class="subtitle">{{ $testimonial->position }}</span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <ul class="shape-group">
        <li class="shape-1 scene">
            <img data-depth="2" src="/assets/site/images/others/shape-18.png" alt="Shape">
        </li>
        <li class="shape-2">
            <img src="/assets/site/images/others/map-shape-3.png" alt="Shape">
        </li>
    </ul>
</div>

<!-- End Testimonial Area  -->
@endif
