<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>New Car Added</title>
</head>
<body style="font-family: Arial, sans-serif; background-color:#f9fafb; padding:20px;">

    <div style="max-width:600px; margin:auto; background:#ffffff; padding:20px; border-radius:8px;">
        <h2 style="color:#2563eb;">🚗 New Car Added</h2>

        <p><strong>Make:</strong> {{ $car->make }}</p>
        <p><strong>Model:</strong> {{ $car->model }}</p>
        <p><strong>Year:</strong> {{ $car->year }}</p>
        <p><strong>Price:</strong> ${{ number_format($car->price, 2) }}</p>
        <p><strong>Status:</strong> {{ ucfirst($car->status) }}</p>

        @if($car->description)
            <p><strong>Description:</strong></p>
            <p>{{ $car->description }}</p>
        @endif

        <hr style="margin:20px 0;">

        <p>
            <a href="{{ route('cars.show', $car) }}"
               target="_blank"
               style="display:inline-block; padding:10px 16px; background:#16a34a; color:#ffffff; text-decoration:none; border-radius:6px;">
                View Car Details
            </a>
        </p>

        <p style="font-size:12px; color:#6b7280; margin-top:20px;">
            Sent from Car Shop System
        </p>
    </div>

</body>
</html>
