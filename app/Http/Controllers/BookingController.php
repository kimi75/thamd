<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Vehicle;
use App\Services\PriceCalculator;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\PaymentIntent;

class BookingController extends Controller
{
    private PriceCalculator $calculator;

    public function __construct(PriceCalculator $calculator)
    {
        $this->calculator = $calculator;
    }

    public function create()
    {
        $vehicles = Vehicle::all();
        return view('bookings.create', compact('vehicles'));
    }

    public function calculatePrice(Request $request)
    {
        $validated = $request->validate([
            'vehicle_id' => 'required|exists:vehicles,id',
            'departure' => 'required|string',
            'destination' => 'required|string',
            'distance_km' => 'required|numeric',
            'duration_minutes' => 'required|integer',
            'trip_type' => 'required|in:one_way,round_trip',
            'passengers' => 'required|integer',
            'options' => 'array',
            'departure_time' => 'required|date',
        ]);

        $vehicle = Vehicle::findOrFail($validated['vehicle_id']);

        $price = $this->calculator->calculate([
            'vehicle' => $vehicle,
            ...$validated
        ]);

        return response()->json(['price' => $price]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'vehicle_id' => 'required|exists:vehicles,id',
            'departure' => 'required|string',
            'destination' => 'required|string',
            'distance_km' => 'required|numeric',
            'duration_minutes' => 'required|integer',
            'trip_type' => 'required|in:one_way,round_trip',
            'passengers' => 'required|integer',
            'options' => 'array',
            'departure_time' => 'required|date',
            'payment_method_id' => 'required|string',
        ]);

        $vehicle = Vehicle::findOrFail($validated['vehicle_id']);
        $price = $this->calculator->calculate([
            'vehicle' => $vehicle,
            ...$validated
        ]);

        // Create Stripe Payment Intent
        Stripe::setApiKey(config('services.stripe.secret'));

        try {
            $paymentIntent = PaymentIntent::create([
                'amount' => $price * 100, // Convert to cents
                'currency' => 'eur',
                'payment_method' => $validated['payment_method_id'],
                'confirmation_method' => 'manual',
                'confirm' => true,
            ]);

            // Create booking
            $booking = Booking::create([
                'user_id' => auth()->id(),
                'vehicle_id' => $validated['vehicle_id'],
                'departure' => $validated['departure'],
                'destination' => $validated['destination'],
                'distance_km' => $validated['distance_km'],
                'duration_minutes' => $validated['duration_minutes'],
                'trip_type' => $validated['trip_type'],
                'passengers' => $validated['passengers'],
                'options' => $validated['options'],
                'total_price' => $price,
                'status' => 'confirmed',
            ]);

            // Create payment record
            $booking->payment()->create([
                'amount' => $price,
                'status' => 'completed',
                'stripe_transaction_id' => $paymentIntent->id,
            ]);

            return response()->json([
                'status' => 'success',
                'booking' => $booking,
                'client_secret' => $paymentIntent->client_secret,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ], 500);
        }
    }
}
