@extends('shop.master')
@section('content')
<!-- Slider -->
<style>
	.item{
		background-size:cover;
	}
</style>
<div id="myCarousel" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">
		@foreach($sliders as $key => $slider)
			<li data-target="#myCarousel" data-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}"></li>
		@endforeach
		</ol>
		<div class="carousel-inner" role="listbox">
		@foreach($sliders as $key => $slider)
		@php
			$image = asset('slider_images/'.$slider->image)
		@endphp
			<div class="item {{ $key == 0 ? 'active' : '' }}" style="background-image: url({{$image}});background-size: 100% 100%;">
				<div class="container">
					<div class="carousel-caption">
						<h3>{{ $slider->text_one }}</h3>
						<p>{{ $slider->text_two }}</p>
						<a class="hvr-outline-out button2" href="{{ url('/products/'.$slider->category->id) }}">Shop Now </a>
					</div>
				</div>
			</div>
		@endforeach
		</div>
		<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div> 
	<!-- Slider End -->
<!-- Products --> 
	<div class="new_arrivals_agile_w3ls_info"> 
		<div class="container">
		    <h3 class="wthree_text_info">New <span>Arrivals</span></h3>		
				<div id="horizontalTab">
						<ul class="resp-tabs-list">
						@foreach($categories as $category)
							<li> {{ $category->name }} </li>
						@endforeach
						</ul>
					<div class="resp-tabs-container">

					@foreach($categories as $category)
						<div class="tab1">

							@foreach($category->product as $product)
							<div class="col-md-3 product-men">
								<div class="men-pro-item simpleCart_shelfItem">
									<div class="men-thumb-item">
										<img src="{{ asset('product_images/'.$product->productImages[0]->image) }}" alt="" class="pro-image-front">
										<img src="{{ asset('product_images/'.$product->productImages[0]->image) }}" alt="" class="pro-image-back">
										<div class="men-cart-pro">
											<div class="inner-men-cart-pro">
												<a href="{{ url('/product/'.$product->id) }}" class="link-product-add-cart">Quick View</a>
											</div>
										</div>
										<span class="product-new-top">New</span>
									</div>
									<div class="item-info-product ">
										<h4><a href="{{ url('/product/'.$product->id) }}">{{ $product->name }}</a></h4>
										<div class="info-product-price">
											<span class="item_price">{{ $product->present_price }} TK</span>
											<del>{{ $product->past_price }} TK</del>
										</div>
										<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
											<input type="submit" name="submit" value="Add to cart" class="button" />
										</div>
									</div>
								</div>
							</div>
							@endforeach

							<div class="clearfix"></div>
						</div>
					@endforeach

					</div>
				</div>	
			</div>
		</div>
	<!-- //Products --> 
    
@endsection