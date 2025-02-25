export class MapsServiceInterface {
    constructor() {
        if (this.constructor === MapsServiceInterface) {
            throw new Error("Abstract class 'MapsServiceInterface' cannot be instantiated directly.");
        }
    }

    initializeAutocomplete() {
        throw new Error("Method 'initializeAutocomplete()' must be implemented.");
    }

    setupDistanceCalculation() {
        throw new Error("Method 'setupDistanceCalculation()' must be implemented.");
    }

    async calculateDistance() {
        throw new Error("Method 'calculateDistance()' must be implemented.");
    }

    updateFormFields(distance, duration) {
        document.querySelector('input[name="distance_km"]').value = distance.toFixed(2);
        document.querySelector('input[name="duration_minutes"]').value = duration;
        document.dispatchEvent(new Event('distance-calculated'));
    }
}
