document.addEventListener('DOMContentLoaded', function() {
    const bookingForm = {
        form: document.getElementById('booking-form'),
        stripe: window.stripePublicKey ? Stripe(window.stripePublicKey) : null,
        card: null,
        mapsService: null,
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

        async init() {
            if (window.stripePublicKey) {
                this.initStripe();
            } else {
                console.error('Stripe public key is not configured');
                const paymentSection = document.querySelector('#payment-section');
                if (paymentSection) {
                    paymentSection.innerHTML = '<div class="p-4 text-red-600">Payment system is not properly configured.</div>';
                }
            }
            await this.initMapsService();
            this.initEventListeners();
        },

        initStripe() {
            const elements = this.stripe.elements();
            this.card = elements.create('card');
            this.card.mount('#card-element');

            this.card.addEventListener('change', this.handleCardChange.bind(this));
        },

        async initMapsService() {
            if (mapsConfig.provider === 'google' && mapsConfig.apiKey) {
                await this.loadGoogleMaps();
                this.mapsService = new GoogleMapsService();
            } else {
                await this.loadOpenStreetMap();
                this.mapsService = new OpenStreetMapService();
            }
            this.mapsService.init(this.handleDistanceCalculated.bind(this));
        },

        async loadGoogleMaps() {
            if (window.google) return;

            return new Promise((resolve, reject) => {
                const script = document.createElement('script');
                script.src = `https://maps.googleapis.com/maps/api/js?key=${mapsConfig.apiKey}&libraries=places`;
                script.onload = resolve;
                script.onerror = reject;
                document.head.appendChild(script);
            });
        },

        async loadOpenStreetMap() {
            if (window.L) return;

            await Promise.all([
                this.loadScript('https://unpkg.com/leaflet@1.9.4/dist/leaflet.js'),
                this.loadScript('https://unpkg.com/leaflet-routing-machine@3.2.12/dist/leaflet-routing-machine.js')
            ]);

            const leafletCss = document.createElement('link');
            leafletCss.rel = 'stylesheet';
            leafletCss.href = 'https://unpkg.com/leaflet@1.9.4/dist/leaflet.css';
            document.head.appendChild(leafletCss);
        },

        loadScript(src) {
            return new Promise((resolve, reject) => {
                const script = document.createElement('script');
                script.src = src;
                script.onload = resolve;
                script.onerror = reject;
                document.head.appendChild(script);
            });
        },

        initEventListeners() {
            this.form.addEventListener('submit', this.handleSubmit.bind(this));
            document.getElementById('vehicle_type').addEventListener('change', this.updatePrice.bind(this));
            document.querySelectorAll('input[name="options[]"]').forEach(checkbox => {
                checkbox.addEventListener('change', this.updatePrice.bind(this));
            });
        },

        handleDistanceCalculated(distance, duration) {
            document.querySelector('input[name="distance_km"]').value = distance.toFixed(2);
            document.querySelector('input[name="duration_minutes"]').value = duration;
            this.updatePrice(distance, duration);
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

            if (!this.stripe) {
                const errorElement = document.getElementById('card-errors');
                errorElement.textContent = 'Payment system is not properly configured';
                errorElement.style.display = 'block';
                return;
            }

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
