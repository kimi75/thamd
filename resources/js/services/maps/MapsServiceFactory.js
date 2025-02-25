import { GoogleMapsService } from './GoogleMapsService';
import { OpenStreetMapService } from './OpenStreetMapService';

export class MapsServiceFactory {
    static create() {
        const googleMapsKey = window.googleMapsKey || '';

        if (googleMapsKey && googleMapsKey !== 'your_google_maps_api_key') {
            return new GoogleMapsService();
        }

        return new OpenStreetMapService();
    }
}
