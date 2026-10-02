<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome to Higher Rapik Salon</title>
</head>
<body style="font-family: Arial, sans-serif; background: #f8f9fa; color: #212529; margin: 0; padding: 24px;">
    <div style="max-width: 600px; margin: 0 auto; background: #ffffff; border-radius: 12px; overflow: hidden; box-shadow: 0 8px 30px rgba(0,0,0,0.07);">
        <div style="background: #111111; color: #f8f9fa; padding: 24px; text-align: center;">
            <h1 style="margin: 0; font-size: 24px; letter-spacing: 1px;">Welcome to Higher Rapik Salon</h1>
        </div>
        <div style="padding: 24px;">
            <p style="font-size: 16px;">Hi {{ $name }},</p>
            <p style="font-size: 16px; line-height: 1.6;">Thank you for registering at Higher Rapik Salon. Your account is ready and you can now book premium salon services with ease.</p>
            <h3 style="margin-top: 24px; color: #b89047;">Your login details</h3>
            <p style="font-size: 16px; margin: 0.5rem 0;"><strong>Email:</strong> {{ $email }}</p>
            <p style="font-size: 16px; margin: 0.5rem 0;"><strong>Password:</strong> {{ $password }}</p>
            <p style="font-size: 16px; line-height: 1.6;">Visit the booking page to reserve your next luxury appointment:</p>
            <p style="text-align: center; margin: 24px 0;"><a href="{{ url('/booking') }}" style="background: #b89047; color: #000; text-decoration: none; padding: 12px 20px; border-radius: 8px; display: inline-block;">Go to Booking Page</a></p>
            <p style="font-size: 14px; color: #6c757d;">If you did not create this account, please contact our support team.</p>
        </div>
    </div>
</body>
</html>
