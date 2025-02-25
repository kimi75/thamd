
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="/images/favicon.png">
    <link href="/assets/css/bundle.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
@if(config('services.google.maps_key') && config('services.google.maps_key') !== 'your_google_maps_api_key')
    <script src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google.maps_key') }}&libraries=places"></script>
@else
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@3.2.12/dist/leaflet-routing-machine.css" />
@endif

    <script>
        window.googleMapsKey = "{{ config('services.google.maps_key') }}";
        window.stripePublicKey = "{{ config('services.stripe.key') }}";
    </script>

    <!-- Vue.js CDN -->
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <script src="https://js.stripe.com/v3/"></script>
