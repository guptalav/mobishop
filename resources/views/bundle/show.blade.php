@extends('layouts.app')

@section('title')
{{ $bundle->title }}
@endsection

@section('content')
<div class="container">
    <p><a href="{{ url('products') }}">Home</a> / {{ $bundle->title }}</p>
    <div class="row">
        <div class="col-md-6">
            {{ Html::image($bundle->image_path, $bundle->title, ['class' => 'img-responsive']) }}
        </div>
        <div class="col-md-6 bundle">
            <h1 class="title">{{ $bundle->title }}</h1>
            <p class="price"><del>${{ BundleHelper::calculatePrice($bundle) }}</del></p>
            <h3 class="price">
                ${{ BundleHelper::calculateDiscountedPrice($bundle) }} ({{ $bundle->discount }}% OFF)
            </h3>
            {{ Form::open([ 'route' => 'carts.store', 'method' => 'post' ]) }}
                {{ Form::hidden('id', $bundle->id) }}
                {{ Form::hidden('title', $bundle->title) }}
                {{ Form::hidden('price', BundleHelper::calculateDiscountedPrice($bundle)) }}
                {{ Form::hidden('quantity', 1) }}
                {{ Form::hidden('attributes[type]', 'bundle') }}
                @foreach($bundle->products as $product)
                    <h4>{{ $product->title }}</h4>
                    @foreach(ProductHelper::getAttributes($product) as $key => $value)
                        <div class="form-group">
                            {{ Form::label(strtolower($key), $key) }}
                            {{ Form::select('attributes['. $product->id .'][' . $key . ']', $value, null, ['class' => 'form-control', 'id' => strtolower($key)]) }}
                        </div>
                    @endforeach
                @endforeach
                <p>{{ Form::submit('ADD TO CART', ['class' => 'btn btn-primary']) }}</p>
            {{ Form::close() }}
        </div>
    </div>  
    <div class="row">
        <div class="col-md-12">
            <h2>Description</h2>
            {!! $bundle->description !!}
        </div>
    </div> 
</div>
@endsection
