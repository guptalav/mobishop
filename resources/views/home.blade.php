@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <ul class="products">
                @foreach ($products as $product)
                    <li>
                        <a href="#">
                            @if (!empty($product->images()->first()) && file_exists(public_path($product->images->first()->path)))
                                {{ Html::image($product->images->first()->path, $product->title, array('class' => 'img-responsive')) }}
                            @else
                                {{ Html::image('images/upload/p/default.png', $product->title, array('class' => 'img-responsive')) }}
                            @endif
                            <h4 class="text-center">{{$product->title}}</h4>
                            <p class="text-center">${{$product->price}}</p>
                        </a>
                        <p class="text-center"><button type="button" class="btn btn-primary">ADD TO CART</button></p>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
