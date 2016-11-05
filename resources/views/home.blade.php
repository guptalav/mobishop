@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <ul class="products">
                @foreach ($products as $product)
                    <li>
                        <a href="#">
                            {{ Html::image($product->images->first()->path, $product->title, array('class' => 'img-responsive')) }}
                            <h4 class="text-center">{{$product->title}}</h4>
                            <p class="text-center">${{$product->price}}</p>
                        </a>
                        <p class="text-center"><button type="button" class="btn btn-primary">Add to cart</button></p>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
