<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #eee; }
        .header { background: #FF6B00; color: white; padding: 20px; text-align: center; border-radius: 8px 8px 0 0; }
        .content { padding: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 12px; border-bottom: 1px solid #eee; text-align: left; }
        th { background: #f9f9f9; font-weight: bold; }
        .footer { font-size: 12px; color: #777; margin-top: 30px; text-align: center; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>New Quote Request</h1>
        </div>
        <div class="content">
            <p>You have received a new product quote request from your website.</p>
            
            <h3>Customer Details</h3>
            <ul>
                <li><strong>Name:</strong> {{ $user ? $user->name : 'Guest' }}</li>
                <li><strong>Email:</strong> {{ $user ? $user->email : 'N/A' }}</li>
                <li><strong>Phone:</strong> {{ $user ? ($user->phone ?? 'N/A') : 'N/A' }}</li>
            </ul>

            <h3>Requested Products</h3>
            <table>
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($items as $item)
                    <tr>
                        <td>{{ $item['name'] }}</td>
                        <td>{{ $item['quantity'] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="footer">
            <p>This is an automated request from the ClassicWeld RFQ System.</p>
        </div>
    </div>
</body>
</html>
