class GoogleMapsService {
    constructor() {
        this.distanceService = new google.maps.DistanceMatrixService();
    }

    init(onDistanceCalculated) {
        this.onDistanceCalculated = onDistanceCalculated;
        this.initAutocomplete();
    }

    initAutocomplete() {
        const departureInput = document.getElementById('form_departure');
        const destinationInput = document.getElementById('form_destination');

        if (departureInput && destinationInput) {
            this.departureAutocomplete = new google.maps.places.Autocomplete(departureInput);
            this.destinationAutocomplete = new google.maps.places.Autocomplete(destinationInput);

            [this.departureAutocomplete, this.destinationAutocomplete].forEach(autocomplete => {
                autocomplete.addListener('place_changed', () => this.calculateDistance());
            });
        }
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
                const distance = response.rows[0].elements[0].distance.value / 1000;
                const duration = Math.ceil(response.rows[0].elements[0].duration.value / 60);

                if (this.onDistanceCalculated) {
                    this.onDistanceCalculated(distance, duration);
                }
            }
        } catch (error) {
            console.error('Error calculating distance:', error);
        }
    }
}
