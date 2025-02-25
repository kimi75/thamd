<?php

namespace App\Services;

class PriceCalculator
{
    public function calculate(array $data): float
    {
        $basePrice = $data['vehicle']->base_price;
        $distancePrice = $data['distance_km'] * $data['vehicle']->rate_per_km;
        $durationPrice = $data['duration_minutes'] * $data['vehicle']->rate_per_minute;
        
        // Calculate options price
        $optionsPrice = 0;
        if (isset($data['options'])) {
            if (in_array('child_seat', $data['options'])) {
                $optionsPrice += 5;
            }
            if (in_array('bulky_luggage', $data['options'])) {
                $optionsPrice += 10;
            }
        }

        // Calculate time multiplier
        $timeMultiplier = $this->calculateTimeMultiplier($data['departure_time']);
        
        $subtotal = ($basePrice + $distancePrice + $durationPrice + $optionsPrice) * $timeMultiplier;
        
        // Apply round trip discount if applicable
        if ($data['trip_type'] === 'round_trip') {
            $subtotal *= 0.9; // 10% discount
        }

        return round($subtotal, 2);
    }

    private function calculateTimeMultiplier(\DateTime $departureTime): float
    {
        $hour = (int) $departureTime->format('H');
        $dayOfWeek = (int) $departureTime->format('N');
        
        // Night multiplier (22:00-06:00)
        if ($hour >= 22 || $hour < 6) {
            return 1.2;
        }
        
        // Weekend multiplier
        if ($dayOfWeek >= 6) {
            return 1.3;
        }
        
        // Peak hours multiplier (07:00-09:00, 17:00-20:00)
        if (($hour >= 7 && $hour < 9) || ($hour >= 17 && $hour < 20)) {
            return 1.5;
        }
        
        return 1.0;
    }
}