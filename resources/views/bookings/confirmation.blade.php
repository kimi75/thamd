<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmation</title>
    @vite(['resources/css/app.css'])
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-2xl mx-auto bg-white rounded-lg shadow-lg p-6">
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-gray-900">Booking Confirmed!</h1>
                <p class="text-gray-600 mt-2">Thank you for choosing our service</p>
            </div>

            <div class="space-y-6">
                <!-- Booking Details -->
                <div class="border-b pb-4">
                    <h2 class="text-xl font-semibold mb-4">Trip Details</h2>
                    <dl class="grid grid-cols-1 gap-3">
                        <div class="grid grid-cols-3 gap-4">
                            <dt class="text-gray-600">Booking ID:</dt>
                            <dd class="col-span-2 font-medium">{{ $booking->id }}</dd>
                        </div>
                        <div class="grid grid-cols-3 gap-4">
                            <dt class="text-gray-600">Vehicle:</dt>
                            <dd class="col-span-2">{{ $booking->vehicle->type }}</dd>
                        </div>
                        <div class="grid grid-cols-3 gap-4">
                            <dt class="text-gray-600">From:</dt>
                            <dd class="col-span-2">{{ $booking->departure }}</dd>
                        </div>
                        <div class="grid grid-cols-3 gap-4">
                            <dt class="text-gray-600">To:</dt>
                            <dd class="col-span-2">{{ $booking->destination }}</dd>
                        </div>
                        <div class="grid grid-cols-3 gap-4">
                            <dt class="text-gray-600">Trip Type:</dt>
                            <dd class="col-span-2">{{ ucfirst(str_replace('_', ' ', $booking->trip_type)) }}</dd>
                        </div>
                        <div class="grid grid-cols-3 gap-4">
                            <dt class="text-gray-600">Passengers:</dt>
                            <dd class="col-span-2">{{ $booking->passengers }}</dd>
                        </div>
                    </dl>
                </div>

                <!-- Price Breakdown -->
                <div class="border-b pb-4">
                    <h2 class="text-xl font-semibold mb-4">Price Details</h2>
                    <dl class="space-y-2">
                        <div class="flex justify-between">
                            <dt class="text-gray-600">Base Price:</dt>
                            <dd>€{{ number_format($booking->vehicle->base_price, 2) }}</dd>
                        </div>
                        <div class="flex justify-between">
                            <dt class="text-gray-600">Distance ({{ $booking->distance_km }} km):</dt>
                            <dd>€{{ number_format($booking->distance_km * $booking->vehicle->rate_per_km, 2) }}</dd>
                        </div>
                        <div class="flex justify-between">
                            <dt class="text-gray-600">Duration ({{ $booking->duration_minutes }} min):</dt>
                            <dd>€{{ number_format($booking->duration_minutes * $booking->vehicle->rate_per_minute, 2) }}</dd>
                        </div>
                        @if(!empty($booking->options))
                            @foreach($booking->options as $option)
                                <div class="flex justify-between">
                                    <dt class="text-gray-600">{{ ucfirst(str_replace('_', ' ', $option)) }}:</dt>
                                    <dd>€{{ $option === 'child_seat' ? '5.00' : '10.00' }}</dd>
                                </div>
                            @endforeach
                        @endif
                        <div class="flex justify-between font-bold pt-2 border-t">
                            <dt>Total:</dt>
                            <dd>€{{ number_format($booking->total_price, 2) }}</dd>
                        </div>
                    </dl>
                </div>

                <!-- Payment Information -->
                <div>
                    <h2 class="text-xl font-semibold mb-4">Payment Information</h2>
                    <dl class="space-y-2">
                        <div class="grid grid-cols-3 gap-4">
                            <dt class="text-gray-600">Status:</dt>
                            <dd class="col-span-2">
                                <span class="px-2 py-1 rounded-full text-sm font-semibold bg-green-100 text-green-800">
                                    Paid
                                </span>
                            </dd>
                        </div>
                        <div class="grid grid-cols-3 gap-4">
                            <dt class="text-gray-600">Transaction ID:</dt>
                            <dd class="col-span-2 font-mono text-sm">{{ $booking->payment->stripe_transaction_id }}</dd>
                        </div>
                    </dl>
                </div>
            </div>

            <div class="mt-8 text-center">
                <a href="{{ route('bookings.create') }}" class="inline-block bg-indigo-600 text-white px-6 py-2 rounded-md hover:bg-indigo-700">
                    Book Another Trip
                </a>
            </div>
        </div>
    </div>
</body>
</html>