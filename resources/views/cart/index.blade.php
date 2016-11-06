@extends('layouts.app')

@section('title')
Cart
@endsection

@section('content')

    <div class="container cart">
        <p><a href="{{ url('products') }}">Home</a> / Cart</p>
        <h1>Your Cart</h1>

        <hr>

        @if (session()->has('success_message'))
            <div class="alert alert-success">
                {{ session()->get('success_message') }}
            </div>
        @endif

        @if (session()->has('error_message'))
            <div class="alert alert-danger">
                {{ session()->get('error_message') }}
            </div>
        @endif

        @if (sizeof(Cart::content()) > 0)

            <table class="table">
                <thead>
                    <tr>
                        <th class="table-image"></th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th class="column-spacer"></th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach (Cart::content() as $item)
                    <tr>
                        <td class="table-image">
                            <a href="{{ url('products', [$item->model->slug]) }}">
                                @if (!empty($item->model->images()->first()) && file_exists(public_path($item->model->images->first()->path)))
                                    {{ Html::image($item->model->images->first()->path, $item->model->title, ['class' => 'img-responsive']) }}
                                @else
                                    {{ Html::image('images/upload/p/default.png', $item->model->title, ['class' => 'img-responsive']) }}
                                @endif
                            </a>
                        </td>
                        <td>
                            <a class="prod-title" href="{{ url('products', [$item->model->slug]) }}">
                                {{ $item->name }}
                            </a>
                            @foreach ($item->options as $key => $value)
                                <p><strong>{{ $key }}:</strong> {{ $value }}</p>
                            @endforeach
                        </td>
                        <td>
                            {{ Form::selectRange('quantity', 1, 5, $item->qty, ['class' => 'form-control quantity', 'data-id' => $item->rowId]) }}
                        </td>
                        <td>${{ $item->subtotal }}</td>
                        <td class=""></td>
                        <td>
                            {{ Form::open([ 'url' => 'carts/'.$item->rowId, 'method' => 'delete' ]) }}
                                {{ Form::submit('Remove', ['class' => 'btn btn-danger btn-sm']) }}
                            {{ Form::close() }}
                        </td>
                    </tr>
                    @endforeach

                    <tr class="border-bottom">
                        <td class="table-image"></td>
                        <td style="padding: 40px;"></td>
                        <td class="small-caps table-bg" style="text-align: right">Your Total</td>
                        <td class="table-bg">${{ Cart::subtotal() }}</td>
                        <td class="column-spacer"></td>
                        <td></td>
                    </tr>

                </tbody>
            </table>

            <a href="/products" class="btn btn-primary btn-lg">Continue Shopping</a> &nbsp;
            <a href="#" class="btn btn-success btn-lg">Proceed to Checkout</a>

            <div style="float:right">
                {{ Form::open([ 'url' => 'emptyCart', 'method' => 'delete' ]) }}
                    {{ Form::submit('Empty Cart', ['class' => 'btn btn-danger btn-lg']) }}
                {{ Form::close() }}
            </div>

        @else
            <h3>You have no items in your shopping cart</h3>
            <a href="/products" class="btn btn-primary btn-lg">Continue Shopping</a>
        @endif

        <div class="spacer"></div>

    </div>

@endsection

@section('extra-js')
    <script>
        (function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('.quantity').on('change', function() {
                var id = $(this).attr('data-id')
                $.ajax({
                  type: "PATCH",
                  url: '/carts/' + id,
                  data: {
                    'quantity': this.value,
                  },
                  success: function(data) {
                    window.location.href = '/carts';
                  }
                });
            });
        })();
    </script>
@endsection
