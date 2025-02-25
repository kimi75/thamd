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
<section class="image-wrapper bg-image-2 bg-cover bg-overlay bg-overlay-700 text-body text-center pt-28 pb-20 pheader-cover">
    <div class="bg-content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-xl-7 col-lg-9 col-md-11">
                    <h1 class="text-uppercase ff-heading">{{ __('services.services_section.title') }}</h1>
                    <p class="fs-4 fw-normal">{{ __('services.services_section.subtitle') }}</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="services" class="pt-14 pb-14 bg-black">
    <div class="container">
        <div class="row g-4 g-md-6">
            @php
                $services = trans('services.services'); // Charger les services à partir des traductions
            @endphp

            @foreach ($services as $service)
                <div class="col-12 col-xl-4 col-lg-6">
                    <!-- Service item -->
                    <div class="card card-overlay-slide text-bg-dark border-0">
                        <img src="/images/am-drive-paris/{{ $service['image'] }}" class="card-img h335" alt="{{ $service['title'] }}">
                        <div class="card-img-overlay">
                            <span class="d-block mb-2">
                                <strong>{{ $service['price'] }}</strong>
                            </span>
                            <h3 class="card-title mb-4 h4 ff-sub text-uppercase fw-semibold ls-2">{{ $service['title'] }}</h3>
                            <div class="card-link d-flex align-items-center">
                                <a href="reservation.html" class="btn btn-primary me-4">
                                    <i class="hicon hicon-menu-calendar"></i>
                                    <span>{{ $service['button_text'] }}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- /Service item -->
                </div>
            @endforeach
        </div>
    </div>
</section>




@endsection
