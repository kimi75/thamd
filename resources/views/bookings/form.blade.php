@extends('layouts.app')

@section('content')
<div id="app" class="container py-5">
    <h2 class="text-center mb-4">Réserver un service</h2>
    <div class="card">
        <div class="card-body">
            <div v-if="currentStep === 1">
                <h3>1. Adresse</h3>
                <div class="mb-3">
                    <label for="departureAddress" class="form-label">Adresse de départ</label>
                    <input type="text"
                           id="departureAddress"
                           class="form-control"
                           v-model="form.departureAddress"
                           placeholder="Commencez à taper une adresse"
                           ref="departureInput">
                </div>
                <div class="mb-3">
                    <label for="departureTime" class="form-label">Heure de départ</label>
                    <input type="time" v-model="form.departureTime" id="departureTime" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="destinationAddress" class="form-label">Adresse de destination</label>
                    <input type="text"
                           id="destinationAddress"
                           class="form-control"
                           v-model="form.destinationAddress"
                           placeholder="Commencez à taper une adresse"
                           ref="destinationInput">
                </div>
                <button class="btn btn-primary" @click="nextStep">Suivant</button>
            </div>

            <div v-else-if="currentStep === 2">
                <h3>2. Validation</h3>
                <p><strong>Adresse de départ :</strong> {{ form.departureAddress }}</p>
                <p><strong>Adresse de destination :</strong> {{ form.destinationAddress }}</p>
                <button class="btn btn-secondary" @click="prevStep">Précédent</button>
                <button class="btn btn-success" @click="submitForm">Soumettre</button>
            </div>
        </div>
    </div>
</div>




@push('scripts')
<script>
const { createApp } = Vue;

createApp({
    data() {
        return {
            currentStep: 1,
            form: {
                departureAddress: '',
                departureTime: '',
                destinationAddress: ''
            },
            autocompleteDeparture: null,
            autocompleteDestination: null
        };
    },
    mounted() {
        this.initializeAutocomplete();
    },
    methods: {
        nextStep() {
            if (this.currentStep < 2) {
                this.currentStep++;
            }
        },
        prevStep() {
            if (this.currentStep > 1) {
                this.currentStep--;
            }
        },
        submitForm() {
            console.log('Form data:', this.form);
            alert('Formulaire soumis avec succès !');
        },
        initializeAutocomplete() {
            const options = {
                componentRestrictions: { country: 'fr' }, // Restreint les résultats à la France
                fields: ['formatted_address'],
                types: ['address'] // Limite les résultats aux adresses
            };

            // Autocomplete pour l'adresse de départ
            const departureInput = this.$refs.departureInput;
            this.autocompleteDeparture = new google.maps.places.Autocomplete(departureInput, options);
            this.autocompleteDeparture.addListener('place_changed', () => {
                const place = this.autocompleteDeparture.getPlace();
                this.form.departureAddress = place.formatted_address;
            });

            // Autocomplete pour l'adresse de destination
            const destinationInput = this.$refs.destinationInput;
            this.autocompleteDestination = new google.maps.places.Autocomplete(destinationInput, options);
            this.autocompleteDestination.addListener('place_changed', () => {
                const place = this.autocompleteDestination.getPlace();
                this.form.destinationAddress = place.formatted_address;
            });
        }
    }
}).mount('#app');
</script>
@endpush
@endsection
