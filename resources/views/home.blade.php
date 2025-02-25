@extends('layouts.app')

@section('head')
    <title>Déclaration Préalable de Travaux: Formulaires, Démarches | Déclaration préalable</title>
    <meta name="description" content="Besoin d'une déclaration préalable de travaux ? Nous simplifions vos démarches. Obtenez rapidement votre déclaration préalable">
    <meta name="keywords" content="déclaration préalable de travaux, déclaration préalable, cerfa 1340411, cerfa 1370311, dp, demande préalable de travaux, déclaration de travaux">
    <meta name="robots" content="index, follow">
    <meta name="author" content="declaration-prealable-de-travaux.fr">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="content-language" content="fr">
    @include('global.ld-json')
@endsection

@section('content')
@include('layouts.hero')

<main>
    <section id="about" class="pt-14 pb-14">
        <div class="container">
            <div class="row align-items-start align-items-md-stretch" data-cues="fadeIn">
                <div class="col-12 col-lg-6 order-1 order-lg-0">
                    <div class="row g-0">
                        <div class="col-12">
                            <figure class="mb-0 pe-3 pe-md-4 pe-lg-5">
                                <img src="/images/chauffeur-privee1.jpg" class="img-fluid w-100 radius15 shadow-sm border-grey" alt="chauffeur privé paris">
                            </figure>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 order-0 order-lg-1">
                    <div class="bg-white h-100 d-flex align-items-center">
                        <div class="p-lg-5 mb-8">
                            <span class="mb-2 fw-medium text-secondary ff-sub text-uppercase ls-1 d-block">
                                {{ trans('home.welcome') }}
                            </span>
                            <h4 class="text-uppercase ff-heading">
                                {{ trans('home.title') }}
                            </h4>
                            <p class="mb-6 text-justify">
                                {{ trans('home.description_1') }}
                            </p>
                            <p class="mb-6 text-justify">
                                {{ trans('home.description_2') }}
                            </p>
                            <p class="mb-6 text-justify">
                                {{ trans('home.description_3') }}
                            </p>
                        </div>
                    </div>
                    <!-- /Description -->
                </div>
            </div>
        </div>
    </section>
    <section id="location" class="bg-primary-50 pt-14 pb-14">
        <div class="container">
            <div class="row g-0 align-items-start align-items-md-stretch" data-cues="fadeIn">
                <div class="col-12 col-xl-4 col-lg-6">
                    <!-- Description -->
                    <div class="bg-white h-100 d-flex align-items-center">
                        <div class="p-6 p-lg-8">
                            <h2 class="text-uppercase ff-heading">{{ __('home.location.title') }}</h2>
                            <p class="fs-6 fw-medium text-secondary text-secondary ff-sub text-uppercase ls-1">
                                {!! __('home.location.icon') !!}
                                <span>{{ __('home.location.address') }}</span>
                            </p>
                            <p>
                                {!! __('home.location.location_icon') !!}
                            </p>
                            <p class="mb-6">{{ __('home.location.map_marker') }}</p>
                        </div>
                    </div>
                    <!-- /Description -->
                </div>
                <div class="col-12 col-xl-8 col-lg-6">
                    <!-- Maps -->
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d20532.352108826017!2d2.2797727481365624!3d48.901217678847736!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e665f44687f905%3A0xd5102e821274f559!2s3%20Rue%20Gilbert%20Rousset%2C%2092600%20Asni%C3%A8res-sur-Seine!5e0!3m2!1sfr!2sfr!4v1733788285317!5m2!1sfr!2sfr" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    <!-- /Maps -->
                </div>
            </div>
        </div>
    </section>

    <section id="vehicles" class="pt-14 pb-14 bg-body" data-bs-theme="dark">
        <div class="container">
            <div class="mb-10 text-center" data-cue="fadeIn">
                <h2 class="text-uppercase ff-heading mb-2">{{ __('home.vehicles.title') }}</h2>
                <h4 class="h6 fw-normal text-body-secondary ff-sub text-uppercase ls-2">{{ __('home.vehicles.subtitle') }}</h4>
            </div>
            <div class="room-luxury-slider" data-cue="fadeIn">
                <div class="mb-5">
                    <div class="card card-overlay-slide text-bg-dark border-0">
                        <img src="/images/chauffeur-privee2.jpeg" class="card-img" alt="{{ __('home.vehicles.mercedes_s') }}">
                        <div class="card-img-overlay">
                            <h3 class="card-title mb-4 h4 ff-sub text-uppercase fw-semibold ls-2">{{ __('home.vehicles.mercedes_s') }}</h3>
                        </div>
                    </div>
                </div>
                <div class="mb-5">
                    <div class="card card-overlay-slide text-bg-dark border-0">
                        <img src="/images/chauffeur-privee4.jpeg"  class="card-img" alt="{{ __('home.vehicles.mercedes_s') }}">
                        <div class="card-img-overlay">
                            <h3 class="card-title mb-4 h4 ff-sub text-uppercase fw-semibold ls-2">{{ __('home.vehicles.mercedes_v') }}</h3>
                        </div>
                    </div>
                </div>
                <div class="mb-5">
                    <div class="card card-overlay-slide text-bg-dark border-0">
                        <img src="/images/eclass2.jpg"  class="card-img" alt="{{ __('home.vehicles.mercedes_s') }}">
                        <div class="card-img-overlay">
                            <h3 class="card-title mb-4 h4 ff-sub text-uppercase fw-semibold ls-2">{{ __('home.vehicles.mercedes_e') }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="facilitiesAmenities" class="pt-14 pb-10">
        <div class="container">
            <div class="mb-10 text-center" data-cue="fadeIn">
                <h2 class="text-uppercase ff-heading mb-2">{{ __('home.facilitiesAmenities.title') }}</h2>
                <p class="h6 fw-medium text-body-secondary ff-sub text-uppercase ls-2">{{ __('home.facilitiesAmenities.subtitle') }}</p>
            </div>
            <div class="row" data-cues="fadeIn">
                @foreach(__('home.facilitiesAmenities.items') as $item)
                    <div class="col-12 col-xl-4 col-md-6">
                        <div class="mb-5">
                            <div class="d-flex align-items-start">
                                <div class="fs-1 text-primary pe-5 lh-sm">
                                    {!! $item['icon'] !!}
                                </div>
                                <div>
                                    <h3 class="h6 text-uppercase ff-sub ls-1">{{ $item['title'] }}</h3>
                                    <p>{{ $item['description'] }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section id="extra-services" class="pt-14 pb-14 bg-primary-50">
        <div class="container">
            <div class="mb-8 text-center" data-cue="fadeIn">
                <h2 class="text-uppercase ff-heading">{{ __('home.extra_services.title') }}</h2>
                <p class="h6 fw-medium text-body-secondary ff-sub text-uppercase ls-2">{{ __('home.extra_services.subtitle') }}</p>
            </div>
            <div class="row g-5" data-cues="fadeIn">
                @foreach(__('home.extra_services.services') as $service)
                    <div class="col-12 col-xl-6">
                        <div class="card border-0 shadow-sm">
                            <div class="row g-0">
                                <div class="col-12 col-xl-6 col-lg-4 col-md-6">
                                    <figure class="card-image-service rounded mb-0">
                                        <img src="{{ $service['image'] }}" class="img-fluid w-100" alt="{{ $service['title'] }}">
                                    </figure>
                                </div>
                                <div class="col-12 col-xl-6 col-lg-8 col-md-6">
                                    <div class="card-body">
                                        <h3 class="card-title h6 text-uppercase ff-sub ls-1">{{ $service['title'] }}</h3>
                                        <p class="card-text">{{ $service['description'] }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section id="testimonials" class="pt-14 pb-14">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="mb-10 text-center" data-cue="fadeIn">
                        <h2 class="text-uppercase ff-heading">{{ __('home.testimonials.title') }}</h2>
                        <p class="h6 fw-medium text-body-secondary ff-sub text-uppercase ls-2">{{ __('home.testimonials.subtitle') }}</p>
                    </div>
                </div>
                <div class="col-12">
                    <div class="testimonial-slider tns-nav-dark text-center" data-cue="fadeIn">
                        @foreach(__('home.testimonials.reviews') as $review)
                            <div class="mb-3">
                                <figure>
                                    <img src="{{ asset($review['image']) }}" class="img-fluid rounded-circle shadow-sm mb-6" width="80" alt="{{ $review['name'] }}">
                                    <div class="mb-2">
                                        <span class="star-rate-view star-rate-size-sm"><span class="star-value rate-50"></span></span>
                                    </div>
                                    <blockquote class="blockquote fst-italic mb-6">
                                        <p>{{ $review['review'] }}</p>
                                    </blockquote>
                                    <figcaption class="blockquote-footer text-body-secondary">
                                        {{ $review['name'] }} <cite title="Source Title">({{ $review['country'] }})</cite>
                                    </figcaption>
                                </figure>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>


@endsection
