@extends('layouts.app')

@section('title')
Bundles
@endsection

@section('content')
<div class="container">
    <div class="jumbotron text-center clearfix">
        <h2>Buy bundles at discounted price</h2>
        <p>An example Laravel App to demo the basic functionality of an e-commerce website.</p>
    </div>
    @foreach ($bundles->chunk(4) as $items)
        <div class="row">
            @foreach ($items as $bundle)
                <div class="col-md-3">
                    <div class="thumbnail">
                        <div class="caption text-center">
                            <a class="no-underline" href="{{ URL::route('bundles.show', ['slug' => $bundle->slug]) }}">
                                {{ Html::image($bundle->image_path, $bundle->title, ['class' => 'img-responsive']) }}
                                <h4 class="text-center">{{ $bundle->title }}</h4>
                                <p class="text-center"><del>${{ BundleHelper::calculatePrice($bundle) }}</del></p>
                                <p class="text-center discounted-price">
                                    ${{ BundleHelper::calculateDiscountedPrice($bundle) }} ({{ $bundle->discount }}% OFF)
                                </p>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach
</div>
@endsection
