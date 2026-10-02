<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>New Booking Notification</title>
</head>
<body style="font-family: Arial, sans-serif; background: #f8f9fa; color: #212529; margin: 0; padding: 24px;">
    <div style="max-width: 600px; margin: 0 auto; background: #ffffff; border-radius: 12px; overflow: hidden; box-shadow: 0 8px 30px rgba(0,0,0,0.07);">
        <div style="background: #111111; color: #f8f9fa; padding: 24px; text-align: center;">
            <h1 style="margin: 0; font-size: 24px; letter-spacing: 1px;">New Salon Booking</h1>
        </div>
        <div style="padding: 24px;">
            <p style="font-size: 16px;">Hello Admin,</p>
            <p style="font-size: 16px; line-height: 1.6;">A new appointment has been booked through the website. Review the details below and confirm the session in the admin dashboard.</p>
            <h3 style="margin-top: 24px; color: #b89047;">Booking Details</h3>
            <p style="margin: 0.5rem 0;"><strong>Customer:</strong> {{ $appointment->customer_name }}</p>
            <p style="margin: 0.5rem 0;"><strong>Email:</strong> {{ $appointment->email }}</p>
            <p style="margin: 0.5rem 0;"><strong>Phone:</strong> {{ $appointment->phone }}</p>
            <p style="margin: 0.5rem 0;"><strong>Date:</strong> {{ $appointment->booking_date }}</p>
            <p style="margin: 0.5rem 0;"><strong>Time:</strong> {{ $appointment->booking_time }}</p>
            <p style="margin: 0.5rem 0;"><strong>Service:</strong> {{ $appointment->service }}</p>
            @if($appointment->message)
                <p style="margin: 0.5rem 0;"><strong>Notes:</strong> {{ $appointment->message }}</p>
            @endif
            <p style="font-size: 16px; line-height: 1.6;">Open the admin dashboard to confirm or update this booking.</p>
            <p style="text-align: center; margin: 24px 0;"><a href="{{ url('/admin/dashboard') }}" style="background: #b89047; color: #000; text-decoration: none; padding: 12px 20px; border-radius: 8px; display: inline-block;">Go to Admin Dashboard</a></p>
        </div>
    </div>
</body>
</html>
