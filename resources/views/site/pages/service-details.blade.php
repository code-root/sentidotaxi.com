@extends('site.layouts.app')

@section('title', $service->title)
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

@section('content')
<div class="amazing-breadcrumb-area breadcrumb-style-3">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="amazing-breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="separator"><i class="icon-angle-right"></i></li>
                <li class="breadcrumb-item"><a href="{{ route('service.home') }}">Services</a></li>
                <li class="separator"><i class="icon-angle-right"></i></li>
                <li class="breadcrumb-item active" aria-current="page">{{ getTranslations($service->tr_token, 'title') }}</li>
            </ul>
            <div class="page-title">
                <h1 class="title">{{ getTranslations($service->tr_token, 'title') }}</h1>
            </div>
            <ul class="course-meta">
                <li><i class="icon-24"></i> {{ $service->orders->count() }} المشتركين</li>
                <li><i class="icon-25"></i> {{ $service->views->count() }} المشاهدات</li>
            </ul>
        </div>
    </div>
</div>

<section class="amazing-section-gap course-details-area">
    <div class="container">
        <div class="row row--30">
            <div class="col-lg-8">
                <div class="course-details-content">
                    <div class="course-overview">
                        <h3 class="heading-title">Service Description</h3>
                        <p>{!! getTranslations($service->tr_token, 'description') !!}</p>
                    </div>
                    <div class="course-gallery">
                        <h5 class="title">Gallery</h5>
                        <div class="row">
                            @foreach($service->images as $image)
                            <div class="col-md-4">
                                <img src="{{ asset('/storage/app/public/' . $image->path) }}" alt="Service Image" class="img-fluid">
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div id="subscription-form" class="contact-form form-style-2 mt-5">
                        <div class="section-title">
                            <h4 class="title">Subscribe to this Service</h4>
                            <p>Fill out this form to subscribe to this service.</p>
                        </div>
                        <form action="{{ route('form.submit') }}" id="subscribe-form" method="POST">
                            @csrf
                            <input type="hidden" name="service_id" value="{{ $service->id }}">
                            <div class="row row--10">
                                <!-- Personal Information -->
                                <div class="form-group col-md-6">
                                    <label for="name">{{ __('form.your_name') }}</label>
                                    <input type="text" name="name" id="name" placeholder="{{ __('form.your_name') }}" class="form-control" required>
                                    <div class="invalid-feedback" data-field="name"></div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email">{{ __('form.email') }}</label>
                                    <input type="email" name="email" id="email" placeholder="{{ __('form.email') }}" class="form-control" required>
                                    <div class="invalid-feedback" data-field="email"></div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="mobile_number">{{ __('form.mobile_number') }}</label>
                                    <input type="tel" name="mobile_number" id="mobile_number" placeholder="{{ __('form.mobile_number') }}" class="form-control" required>
                                    <div class="invalid-feedback" data-field="mobile_number"></div>
                                </div>

                                <!-- Flight Information -->
                                <div class="form-group col-md-6">
                                    <label for="arrival_date">{{ __('form.arrival_date') }}</label>
                                    <input type="date" name="arrival_date" id="arrival_date" placeholder="{{ __('form.arrival_date') }}" class="form-control" required>
                                    <div class="invalid-feedback" data-field="arrival_date"></div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="landing_time">{{ __('form.landing_time') }}</label>
                                    <input type="time" name="landing_time" id="landing_time" placeholder="{{ __('form.landing_time') }}" class="form-control" required>
                                    <div class="invalid-feedback" data-field="landing_time"></div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="flight_number">{{ __('form.flight_number') }}</label>
                                    <input type="text" name="flight_number" id="flight_number" placeholder="{{ __('form.flight_number') }}" class="form-control" required>
                                    <div class="invalid-feedback" data-field="flight_number"></div>
                                </div>

                                <!-- Additional Information -->
                                <div class="form-group col-md-6">
                                    <label for="number_of_people">{{ __('form.number_of_people') }}</label>
                                    <input type="number" name="number_of_people" id="number_of_people" placeholder="{{ __('form.number_of_people') }}" class="form-control" required>
                                    <div class="invalid-feedback" data-field="number_of_people"></div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="vehicle">{{ __('form.vehicle') }}</label>
                                    <input type="text" name="vehicle" id="vehicle" placeholder="{{ __('form.vehicle') }}" class="form-control" required>
                                    <div class="invalid-feedback" data-field="vehicle"></div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="destination_hotel">{{ __('form.destination_hotel') }}</label>
                                    <input type="text" name="destination_hotel" id="destination_hotel" placeholder="{{ __('form.destination_hotel') }}" class="form-control" required>
                                    <div class="invalid-feedback" data-field="destination_hotel"></div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="return_transfer">{{ __('form.return_transfer') }}</label>
                                    <input type="text" name="return_transfer" id="return_transfer" placeholder="{{ __('form.return_transfer') }}" class="form-control" required>
                                    <div class="invalid-feedback" data-field="return_transfer"></div>
                                </div>

                                <!-- SIM Card Information -->
                                <div class="form-group col-md-6">
                                    <label for="sim_card">{{ __('form.sim_card') }}</label>
                                    <input type="text" name="sim_card" id="sim_card" placeholder="{{ __('form.sim_card') }}" class="form-control" required>
                                    <div class="invalid-feedback" data-field="sim_card"></div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="sim_card_option">{{ __('form.sim_card_option') }}</label>
                                    <input type="text" name="sim_card_option" id="sim_card_option" placeholder="{{ __('form.sim_card_option') }}" class="form-control" required>
                                    <div class="invalid-feedback" data-field="sim_card_option"></div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="sim_card_g">{{ __('form.sim_card_g') }}</label>
                                    <input type="text" name="sim_card_g" id="sim_card_g" placeholder="{{ __('form.sim_card_g') }}" class="form-control" required>
                                    <div class="invalid-feedback" data-field="sim_card_g"></div>
                                </div>

                                <!-- Message -->
                                <div class="form-group col-12">
                                    <label for="message">{{ __('form.your_message') }}</label>
                                    <textarea name="message" id="message" cols="30" rows="4" placeholder="{{ __('form.your_message') }}" class="form-control"></textarea>
                                    <div class="invalid-feedback" data-field="message"></div>
                                </div>

                                <!-- Submit Button -->
                                <div class="form-group col-12">
                                    <button class="rn-btn amazing-btn btn-medium submit-btn" type="submit">{{ __('form.submit') }} <i class="icon-4"></i></button>
                                </div>
                            </div>
                        </form>
                        <div id="form-messages" class="mt-3"></div>
                    </div>

                </div>
            </div>
            <div class="col-lg-4">
                <div class="course-sidebar-3 sidebar-top-position">
                    <div class="amazing-course-widget widget-course-summery">
                        <div class="inner">
                            <div class="thumbnail">
                                <img src="{{ asset('/storage/app/public/' . $service->image) }}" alt="Service Image">
                            </div>
                            <div class="content">
                                <h4 class="widget-title">Service Includes:</h4>
                                <ul class="course-item">
                                    <li>
                                        <span class="label"><i class="icon-60"></i>Price:</span>
                                        <span class="value price">${{ $service->price }}</span>
                                    </li>
                                    <li>
                                        <span class="label"><i class="icon-63"></i>Location:</span>
                                        <span class="value">{{ $service->location }}</span>
                                    </li>
                                    <li>
                                        <span class="label"><i class="icon-25"></i>Views:</span>
                                        <span class="value">{{ $service->views->count() }}</span>
                                    </li>
                                </ul>
                                <div class="share-area">
                                    <h4 class="title">Share On:</h4>
                                    <ul class="social-share">
                                        <li>
                                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(Request::fullUrl()) }}" target="_blank">
                                                <i class="icon-facebook"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://twitter.com/intent/tweet?url={{ urlencode(Request::fullUrl()) }}&text={{ urlencode($service->title) }}" target="_blank">
                                                <i class="icon-twitter"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(Request::fullUrl()) }}&title={{ urlencode($service->title) }}" target="_blank">
                                                <i class="icon-linkedin2"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://www.youtube.com/share?url={{ urlencode(Request::fullUrl()) }}" target="_blank">
                                                <i class="icon-youtube"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        $('#subscribe-form').on('submit', function(e) {
            e.preventDefault();
            let form = $(this);
            let submitButton = form.find('.submit-btn');
            let formMessages = $('#form-messages');

            submitButton.prop('disabled', true).html('Submitting... <i class="icon-4"></i>');

            // إزالة رسائل الخطأ السابقة
            form.find('.is-invalid').removeClass('is-invalid');
            form.find('.invalid-feedback').text('');

            $.ajax({
                url: form.attr('action'),
                method: form.attr('method'),
                data: form.serialize(),
                success: function(response) {
                    formMessages.html('<div class="alert alert-success">' + response.message + '</div>');
                    form[0].reset();
                },
                error: function(xhr) {
                    if (xhr.status === 422) {
                        let errors = xhr.responseJSON.errors;
                        $.each(errors, function(key, value) {
                            let field = form.find('[name="' + key + '"]');
                            field.addClass('is-invalid');
                            field.siblings('.invalid-feedback').text(value[0]);
                        });
                    } else {
                        formMessages.html('<div class="alert alert-danger">An error occurred. Please try again later.</div>');
                    }
                },
                complete: function() {
                    submitButton.prop('disabled', false).html('{{ __('form.submit') }} <i class="icon-4"></i>');
                }
            });
        });
    });
</script>
@endsection
