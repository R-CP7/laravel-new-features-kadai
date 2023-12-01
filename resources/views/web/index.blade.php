@extends('layouts.app')
 
 @section('content')
 <div class="row">
     <div class="col-2">
     @component('components.sidebar', ['categories' => $categories, 'major_categories' => $major_categories])
         @endcomponent
     </div>
     <div class="col-9">
         <h1>おすすめ商品</h1>
         <div class="row">
         @foreach ($recommend_products as $recommend_product)
             <div class="col-4">
                 <a href="{{ route('products.show', $recommend_product) }}">
                     @if ($recommend_product->image !== "")
                     <img src="{{ asset($recommend_product->image) }}" class="img-thumbnail">
                             <div class="star-rating" data-rate="{{ round($recommend_product->reviews->avg('score')) }}"></div>
                             <!-- <div class="star-rating" data-rate="4.5"></div> -->
                     @else
                     <img src="{{ asset('img/dummy.png')}}" class="img-thumbnail">
                     @endif
                 </a>
                 <div class="row">
                     <div class="col-12">
                         <p class="samuraimart-product-label mt-2">
                             {{ $recommend_product->name }}<br>
                            <span> {{ $recommend_product->average_rating }}</span>
                             @if($recommend_product->count)
                                 <h3 class="review-score-color" data-review-rate="hoshi">{{ str_repeat('★', $recommend_product->avg) }}</h3>
                             @endif
                             <span>￥{{ $recommend_product->price }}</span>
                         </p>
                     </div>
                 </div>
             </div>
             @endforeach
             </div>

         <h1>新着商品</h1>
         <div class="row">
         @foreach ($recently_products as $recently_product)
             <div class="col-3">
                 <a href="{{ route('products.show', $recently_product) }}">
                     @if ($recently_product->image !== "")
                     <img src="{{ asset($recently_product->image) }}" class="img-thumbnail">
                     @else
                     <img src="{{ asset('img/dummy.png')}}" class="img-thumbnail">
                     @endif
                 </a>
                 <div class="row">
                     <div class="col-12">
                         <p class="samuraimart-product-label mt-2">
                             {{ $recently_product->name }}<br>
                             <label>￥{{ $recently_product->price }}</label>
                         </p>
                     </div>
                 </div>
             </div>
         @endforeach  
         </div>
     </div>
 </div>
 @endsection