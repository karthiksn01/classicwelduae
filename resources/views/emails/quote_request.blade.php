<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; line-height: 1.6; color: #1a1a1a; margin: 0; padding: 0; background-color: #f4f4f4; }
        .container { max-width: 650px; margin: 20px auto; background: #ffffff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.1); }
        .header { background: #000000; color: #FF6B00; padding: 30px; text-align: center; border-bottom: 4px solid #FF6B00; }
        .header h1 { margin: 0; font-size: 24px; text-transform: uppercase; letter-spacing: 2px; }
        .content { padding: 40px; }
        .intro { font-size: 16px; color: #444; margin-bottom: 30px; }
        .section-title { font-size: 14px; font-weight: bold; color: #FF6B00; text-transform: uppercase; border-bottom: 1px solid #eee; padding-bottom: 8px; margin-top: 30px; margin-bottom: 15px; }
        .details-list { list-style: none; padding: 0; margin: 0; }
        .details-list li { margin-bottom: 10px; font-size: 15px; }
        .details-list strong { color: #555; width: 100px; display: inline-block; }
        
        table { width: 100%; border-collapse: collapse; margin-top: 10px; border: 1px solid #eee; }
        th { background: #f8f8f8; color: #333; font-weight: bold; padding: 15px; text-align: left; font-size: 13px; text-transform: uppercase; }
        td { padding: 15px; border-bottom: 1px solid #eee; font-size: 15px; }
        .qty-badge { background: #FF6B00; color: white; padding: 2px 10px; rounded: 4px; font-weight: bold; font-size: 13px; }
        
        .footer { background: #f9f9f9; padding: 20px; text-align: center; font-size: 12px; color: #888; border-top: 1px solid #eee; }
        .highlight { color: #FF6B00; font-weight: bold; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Product Quote Request</h1>
            <p style="color: rgba(255,255,255,0.7); margin-top: 5px; font-size: 12px; letter-spacing: 1px;">AUTOMATED PRIORITY NOTIFICATION</p>
        </div>
        <div class="content">
            <p class="intro">Hello Team, <br>A new Request for Quotation (RFQ) has been submitted via the <strong>ClassicWeld</strong> portal.</p>
            
            <div class="section-title">Customer Details</div>
            <ul class="details-list">
                <li><strong>Full Name:</strong> {{ $customerInfo['name'] }}</li>
                <li><strong>Email:</strong> {{ $customerInfo['email'] }}</li>
                <li><strong>Phone:</strong> {{ $customerInfo['phone'] }}</li>
                <li><strong>Date:</strong> {{ date('F j, Y, g:i a') }}</li>
            </ul>

            <div class="section-title">Order Specifications</div>
            <table>
                <thead>
                    <tr>
                        <th style="width: 40px;">#</th>
                        <th>Product Description</th>
                        <th style="text-align: center; width: 100px;">Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($items as $index => $item)
                    <tr>
                        <td style="color: #999; font-size: 12px; border-right: 1px solid #f0f0f0;">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</td>
                        <td>
                            <div style="font-weight: 600; color: #000;">{{ $item['name'] }}</div>
                            <div style="font-size: 11px; color: #999; text-transform: uppercase; margin-top: 2px;">Industrial Grade Product</div>
                        </td>
                        <td style="text-align: center;">
                            <span style="display: inline-block; background: #000; color: #FF6B00; padding: 4px 12px; border-radius: 4px; font-weight: bold; font-size: 14px;">
                                {{ $item['quantity'] }}
                            </span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div style="margin-top: 40px; padding: 20px; background: #FFF8F0; border-left: 4px solid #FF6B00; border-radius: 4px;">
                <p style="margin: 0; font-size: 14px; color: #664d03; font-weight: 500;">
                    <strong>Next Step:</strong> Please review the availability and prepare a formal quotation for the customer above. Response within 24 hours is recommended.
                </p>
            </div>
        </div>
        <div class="footer">
            <p>&copy; {{ date('Y') }} <strong>ClassicWeld Industries</strong>. All rights reserved.</p>
            <p>Confidential Communication | ClassicWeld Dubai, UAE</p>
        </div>
    </div>
</body>
</html>
