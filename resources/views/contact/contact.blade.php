@extends('layouts.app')

@section('head')
    <title>Centre de support | Wafa Lahmar Architecte</title>
    <meta name="description" content="Centre de support, contactez-nous dès maintenant">
    <meta name="keywords" content="Centre de support, contactez-nous dès maintenant">
    <meta name="robots" content="index, follow">
    <meta name="author" content="Wafa Lahmar">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="content-language" content="fr">
    @include('global.ld-json')
@endsection


@section('content')
<div id="content" class="site-content">
    <div class="page-header dtable text-center header-transparent page-header-contact">
        <div class="dcell">
            <div class="container">
                <h1 class="page-title">{{ __('contact.contact.header.title') }}</h1>
                <ul id="breadcrumbs" class="breadcrumbs none-style">
                    <li><a>{{ __('contact.contact.header.subtitle') }}</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<section class="wrapper bg-light">
    <div class="container py-14 py-md-16">
        <div class="row">
            <div class="col-xl-10 mx-auto">
                <div class="row gy-10 gx-lg-8 gx-xl-12">
                    <div class="col-lg-8">
                        <form class="contact-form needs-validation" method="post" action="{{ route('contact.send') }}" novalidate>
                            @csrf <!-- Ajout de la protection CSRF -->
                            <div class="messages"></div>
                            <div class="row gx-4">
                                <!-- Nom complet -->
                                <div class="col-md-6">
                                    <div class="form-floating mb-4">
                                        <input id="form_name" type="text" name="name" class="form-control" placeholder="{{ __('contact.contact.placeholders.name') }}" required>
                                        <label for="form_name">{{ __('contact.contact.form.name') }}</label>
                                    </div>
                                </div>
                                <!-- /column -->

                                <!-- Téléphone -->
                                <div class="col-md-6">
                                    <div class="form-floating mb-4">
                                        <input id="form_phone" type="tel" name="phone" class="form-control" placeholder="{{ __('contact.contact.placeholders.phone') }}" required>
                                        <label for="form_phone">{{ __('contact.contact.form.phone') }}</label>
                                    </div>
                                </div>
                                <!-- /column -->

                                <!-- Email -->
                                <div class="col-md-12">
                                    <div class="form-floating mb-4">
                                        <input id="form_email" type="email" name="email" class="form-control" placeholder="{{ __('contact.contact.placeholders.email') }}" required>
                                        <label for="form_email">{{ __('contact.contact.form.email') }}</label>
                                    </div>
                                </div>
                                <!-- /column -->

                                <!-- Adresse de départ avec autocomplétion -->
                                <div class="col-md-6">
                                    <div class="form-floating mb-4">
                                        <input id="form_pickup" type="text" name="pickup" class="form-control" placeholder="{{ __('contact.contact.placeholders.pickup') }}" required>
                                        <label for="form_pickup">{{ __('contact.contact.form.pickup') }}</label>
                                        <div id="autocomplete-pickup" class="autocomplete-suggestions"></div>
                                    </div>
                                </div>
                                <!-- /column -->

                                <!-- Adresse de destination avec autocomplétion -->
                                <div class="col-md-6">
                                    <div class="form-floating mb-4">
                                        <input id="form_destination" type="text" name="destination" class="form-control" placeholder="{{ __('contact.contact.placeholders.destination') }}" required>
                                        <label for="form_destination">{{ __('contact.contact.form.destination') }}</label>
                                        <div id="autocomplete-destination" class="autocomplete-suggestions"></div>
                                    </div>
                                </div>
                                <!-- /column -->

                                <!-- Date et heure de prise en charge -->
                                <div class="col-md-6">
                                    <div class="form-floating mb-4">
                                        <input id="form_datetime" type="datetime-local" name="datetime" class="form-control" placeholder="{{ __('contact.contact.placeholders.datetime') }}" required>
                                        <label for="form_datetime">{{ __('contact.contact.form.datetime') }}</label>
                                    </div>
                                </div>
                                <!-- /column -->

                                <!-- Type de véhicule -->
                                <div class="col-md-6">
                                    <div class="form-select-wrapper mb-4">
                                        <select class="form-select" id="form-select" name="vehicle_type" required>
                                            <option selected disabled value="">{{ __('contact.contact.select.vehicle_options.default') }}</option>
                                            <option value="Mercedes Classe S">{{ __('contact.contact.select.vehicle_options.s_class') }}</option>
                                            <option value="Mercedes Classe E">{{ __('contact.contact.select.vehicle_options.e_class') }}</option>
                                            <option value="VAN VIP">{{ __('contact.contact.select.vehicle_options.van_vip') }}</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- /column -->

                                <!-- Message ou demandes spéciales -->
                                <div class="col-12">
                                    <div class="form-floating mb-4">
                                        <textarea id="form_message" name="message" class="form-control" placeholder="{{ __('contact.contact.placeholders.message') }}" style="height: 150px"></textarea>
                                        <label for="form_message">{{ __('contact.contact.form.message') }}</label>
                                    </div>
                                </div>
                                <!-- /column -->

                                <!-- Bouton de soumission -->
                                <div class="col-12">
                                    <input type="submit" class="btn btn-primary rounded-pill btn-send mb-3" value="{{ __('contact.contact.form.button') }}">
                                    <p class="text-muted">{{ __('contact.contact.form.required_note') }}</p>
                                </div>
                                <!-- /column -->
                            </div>
                            <!-- /.row -->
                        </form>
                        <!-- /form -->
                    </div>
                    <!--/column -->

                    <!-- Informations de contact -->
                    <div class="col-lg-4">
                        <div class="d-flex flex-row mb-4">
                            <div>
                                <div class="icon text-primary fs-28 me-4 mt-n1"> <i class="uil uil-location-pin-alt"></i> </div>
                            </div>
                            <div>
                                <h5 class="mb-1">{{ __('contact.contact.contact_info.address_title') }}</h5>
                                <address>{{ __('contact.contact.contact_info.address') }}</address>
                            </div>
                        </div>
                        <div class="d-flex flex-row mb-4">
                            <div>
                                <div class="icon text-primary fs-28 me-4 mt-n1"> <i class="uil uil-phone-volume"></i> </div>
                            </div>
                            <div>
                                <h5 class="mb-1">{{ __('contact.contact.contact_info.phone_title') }}</h5>
                                <p>{{ __('contact.contact.contact_info.phone') }}</p>
                            </div>
                        </div>
                        <div class="d-flex flex-row">
                            <div>
                                <div class="icon text-primary fs-28 me-4 mt-n1"> <i class="uil uil-envelope"></i> </div>
                            </div>
                            <div>
                                <h5 class="mb-1">{{ __('contact.contact.contact_info.email_title') }}</h5>
                                <p class="mb-0"><a href="mailto:{{ __('contact.contact.contact_info.email') }}" class="text-body">{{ __('contact.contact.contact_info.email') }}</a></p>
                            </div>
                        </div>
                    </div>
                    <!--/column -->
                </div>
                <!--/.row -->
            </div>
            <!-- /column -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</section>



@endsection
