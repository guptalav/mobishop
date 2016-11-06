@extends('layouts.app')

@section('title')
Products
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <ul class="products">
                @foreach ($products as $product)
                    <li>
                        <a href="{{ URL::route('products.show', ['slug' => $product->slug]) }}">
                            {{ Html::image(ProductHelper::getImagePath($product), $product->title, ['class' => 'img-responsive']) }}
                            <h4 class="text-center">{{ $product->title }}</h4>
                            <p class="text-center">${{ $product->price }}</p>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
