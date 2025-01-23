@if(count($testimonials) > 0)

<div class="testimonial-area-18 gap-top-equal">
    <div class="container">
        <div class="section-title section-center sal-animate" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
            <span class="pre-title">Testimonials</span>
            <h2 class="title">What Our Clients Have To Say</h2>
            <span class="shape-line"><i class="icon-19"></i></span>
        </div>
        <div class="testimonial-wrapper">
            <div class="testimonial-wrap">
                @foreach($testimonials as $testimonial)
                <div class="testimonial-slide testimonial-style-2 testimonial-style-18">
                    <div class="content">
                        <div class="rating-icon">
                            @for ($i = 0; $i < 5; $i++)
                                <i class="icon-23"></i>
                            @endfor
                        </div>
                        <p>{{ $testimonial->testimonial }}</p>
                        <div class="author-info">
                            <div class="thumb">
                                <img src="{{ asset('assets/images/testimonial/' . $testimonial->image) }}" alt="Testimonial">
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
    </div>
</div>
@endif
