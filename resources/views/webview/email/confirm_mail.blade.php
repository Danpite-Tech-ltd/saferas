<!DOCTYPE html>
<html>
<head>
    <title>Order Confirmed</title>
</head>
<body>
    <h2>Hello {{ $confirmMail['name'] }},</h2>
    <p>Great news! Your order (Invoice ID: {{ $confirmMail['invoice_id'] }}) has been confirmed and is now being packaged.</p>
    <p>We'll notify you once it's shipped. Thank you for shopping with <strong>Greenieagro</strong>!</p>
</body>
</html>
