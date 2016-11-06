@extends('layouts.app')

@section('content')
<div class="container">
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

            @foreach($attributes as $key => $value)
                <div class="form-group">
                    {{ Form::label($key, $key) }}
                    {{ Form::select($key, $value, null, ['class' => 'form-control']) }}
                </div>
            @endforeach

            <div class="form-group">
                {{ Form::label('Quantity', 'Quantity') }}
                {{ Form::selectRange('Quantity', 1, 5, null, ['class' => 'form-control']) }}
            </div>

            <p><button type="button" class="btn btn-primary">ADD TO CART</button></p>
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
