<div class="amazing-gallery-area amazing-section-gap">
    <div class="container">
        <div class="isotope-wrapper">
            <div class="isotop-button button-transparent isotop-filter">
                <button data-filter="*" class="is-checked">
                    <span class="filter-text">{{ session('locale') === 'ar' ? 'الكل' : 'All' }}</span>
                </button>
                @foreach($categories as $category)
                <button data-filter=".{{ $category->name_en }}" >
                    <span class="filter-text">{{ $category->{'name_' . session('locale')} }}</span>
                </button>
                @endforeach
            </div>
            <div class="row" @if(session('locale') == 'ar') style="direction: rtl;" @endif>
                @foreach($categories as $category)
                    @foreach($category->galleries as $gallery)
                    <div class="col-md-4 mb-4 {{ $category->name_en }}">
                        <a href="" class="amazing-popup-image amazing-gallery-grid p-gallery-grid-wrap isotope-item" lg-event-uid="{{ $loop->iteration }}">
                            <div class="thumbnail-x">
                                <img src="/storage/app/public/{{ $gallery->image }}" alt="Gallery Image" class="img-fluid">
                            </div>
                        </a>
                    </div>
                    @endforeach
                @endforeach
            </div>
        </div>
    </div>
</div>

