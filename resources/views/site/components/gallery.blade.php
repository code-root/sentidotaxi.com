<div class="edu-instagram-area instagram-area-1">
    <div class="container-fluid">
        <div class="section-title section-center" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
            <span class="pre-title pre-textsecondary">Gallery</span>
            <h2 class="title">Gallery {{ $settings['site_name'] ?? '' }} </h2>
            <span class="shape-line"><i class="icon-19"></i></span>
        </div>
        <div class="row g-3">
            @foreach($gallery as $item)
            <div class="col-xl-2 col-md-4 col-sm-6">
                <div class="instagram-grid">
                    <a href="#">
                        <img src="/storage/app/public/{{ $item->image }}" alt="{{ $item->category->name }}">
                        <span class="user-info">
                            {{-- <span class="icon"><i class="icon-instagram"></i></span> --}}
                            <span class="user-name">{{ $item->category->name }}</span>
                        </span>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>


