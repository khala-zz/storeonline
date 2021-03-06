<div class="features_items">
	<h2 class="title text-center">Features Items</h2>
	@foreach($products as $product)
	<div class="col-sm-4">
		<div class="product-image-wrapper">
			<div class="single-products">
				<div class="productinfo text-center">
					<img src="data:image/png;base64,{{$product -> baseimage}}" alt="" />
					{{--
					<h2>{{ number_format($product -> price) }} VND</h2>
					--}}
					<h2>{{ $product -> price }} VND</h2>
					<p><a href="{{ route('product.detail',['slug' => $product -> slug,'id' => $product -> id])}}">{{ $product -> name }}</a></p>
					<a href="#" class="btn btn-default add-to-cart add-to-cart-ajax"><i class="fa fa-shopping-cart"></i>Add to cart</a>
				</div>
				<div class="product-overlay">
					<div class="overlay-content">
						
						<h2>{{ $product -> price }} VND</h2>
						<p><a href="{{ route('product.detail',['slug' => $product -> slug,'id' => $product -> id])}}">{{ $product -> name }}</a></p>
						<!-- form xu ly add to cart --->
						<form action="{{route('addToCartAjax')}}" method="post" role="form">
								
								<input type="hidden" name="product_id" value="{{$product->id}}" id="product_id_{{ $product->id }}">
								<input type="hidden" name="product_name" value="{{$product->name}}" id="product_name_{{ $product->id }}">
								<input type="hidden" name="product_code" value="{{$product->ma_sp}}" id="product_masp_{{ $product->id }}">
								<input type="hidden" name="product_color" value="{{$product->p_color}}" id="product_color_{{ $product->id }}">
								<input type="hidden" name="price" value="{{$product->price}}" id="product_price_{{ $product->id }}">
						<a href="#" class="btn btn-default add-to-cart add-to-cart-ajax" data-id = "{{ $product->id }}"><i class="fa fa-shopping-cart "></i>Add to cart</a>
						</form>
					</div>
				</div>
			</div>
			<div class="choose">
				<ul class="nav nav-pills nav-justified">
					<li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
					<li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
				</ul>
			</div>
		</div>
	</div>
	@endforeach()

</div>

</div>

