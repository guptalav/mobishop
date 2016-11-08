@extends('layouts.app')

@section('title')
Products
@endsection

@section('content')
<div class="container">
    <div class="jumbotron text-center clearfix">
        <h2>Example Laravel Ecommerce Application</h2>
        <p>An example Laravel App to demo the basic functionality of an e-commerce website.</p>
    </div>
    @foreach ($products->chunk(4) as $items)
        <div class="row">
            @foreach ($items as $product)
                <div class="col-md-3">
                    <div class="thumbnail">
                        <div class="caption text-center">
                            <a class="no-underline" href="{{ URL::route('products.show', ['slug' => $product->slug]) }}">
                                {{ Html::image(ProductHelper::getImagePath($product), $product->title, ['class' => 'img-responsive']) }}
                                <h4 class="text-center">{{ $product->title }}</h4>
                                <p class="text-center">${{ $product->price }}</p>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach
</div>
@endsection
