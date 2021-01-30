@extends('shop.master')
@section('content')

		<div class="single-pro">

			@foreach($products as $product)

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
	</div>
</div>	<br>
<!-- //mens -->

@endsection