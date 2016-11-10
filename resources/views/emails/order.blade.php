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
                @if ($item->options->type != 'bundle')
                    @foreach ($item->options as $key => $value)
                        @if ($key != 'type')
                            (<strong>{{ $key }}:</strong> {{ $value }})
                        @endif
                    @endforeach
                @endif
            </li>
            <li>Qty: {{ $item->qty }}</li>
            <li>Total: {{ $item->subtotal }}</li>
        </ul>
    @endforeach
</body>
</html>
