export class MapsService {
    constructor() {
        this.initializeAutocomplete();
    }

    initializeAutocomplete() {
        const departureInput = document.getElementById('departure');
        const destinationInput = document.getElementById('destination');

        if (departureInput && destinationInput) {
            this.departureAutocomplete = new google.maps.places.Autocomplete(departureInput);
            this.destinationAutocomplete = new google.maps.places.Autocomplete(destinationInput);

            this.setupDistanceCalculation();
        }
    }

    setupDistanceCalculation() {
        this.distanceService = new google.maps.DistanceMatrixService();

        [this.departureAutocomplete, this.destinationAutocomplete].forEach(autocomplete => {
            autocomplete.addListener('place_changed', () => this.calculateDistance());
        });
    }

    async calculateDistance() {
        const departure = this.departureAutocomplete.getPlace();
        const destination = this.destinationAutocomplete.getPlace();

        if (!departure || !destination) return;

        try {
            const response = await this.distanceService.getDistanceMatrix({
                origins: [departure.formatted_address],
                destinations: [destination.formatted_address],
                travelMode: google.maps.TravelMode.DRIVING,
            });

            if (response.rows[0].elements[0].status === 'OK') {
                const distance = response.rows[0].elements[0].distance.value / 1000; // Convert to km
                const duration = Math.ceil(response.rows[0].elements[0].duration.value / 60); // Convert to minutes

                document.querySelector('input[name="distance_km"]').value = distance.toFixed(2);
                document.querySelector('input[name="duration_minutes"]').value = duration;

                // Trigger price calculation
                document.dispatchEvent(new Event('distance-calculated'));
            }
        } catch (error) {
            console.error('Error calculating distance:', error);
        }
    }
}
