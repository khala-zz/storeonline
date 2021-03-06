
@extends('frontend.layouts.master')
	@section('title')
		<title>Home Page</title>
	@endsection
	@section('css')
		
		<link href="{{ asset('home/home.css') }}" rel="stylesheet">
	@endsection

	@section('js')
		<script src=" {{ asset('home/home.js') }} "></script>
	@endsection

	@section('content')
	<section>
		<div class="container">
			<div class="row">
				@include('frontend.components.sidebar')
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Features Items</h2>
						@foreach($products as $product)
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<a href="{{ route('product.detail',['slug' => $product -> slug,'id' => $product -> id])}}"><img src="data:image/png;base64,{{$product -> baseimage}}" alt="" />
											</a>
										<h2>{{number_format($product -> price)}} VND</h2>
										<p><a href="{{ route('product.detail',['slug' => $product -> slug,'id' => $product -> id])}}">{{ $product -> name }}</a></p>
										<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
									</div>
									<div class="product-overlay">
										<div class="overlay-content">
											<h2>{{number_format($product -> price)}} VND</h2>
											<p><a href="{{ route('product.detail',['slug' => $product -> slug,'id' => $product -> id])}}">{{ $product -> name }}</a></p>
											<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
									</div>
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
										<li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
									</ul>
								</div>
							</div>
						</div>

						@endforeach
						
						
						{{$products -> links()}}
					</div><!--features_items-->
				</div>



			</div>


		</div>
	</div>
</section>
	
	

	@endsection

	
	
