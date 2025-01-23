<div class="hero-banner hero-style-12 bg-image photography-banner">
    <div class="swiper photography-activator">
        <div class="swiper-wrapper">
            @foreach ($sliders as $slider)
            <div class="swiper-slide">
                <img width="360px" height="360px" data-transform-origin='center center'
                    data-src="{{ asset('/storage/app/public/' . $slider->image) }}" class="swiper-lazy" alt="image">
            </div>
            @endforeach
        </div>
        <div class="swiper-slide-controls slide-prev">
            <i class="icon-west"></i>
        </div>
        <div class="swiper-slide-controls slide-next">
            <i class="icon-east"></i>
        </div>

        <div class="pagination-box-wrapper">
            <div class="pagination-box-wrap">
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
</div>
