<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; line-height: 1.6; color: #333; background-color: #f4f4f4; margin: 0; padding: 0; }
        .container { max-width: 600px; margin: 20px auto; background: #fff; padding: 40px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); }
        .header { text-align: center; margin-bottom: 30px; }
        .logo { width: 180px; height: auto; }
        h1 { color: #111; font-size: 24px; text-align: center; }
        p { margin-bottom: 20px; }
        .btn-container { text-align: center; margin-top: 35px; }
        .btn { background-color: #ff9d00; color: #000; padding: 15px 35px; text-decoration: none; border-radius: 8px; font-weight: bold; display: inline-block; transition: background 0.3s; }
        .footer { margin-top: 40px; padding-top: 20px; border-top: 1px solid #eee; text-align: center; font-size: 12px; color: #888; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="https://classicweld.com/logo.png" alt="ClassicWeld" class="logo">
        </div>
        <h1>Confirm Your Subscription</h1>
        <p>Hello,</p>
        <p>Thank you for your interest in the ClassicWeld newsletter! Please confirm your subscription by clicking the button below. This ensures we have the right email address and your explicit permission.</p>
        
        <div class="btn-container">
            <a href="{{ $verificationUrl }}" class="btn">Verify Email Address</a>
        </div>
        
        <p style="margin-top: 30px; font-size: 14px; color: #666;">This link will expire in 24 hours. If you did not request this subscription, you can safely ignore this email.</p>
        
        <div class="footer">
            &copy; {{ date('Y') }} ClassicWeld. All rights reserved.<br>
            Quality Welding Equipment & Accessories.
        </div>
    </div>
</body>
</html>
