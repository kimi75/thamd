@extends('layouts.app')

@section('content')
<div x-data="bookingWizard()" class="container mx-auto px-4 py-8">
    <div class="max-w-3xl mx-auto">
        <!-- Progress Bar -->
        <div class="mb-8">
            <div class="relative pt-1">
                <div class="flex mb-2 items-center justify-between">
                    <div class="flex-1">
                        <div class="h-2 bg-gray-200 rounded-full">
                            <div class="h-2 bg-blue-600 rounded-full transition-all duration-500"
                                 :style="{ width: `${((step - 1) * 50)}%` }"></div>
                        </div>
                    </div>
                </div>
                <div class="flex justify-between">
                    <span :class="{ 'text-blue-600 font-bold': step >= 1 }">Vehicle</span>
                    <span :class="{ 'text-blue-600 font-bold': step >= 2 }">Trip Details</span>
                    <span :class="{ 'text-blue-600 font-bold': step >= 3 }">Payment</span>
                </div>
            </div>
        </div>

        <!-- Vehicle Selection Step -->
        <div x-show="step === 1" class="bg-white rounded-lg shadow-sm p-6">
            <h3 class="text-lg font-semibold mb-4">Select Your Vehicle</h3>
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Vehicle Type</label>
                    <select x-model="formData.vehicleType"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        <option value="">Select a vehicle</option>
                        <option value="sedan">Mercedes Class E (Sedan)</option>
                        <option value="van">Mercedes Van Class V (Van)</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Number of Passengers</label>
                    <input type="number" x-model="formData.passengers"
                           :max="formData.vehicleType === 'van' ? 7 : 4"
                           min="1"
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>

                <button @click="nextStep()"
                        :disabled="!formData.vehicleType || !formData.passengers"
                        class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 disabled:opacity-50">
                    Next
                </button>
            </div>
        </div>

        <!-- Trip Details Step -->
        <div x-show="step === 2" class="bg-white rounded-lg shadow-sm p-6">
            <h3 class="text-lg font-semibold mb-4">Trip Details</h3>
            <div class="space-y-4">
                <div class="relative">
                    <label class="block text-sm font-medium text-gray-700">Departure</label>
                    <input type="text" id="form_departure" x-model="formData.departure"
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>

                <div class="relative">
                    <label class="block text-sm font-medium text-gray-700">Destination</label>
                    <input type="text" id="form_destination" x-model="formData.destination"
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Departure Time</label>
                    <input type="datetime-local" x-model="formData.departureTime"
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Trip Type</label>
                    <select x-model="formData.tripType"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        <option value="one_way">One Way</option>
                        <option value="round_trip">Round Trip (-10%)</option>
                    </select>
                </div>

                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">Additional Options</label>
                    <div class="space-y-2">
                        <label class="inline-flex items-center">
                            <input type="checkbox" x-model="formData.options" value="child_seat"
                                   class="rounded border-gray-300 text-blue-600 shadow-sm">
                            <span class="ml-2">Child Seat (+€5)</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="checkbox" x-model="formData.options" value="bulky_luggage"
                                   class="rounded border-gray-300 text-blue-600 shadow-sm">
                            <span class="ml-2">Bulky Luggage (+€10)</span>
                        </label>
                    </div>
                </div>

                <div class="flex space-x-4">
                    <button @click="previousStep()"
                            class="w-1/2 bg-gray-200 text-gray-700 py-2 px-4 rounded-md hover:bg-gray-300">
                        Back
                    </button>
                    <button @click="nextStep()"
                            :disabled="!formData.departure || !formData.destination || !formData.departureTime"
                            class="w-1/2 bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 disabled:opacity-50">
                        Next
                    </button>
                </div>
            </div>
        </div>

        <!-- Payment Step -->
        <div x-show="step === 3" class="bg-white rounded-lg shadow-sm p-6">
            <h3 class="text-lg font-semibold mb-4">Payment Details</h3>

            <!-- Price Breakdown -->
            <div class="mb-6 p-4 bg-gray-50 rounded-md">
                <h4 class="font-medium mb-2">Price Breakdown</h4>
                <div class="space-y-2">
                    <div class="flex justify-between">
                        <span>Base Price:</span>
                        <span x-text="`€${calculateBasePrice()}`"></span>
                    </div>
                    <div class="flex justify-between">
                        <span>Distance (<span x-text="formData.distance_km"></span>km):</span>
                        <span x-text="`€${calculateDistancePrice()}`"></span>
                    </div>
                    <div class="flex justify-between">
                        <span>Duration (<span x-text="formData.duration_minutes"></span>min):</span>
                        <span x-text="`€${calculateDurationPrice()}`"></span>
                    </div>
                    <div class="flex justify-between">
                        <span>Options:</span>
                        <span x-text="`€${calculateOptionsPrice()}`"></span>
                    </div>
                    <template x-if="formData.tripType === 'round_trip'">
                        <div class="flex justify-between text-green-600">
                            <span>Round Trip Discount:</span>
                            <span x-text="`-€${calculateDiscount()}`"></span>
                        </div>
                    </template>
                    <div class="flex justify-between font-bold pt-2 border-t">
                        <span>Total:</span>
                        <span x-text="`€${calculateTotal()}`"></span>
                    </div>
                </div>
            </div>

            <!-- Stripe Card Element -->
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">Card Information</label>
                <div id="card-element" class="p-3 border rounded-md"></div>
                <div id="card-errors" class="mt-2 text-sm text-red-600" role="alert"></div>
            </div>

            <div class="flex space-x-4">
                <button @click="previousStep()"
                        class="w-1/2 bg-gray-200 text-gray-700 py-2 px-4 rounded-md hover:bg-gray-300">
                    Back
                </button>
                <button @click="submitBooking()"
                        :disabled="processing"
                        class="w-1/2 bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 disabled:opacity-50"
                        x-text="processing ? 'Processing...' : 'Complete Booking'">
                </button>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
function bookingWizard() {
    return {
        step: 1,
        processing: false,
        formData: {
            vehicleType: '',
            passengers: 1,
            departure: '',
            destination: '',
            departureTime: '',
            tripType: 'one_way',
            options: [],
            distance_km: 0,
            duration_minutes: 0
        },
        stripe: null,
        card: null,

        init() {
            if (window.stripePublicKey) {
                this.stripe = Stripe(window.stripePublicKey);
                const elements = this.stripe.elements();
                this.card = elements.create('card');
                this.$nextTick(() => {
                    this.card.mount('#card-element');
                    this.card.addEventListener('change', this.handleCardChange.bind(this));
                });
            }

            // Initialize maps service
            const mapsService = window.googleMapsKey ? new GoogleMapsService() : new OpenStreetMapService();
            mapsService.init((distance, duration) => {
                this.formData.distance_km = parseFloat(distance.toFixed(2));
                this.formData.duration_minutes = duration;
            });
        },

        nextStep() {
            if (this.step < 3) {
                this.step++;
            }
        },

        previousStep() {
            if (this.step > 1) {
                this.step--;
            }
        },

        calculateBasePrice() {
            const prices = { sedan: 30, van: 50 };
            return prices[this.formData.vehicleType] || 0;
        },

        calculateDistancePrice() {
            const rates = { sedan: 2, van: 2.5 };
            return (this.formData.distance_km * (rates[this.formData.vehicleType] || 0)).toFixed(2);
        },

        calculateDurationPrice() {
            const rates = { sedan: 0.5, van: 0.6 };
            return (this.formData.duration_minutes * (rates[this.formData.vehicleType] || 0)).toFixed(2);
        },

        calculateOptionsPrice() {
            const prices = { child_seat: 5, bulky_luggage: 10 };
            return this.formData.options.reduce((total, option) => total + (prices[option] || 0), 0).toFixed(2);
        },

        calculateSubtotal() {
            return parseFloat(this.calculateBasePrice()) +
                   parseFloat(this.calculateDistancePrice()) +
                   parseFloat(this.calculateDurationPrice()) +
                   parseFloat(this.calculateOptionsPrice());
        },

        calculateDiscount() {
            return this.formData.tripType === 'round_trip' ?
                   (this.calculateSubtotal() * 0.1).toFixed(2) : 0;
        },

        calculateTotal() {
            return (this.calculateSubtotal() - parseFloat(this.calculateDiscount())).toFixed(2);
        },

        handleCardChange(event) {
            const displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        },

        async submitBooking() {
            if (!this.stripe || !this.card) {
                console.error('Stripe not initialized');
                return;
            }

            this.processing = true;

            try {
                const { paymentMethod, error } = await this.stripe.createPaymentMethod('card', this.card);

                if (error) {
                    throw new Error(error.message);
                }

                const response = await fetch('/bookings', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({
                        ...this.formData,
                        payment_method_id: paymentMethod.id,
                        total_price: this.calculateTotal()
                    })
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
            } finally {
                this.processing = false;
            }
        }
    }
}
</script>
@endpush
@endsection
