@extends('layouts.app')

@section('title')
Checkout
@endsection

@section('content')
<div class="container checkout">
    <div class="row">
        <div class="col-md-6 shipping">
            <h3>Shipping/Payment</h3>
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            {{ Form::open([ 'route' => 'checkout.index', 'method' => 'post' ]) }}
                <div class="form-group">
                    {{ Form::label('name', 'Name') }}
                    {{ Form::input('text', 'name', null, ['class' => 'form-control']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('email', 'Email') }}
                    {{ Form::input('email', 'email', null, ['class' => 'form-control']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('address', 'Address') }}
                    {{ Form::input('text', 'address', null, ['class' => 'form-control']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('city', 'City') }}
                    {{ Form::input('text', 'city', null, ['class' => 'form-control']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('country', 'Country') }}
                    {{ Form::input('text', 'country', null, ['class' => 'form-control']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('postal', 'Postal Code') }}
                    {{ Form::input('text', 'postal', null, ['class' => 'form-control']) }}
                </div>
                {{ Form::submit('BUY', ['class' => 'btn btn-primary']) }}
            {{ Form::close() }}
        </div>
        <div class="col-md-5 col-md-offset-1 cart hidden-sm hidden-xs">
            <h3 class="cart-heading">Your Cart</h3>
            <a class="btn btn-sm btn-primary pull-right edit-cart" href="/carts">EDIT CART</a>
            @foreach (Cart::content() as $item)
                <div class="list-group">
                  <a href="{{ url('products', [$item->model->slug]) }}" class="list-group-item">
                    <div class="col-sm-4">
                        {{ Html::image(ProductHelper::getImagePath($item->model), $item->model->title, ['class' => 'img-responsive']) }}
                    </div>
                    <div class="col-sm-6">
                        <h4 class="list-group-item-heading">{{ $item->name }}</h4>
                        <p>{!! $item->model->short_description !!}</p>
                        @foreach ($item->options as $key => $value)
                            <p><strong>{{ $key }}:</strong> {{ $value }}</p>
                        @endforeach
                    </div>
                    <div class="col-sm-2">
                        <div><strong>${{ $item->subtotal }}</strong></div>
                        <div>Qty: {{ $item->qty }}</div>
                    </div>
                  </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
