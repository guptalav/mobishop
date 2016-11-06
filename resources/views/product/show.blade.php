@extends('layouts.app')

@section('content')
<div class="container">
    <p><a href="{{ url('products') }}">Home</a> / {{ $product->title }}</p>
    <div class="row">
        <div class="col-md-6">
            @if (!empty($product->images()->first()) && file_exists(public_path($product->images->first()->path)))
                {{ Html::image($product->images->first()->path, $product->title, ['class' => 'img-responsive']) }}
            @else
                {{ Html::image('images/upload/p/default.png', $product->title, ['class' => 'img-responsive']) }}
            @endif
        </div>
        <div class="col-md-6 product">
            <h1 class="title">{{ $product->title }}</h1>
            <p>{!! $product->short_description !!}</p>
            <h3 class="price">${{ $product->price }}</h3>

            {{ Form::open([ 'route' => 'carts.store', 'method' => 'post' ]) }}
                @foreach($attributes as $key => $value)
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
                {{ Form::hidden('image_path', $product->images->first()->path) }}

                <p>{{ Form::submit('ADD TO CART', ['class' => 'btn btn-primary']) }}</p>
            {{ Form::close() }}
        </div>
        <div class="row">
            <div class="col-md-12">
                <h3>Product Description</h3>
                {!! $product->description !!}
            </div>
        </div>
    </div>
</div>
@endsection
