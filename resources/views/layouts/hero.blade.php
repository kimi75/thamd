@push('scripts')

<section class="hero-carousel">
    <div id="heroCarousel" class="carousel slide carousel-fade">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="image-wrapper bg-image bg-overlay bg-overlay-700" data-image-src="/images/am-drive-mercedes3.jpeg">
                    <div class="bg-content">
                        <div class="carousel-caption top-50 start-50 translate-middle w-100">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-12 col-xl-6 col-lg-6">
                                        <h1 class="display-4 fw-semibold ff-heading text-uppercase">{{ __('hero.hero.title') }}</h1>
                                        <p class="fs-4 mb-0">{{ __('hero.hero.subtitle') }}</p>
                                    </div>
                                    <div class="col-12 col-xl-6 col-lg-6">
                                        <div id="app1">
                                            <div class="form">
                                                <div class="">
                                                    <!-- Étape 1 -->
                                                    <div v-if="currentStep === 1">
                                                        <h4>Étape 1 : Type de Trajet</h4>
                                                        <div class="mb-3">
                                                            <label for="tripType" class="form-label">Type de Trajet</label>
                                                            <select v-model="form.tripType" id="tripType" class="form-select">
                                                                <option value="aller_simple">Aller Simple</option>
                                                                <option value="aller_retour">Aller / Retour</option>
                                                                <option value="mise_a_disposition">Mise à Disposition</option>
                                                            </select>
                                                        </div>

                                                        <!-- Champs pour Aller / Retour -->
                                                        <div v-if="form.tripType === 'aller_retour'" class="mb-3">
                                                            <label for="returnAddress" class="form-label">Adresse de Retour</label>
                                                            <input type="text" v-model="form.returnAddress" id="returnAddress" class="form-control" placeholder="Adresse de retour">
                                                            <label for="returnTime" class="form-label mt-2">Heure de Retour</label>
                                                            <input type="time" v-model="form.returnTime" id="returnTime" class="form-control">
                                                        </div>

                                                        <!-- Champs pour Mise à Disposition -->
                                                        <div v-if="form.tripType === 'mise_a_disposition'" class="mb-3">
                                                            <label for="hours" class="form-label">Nombre d'heures</label>
                                                            <input type="number" v-model="form.hours" id="hours" class="form-control" placeholder="Nombre d'heures">
                                                        </div>

                                                        <button class="btn btn-primary w-100" @click="nextStep">Suivant</button>
                                                    </div>

                                                    <!-- Étape 2 -->
                                                    <div v-if="currentStep === 2">
                                                        <h4>Étape 2 : Type de Véhicule</h4>
                                                        <div class="mb-3">
                                                            <label for="vehicleType" class="form-label">Type de Véhicule</label>
                                                            <select v-model="form.vehicleType" id="vehicleType" class="form-select">
                                                                <option value="class_v">Classe V</option>
                                                                <option value="class_s">Classe S</option>
                                                                <option value="class_e">Classe E</option>
                                                            </select>
                                                        </div>
                                                        <button class="btn btn-secondary w-50" @click="prevStep">Précédent</button>
                                                        <button class="btn btn-primary w-50" @click="nextStep">Suivant</button>
                                                    </div>

                                                    <!-- Étape 3 -->
                                                    <div v-if="currentStep === 3">
                                                        <h4>Étape 3 : Adresses et Heures</h4>
                                                        <div class="mb-3">
                                                            <label for="departureAddress" class="form-label">Adresse de Départ</label>
                                                            <input type="text" id="departureAddress" class="form-control" v-model="form.departureAddress" ref="departureInput">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="departureTime" class="form-label">Heure de Départ</label>
                                                            <input type="time" v-model="form.departureTime" id="departureTime" class="form-control">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="destinationAddress" class="form-label">Adresse de Destination</label>
                                                            <input type="text" id="destinationAddress" class="form-control" v-model="form.destinationAddress" ref="destinationInput">
                                                        </div>
                                                        <button class="btn btn-secondary w-50" @click="prevStep">Précédent</button>
                                                        <button class="btn btn-primary w-50" @click="nextStep">Suivant</button>
                                                    </div>

                                                    <!-- Étape 4 -->
                                                    <div v-if="currentStep === 4">
                                                        <h4>Étape 4 : Informations sur le Voyage</h4>
                                                        <div class="mb-3">
                                                            <label for="baggage" class="form-label">Type de Voyage</label>
                                                            <select v-model="form.baggage" id="baggage" class="form-select">
                                                                <option value="voyage_leger">Voyage Léger</option>
                                                                <option value="1_valise">1 Valise par Personne</option>
                                                                <option value="2_valises">2 Valises par Personne</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="passengers" class="form-label">Nombre de Passagers</label>
                                                            <input type="number" v-model="form.passengers" id="passengers" class="form-control" placeholder="Nombre de passagers">
                                                        </div>
                                                        <button class="btn btn-secondary w-50" @click="prevStep">Précédent</button>
                                                        <button class="btn btn-primary w-50" @click="nextStep">Suivant</button>
                                                    </div>

                                                    <!-- Étape 5 -->
                                                    <div v-if="currentStep === 5">
                                                        <h4>Étape 5 : Informations sur le Client</h4>
                                                        <div class="mb-3">
                                                            <label for="clientName" class="form-label">Nom ou Dénomination Sociale</label>
                                                            <input type="text" v-model="form.clientName" id="clientName" class="form-control" placeholder="Nom ou Société">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="email" class="form-label">Email</label>
                                                            <input type="email" v-model="form.email" id="email" class="form-control" placeholder="Email">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="phone" class="form-label">Téléphone</label>
                                                            <input type="tel" v-model="form.phone" id="phone" class="form-control" placeholder="Téléphone">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="clientType" class="form-label">Vous êtes ?</label>
                                                            <select v-model="form.clientType" id="clientType" class="form-select">
                                                                <option value="entreprise">Entreprise</option>
                                                                <option value="particulier">Particulier</option>
                                                                <option value="administration">Administration</option>
                                                                <option value="association">Association</option>
                                                            </select>
                                                        </div>
                                                        <button class="btn btn-secondary w-50" @click="prevStep">Précédent</button>
                                                        <button class="btn btn-success w-50" @click="submitForm">Soumettre</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    const { createApp } = Vue;

createApp({
    data() {
        return {
            currentStep: 1,
            form: {
                tripType: '',
                returnAddress: '',
                returnTime: '',
                hours: null,
                vehicleType: '',
                departureAddress: '',
                departureTime: '',
                destinationAddress: '',
                baggage: '',
                passengers: 1,
                clientName: '',
                email: '',
                phone: '',
                clientType: ''
            }
        };
    },
    mounted() {
        this.initializeAutocomplete();
    },
    methods: {
        nextStep() {
            // Validation des champs de l'étape actuelle
            if (this.currentStep === 1) {
                if (!this.form.tripType) {
                    alert('Veuillez sélectionner un type de trajet.');
                    return;
                }
                if (this.form.tripType === 'aller_retour' && (!this.form.returnAddress || !this.form.returnTime)) {
                    alert('Veuillez remplir l\'adresse et l\'heure de retour.');
                    return;
                }
                if (this.form.tripType === 'mise_a_disposition' && !this.form.hours) {
                    alert('Veuillez indiquer le nombre d\'heures pour la mise à disposition.');
                    return;
                }
            }
            if (this.currentStep === 3) {
                if (!this.form.departureAddress || !this.form.departureTime || !this.form.destinationAddress) {
                    alert('Veuillez remplir toutes les adresses et heures.');
                    return;
                }
            }

            // Avancer à l'étape suivante
            if (this.currentStep < 5) {
                this.currentStep++;
            }
        },
        prevStep() {
            // Revenir à l'étape précédente
            if (this.currentStep > 1) {
                this.currentStep--;
            }
        },
        submitForm() {
            // Validation finale
            if (!this.form.clientName || !this.form.email || !this.form.phone || !this.form.clientType) {
                alert('Veuillez remplir toutes les informations client.');
                return;
            }
            console.log('Formulaire soumis :', this.form);
            alert('Réservation soumise avec succès !');
        },
        initializeAutocomplete() {
            const options = { types: ['address'], componentRestrictions: { country: 'fr' } };
            const departureInput = this.$refs.departureInput;
            const destinationInput = this.$refs.destinationInput;

            const departureAutocomplete = new google.maps.places.Autocomplete(departureInput, options);
            departureAutocomplete.addListener('place_changed', () => {
                this.form.departureAddress = departureAutocomplete.getPlace().formatted_address;
            });

            const destinationAutocomplete = new google.maps.places.Autocomplete(destinationInput, options);
            destinationAutocomplete.addListener('place_changed', () => {
                this.form.destinationAddress = destinationAutocomplete.getPlace().formatted_address;
            });
        }
    }
}).mount('#app1');
</script>
