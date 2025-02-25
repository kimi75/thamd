class OpenStreetMapService {
    constructor() {
        this.map = null;
        this.departureLocation = null;
        this.destinationLocation = null;
    }

    async init(onDistanceCalculated) {
        this.onDistanceCalculated = onDistanceCalculated;
        await this.initMap();
        this.initAutocomplete();
    }

    async initMap() {
        const mapContainer = document.createElement('div');
        mapContainer.id = 'map';
        mapContainer.style.display = 'none';
        mapContainer.style.height = '400px';
        document.body.appendChild(mapContainer);

        this.map = L.map('map').setView([48.8566, 2.3522], 13);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(this.map);
    }

    initAutocomplete() {
        const departureInput = document.getElementById('form_departure');
        const destinationInput = document.getElementById('form_destination');

        if (departureInput && destinationInput) {
            this.setupAddressAutocomplete(departureInput, 'departure');
            this.setupAddressAutocomplete(destinationInput, 'destination');
        }
    }

    setupAddressAutocomplete(input, type) {
        let resultsContainer = document.createElement('div');
        resultsContainer.className = 'autocomplete-suggestions';
        input.parentNode.appendChild(resultsContainer);

        input.addEventListener('input', async (e) => {
            const query = e.target.value;
            if (query.length < 3) {
                resultsContainer.style.display = 'none';
                return;
            }

            try {
                const results = await this.searchAddress(query);
                this.showResults(results, input, resultsContainer, type);
            } catch (error) {
                console.error('Error fetching addresses:', error);
            }
        });

        document.addEventListener('click', (e) => {
            if (!input.contains(e.target) && !resultsContainer.contains(e.target)) {
                resultsContainer.style.display = 'none';
            }
        });
    }

    async searchAddress(query) {
        const response = await fetch(
            `https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(query)}`
        );
        return await response.json();
    }

    showResults(results, input, container, type) {
        container.innerHTML = '';
        container.style.display = results.length ? 'block' : 'none';

        results.slice(0, 5).forEach(result => {
            const div = document.createElement('div');
            div.className = 'autocomplete-suggestion';
            div.textContent = result.display_name;

            div.addEventListener('click', () => {
                input.value = result.display_name;
                this[`${type}Location`] = [parseFloat(result.lat), parseFloat(result.lon)];
                container.style.display = 'none';
                this.calculateDistance();
            });

            container.appendChild(div);
        });
    }

    async calculateDistance() {
        if (!this.departureLocation || !this.destinationLocation) return;

        try {
            const response = await fetch(
                `https://router.project-osrm.org/route/v1/driving/` +
                `${this.departureLocation[1]},${this.departureLocation[0]};` +
                `${this.destinationLocation[1]},${this.destinationLocation[0]}` +
                `?overview=false`
            );

            const data = await response.json();

            if (data.routes && data.routes.length > 0) {
                const route = data.routes[0];
                const distance = route.distance / 1000;
                const duration = Math.ceil(route.duration / 60);

                if (this.onDistanceCalculated) {
                    this.onDistanceCalculated(distance, duration);
                }
            }
        } catch (error) {
            console.error('Error calculating route:', error);
        }
    }
}
