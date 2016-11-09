@extends('layouts.app')

@section('title')
{{ $product->title }}
@endsection

@section('content')
<div class="container">
    <p><a href="{{ url('products') }}">Home</a> / {{ $product->title }}</p>
    <div class="row">
        <div class="col-md-6">
            {{ Html::image(ProductHelper::getImagePath($product), $product->title, ['class' => 'img-responsive']) }}
        </div>
        <div class="col-md-6 product">
            <h1 class="title">{{ $product->title }}</h1>
            <p>{!! $product->short_description !!}</p>
            <h3 class="price">${{ $product->price }}</h3>

            {{ Form::open([ 'route' => 'carts.store', 'method' => 'post' ]) }}
                @foreach(ProductHelper::getAttributes($product) as $key => $value)
                    <div class="form-group">
                        {{ Form::label(strtolower($key), $key) }}
                        {{ Form::select('attributes[' . $key . ']', $value, null, ['class' => 'form-control', 'id' => strtolower($key)]) }}
                    </div>
                @endforeach

                <div class="form-group">
                    {{ Form::label('quantity', 'Quantity') }}
                    {{ Form::selectRange('quantity', 1, 5, null, ['class' => 'form-control']) }}
                </div>

                {{ Form::hidden('id', $product->id) }}
                {{ Form::hidden('title', $product->title) }}
                {{ Form::hidden('price', $product->price) }}

                <p>{{ Form::submit('ADD TO CART', ['class' => 'btn btn-primary']) }}</p>
            {{ Form::close() }}
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h3>Product Description</h3>
            {!! $product->description !!}
        </div>
    </div>
</div>
@endsection
