<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; line-height: 1.6; color: #333; background-color: #f4f4f4; margin: 0; padding: 0; }
        .container { max-width: 600px; margin: 20px auto; background: #fff; padding: 40px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); }
        .header { text-align: center; margin-bottom: 30px; border-bottom: 1px solid #eee; padding-bottom: 20px; }
        .logo { width: 150px; height: auto; }
        .content { font-size: 16px; color: #444; }
        .footer { margin-top: 40px; padding-top: 20px; border-top: 1px solid #eee; text-align: center; font-size: 12px; color: #888; }
        .unsubscribe { color: #888; text-decoration: underline; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="https://classicweld.com/logo.png" alt="ClassicWeld" class="logo">
        </div>
        
        <div class="content">
            {!! nl2br(e($contentBody)) !!}
        </div>
        
        <div class="footer">
            &copy; {{ date('Y') }} ClassicWeld. All rights reserved.<br>
            You are receiving this email because you subscribed to our newsletter.<br>
            <a href="{{ $unsubscribeUrl }}" class="unsubscribe">Unsubscribe from this list</a>
        </div>
    </div>
</body>
</html>
