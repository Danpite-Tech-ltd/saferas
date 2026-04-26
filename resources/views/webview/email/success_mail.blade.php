<!DOCTYPE html>
<html>
<head>
    <title>Order Confirmation</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 8px;
        }
        .green-header {
            background-color: #330044;
            color: white;
            padding: 10px;
        }
    </style>
</head>
<body>
    
    
    <p><strong>Order #{{ $confirmMail['invoiceID'] }}</strong> ({{ \Carbon\Carbon::parse($confirmMail['orderDate'])->format('F d, Y') }})</p>

    <table>
        <thead>
            <tr>
                <th>Product</th>
                <th>Qty</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($confirmMail['products'] as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->qty }}</td>
                    <td>৳{{ number_format($product->price) }}</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="2">Subtotal:</td>
                <td>৳{{ number_format($confirmMail['subTotal']) }}</td>
            </tr>
            <tr>
                <td colspan="2">Shipping:</td>
                <td>৳{{ number_format($confirmMail['deliveryCharge']) }}</td>
            </tr>
            <tr>
                <td colspan="2">Total:</td>
                <td>৳{{ number_format($confirmMail['total']) }}</td>
            </tr>
        </tbody>
    </table>

    <h4>Customer Address</h4>
    <p>{{ $confirmMail['customerName'] }}<br>
       {{ $confirmMail['customerAddress'] }}<br>
       {{ $confirmMail['customerEmail'] }}</p>

    <p>Thanks for shopping with us.</p>
</body>
</html>
