<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
    <title>Order Confirmed</title>
</head>
<body>
    <h3>Thank you for your order!</h3>
    @foreach ($cart as $item)
        <ul>
            <li>
                Product: {{ $item->name }} &nbsp
                @foreach ($item->options as $key => $value)
                    ({{ $key }}: {{ $value }}) &nbsp
                @endforeach
            </li>
            <li>Qty: {{ $item->qty }}</li>
            <li>Total: {{ $item->subtotal }}</li>
        </ul>
    @endforeach
</body>
</html>
