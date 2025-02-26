document.addEventListener('DOMContentLoaded', function() {
    const bookingForm = {
        form: document.getElementById('booking-form'),
        stripe: Stripe(stripePublicKey),
        card: null,
        priceData: {
            basePrice: {
                sedan: 30,
                van: 50
            },
            ratePerKm: {
                sedan: 2,
                van: 2.5
            },
            ratePerMinute: {
                sedan: 0.5,
                van: 0.6
            },
            options: {
                child_seat: 5,
                bulky_luggage: 10
            }
        },

        init() {
            this.initStripe();
            this.initAutocomplete();
            this.initEventListeners();
        },

        initStripe() {
            const elements = this.stripe.elements();
            this.card = elements.create('card');
            this.card.mount('#card-element');

            this.card.addEventListener('change', this.handleCardChange.bind(this));
        },

        initAutocomplete() {
            // Initialisation de l'autocomplétion pour les adresses
            this.setupAddressAutocomplete('form_departure');
            this.setupAddressAutocomplete('form_destination');
        },

        initEventListeners() {
            this.form.addEventListener('submit', this.handleSubmit.bind(this));
            document.getElementById('vehicle_type').addEventListener('change', this.updatePrice.bind(this));
            document.querySelectorAll('input[name="options[]"]').forEach(checkbox => {
                checkbox.addEventListener('change', this.updatePrice.bind(this));
            });
        },

        setupAddressAutocomplete(inputId) {
            const input = document.getElementById(inputId);
            const autocomplete = new google.maps.places.Autocomplete(input);

            autocomplete.addListener('place_changed', () => {
                const place = autocomplete.getPlace();
                if (place.geometry) {
                    this.calculateDistance();
                }
            });
        },

        async calculateDistance() {
            const departure = document.getElementById('form_departure').value;
            const destination = document.getElementById('form_destination').value;

            if (!departure || !destination) return;

            const service = new google.maps.DistanceMatrixService();

            try {
                const response = await service.getDistanceMatrix({
                    origins: [departure],
                    destinations: [destination],
                    travelMode: google.maps.TravelMode.DRIVING,
                });

                if (response.rows[0].elements[0].status === 'OK') {
                    const distance = response.rows[0].elements[0].distance.value / 1000;
                    const duration = Math.ceil(response.rows[0].elements[0].duration.value / 60);

                    this.updatePrice(distance, duration);
                }
            } catch (error) {
                console.error('Erreur lors du calcul de la distance:', error);
            }
        },

        updatePrice(distance = 0, duration = 0) {
            const vehicleType = document.getElementById('vehicle_type').value;
            const basePrice = this.priceData.basePrice[vehicleType] || 0;
            const distancePrice = distance * (this.priceData.ratePerKm[vehicleType] || 0);
            const durationPrice = duration * (this.priceData.ratePerMinute[vehicleType] || 0);

            let optionsPrice = 0;
            document.querySelectorAll('input[name="options[]"]:checked').forEach(option => {
                optionsPrice += this.priceData.options[option.value] || 0;
            });

            const total = basePrice + distancePrice + durationPrice + optionsPrice;

            // Mise à jour de l'affichage
            document.getElementById('base-price').textContent = `${basePrice.toFixed(2)} €`;
            document.getElementById('distance-price').textContent = `${distancePrice.toFixed(2)} €`;
            document.getElementById('options-price').textContent = `${optionsPrice.toFixed(2)} €`;
            document.getElementById('total-price').textContent = `${total.toFixed(2)} €`;
        },

        handleCardChange(event) {
            const displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
                displayError.style.display = 'block';
            } else {
                displayError.textContent = '';
                displayError.style.display = 'none';
            }
        },

        async handleSubmit(event) {
            event.preventDefault();

            const submitButton = this.form.querySelector('button[type="submit"]');
            submitButton.disabled = true;

            try {
                const { paymentMethod, error } = await this.stripe.createPaymentMethod('card', this.card);

                if (error) {
                    throw new Error(error.message);
                }

                const formData = new FormData(this.form);
                formData.append('payment_method_id', paymentMethod.id);

                const response = await fetch(this.form.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    }
                });

                const result = await response.json();

                if (result.status === 'success') {
                    window.location.href = `/bookings/${result.booking.id}/confirmation`;
                } else {
                    throw new Error(result.message);
                }
            } catch (error) {
                const errorElement = document.getElementById('card-errors');
                errorElement.textContent = error.message;
                errorElement.style.display = 'block';
                submitButton.disabled = false;
            }
        }
    };

    bookingForm.init();
});
