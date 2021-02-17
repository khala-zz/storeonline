
@extends('frontend.layouts.master')
	@section('title')
		<title>{{ $detail_product -> name}}</title>
	@endsection
	@section('css')
		
		<link href="{{ asset('home/home.css') }}" rel="stylesheet">
		<link rel="stylesheet" href="{{asset('frontend/easyzoom/css/easyzoom.css')}}" />
	@endsection



	@section('content')
	<section>
		<div class="container">
			<div class="row">
				@include('frontend.components.sidebar')
				<div class="col-sm-9 padding-right">
					@if(session('message'))
                            <div class="alert alert-success">
                                <strong>{{ session('message') }}</strong>
                            </div>
                        @endif
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							
							<div class="easyzoom easyzoom--overlay easyzoom--with-thumbnails">

								<a href="{{$detail_product->feature_image_path}}">
									<img src="{{$detail_product->feature_image_path}}" alt="" id="dynamicImage" style="width: 300px;height: 300px;" />
								</a>
							</div>

							<ul class="thumbnails" style="margin-left: -10px;">
								<li>
									@foreach($imagesGalleries as $imagesGallery)
									<a href="{{url('product/large',$imagesGallery->name)}}" data-standard="{{url('product/small',$imagesGallery->name)}}">
										<img src="{{url('product/small',$imagesGallery->name)}}" alt="" width="75" style="padding: 8px;">
									</a>
									@endforeach
								</li>
							</ul>

						</div>
						<div class="col-sm-7">
							<form action="{{route('addToCart')}}" method="post" role="form">
								@csrf
								<input type="hidden" name="product_id" value="{{$detail_product->id}}">
								<input type="hidden" name="product_name" value="{{$detail_product->name}}">
								<input type="hidden" name="product_code" value="{{$detail_product->ma_sp}}">
								<input type="hidden" name="product_color" value="{{$detail_product->p_color}}">
								<input type="hidden" name="price" value="{{$detail_product->price}}" id="dynamicPriceInput">
								<div class="product-information"><!--/product-information-->
									<img src="images/product-details/new.jpg" class="newarrival" alt="" />
									<h2>{{$detail_product -> name}}</h2>
									<p>Mã sản phẩm: {{$detail_product -> ma_sp}}</p>
									@if($detail_product -> reviews() -> count())
									{{number_format($detail_product -> avg_rating,2)}}/5.00
									<br />
									{{$detail_product -> reviews_count}} vote
									@else
									<h2>chua co danh gia</h2>
									@endif
									<br />
									<span>
										<select name="size" id="idSize" class="form-control">
											<option value="">Select Size</option>
											@foreach($detail_product->attributes as $attrs)
											<option value="{{$detail_product->id}}-{{$attrs->size}}">{{$attrs->size}}</option>
											@endforeach
										</select>
									</span><br>

									<span>

										<span id="dynamic_price">US ${{$detail_product->price}}</span>
										<label>Quantity:</label>
										<input type="text" name="quantity" value="{{$totalStock}}" id="inputStock"/>
										@if($totalStock>0)
										<button type="submit" class="btn btn-fefault cart" id="buttonAddToCart">
											<i class="fa fa-shopping-cart"></i>
											Add to cart
										</button>
										@endif

									</span>
									<p><b>Availability:</b>
										@if($totalStock>0)
										<span id="availableStock">In Stock</span>
										@else
										<span id="availableStock">Out of Stock</span>
										@endif
									</p>
									<p><b>Condition:</b> New</p>
									<p><b>Brand:</b> {{$detail_product -> brand -> name}}</p>
									<a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
								</div><!--/product-information-->
							</form>
							</div>
						</div><!--/product-details-->

					
					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li><a href="#details" data-toggle="tab">Details</a></li>
								<li><a href="#companyprofile" data-toggle="tab">Company Profile</a></li>
								<li><a href="#tag" data-toggle="tab">Tag</a></li>
								<li class="active"><a href="#reviews" data-toggle="tab">Reviews (5)</a></li>
							</ul>
						</div>

						<div class="tab-content">
							<div class="tab-pane fade" id="details" >
								
								<div class="col-sm-12">
									{!! $detail_product -> content !!}
								</div>
								
							</div>
							
							<div class="tab-pane fade" id="companyprofile" >
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/gallery1.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/gallery3.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/gallery2.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/gallery4.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
							</div>
							
							<div class="tab-pane fade" id="tag" >
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/gallery1.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/gallery2.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/gallery3.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/gallery4.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
							</div>
							
							<div class="tab-pane fade active in" id="reviews" >
								<div class="col-sm-12">
									<ul>
										<li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
										<li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
										<li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
									</ul>
									<h3>Danh gia sang pham</h3>
									@if(Auth::check())
									<form action="{{route('reviews.store')}}" method="post" >
										@csrf
										<input type="hidden" name="product_id" value="{{ $detail_product -> id }}">
										Your rating:
										<br />
										<select name="rating">
											<option >1</option>
											<option >2</option>
											<option >3</option>
											<option selected >4</option>
											<option >5</option>
										</select>
										<br /><br />
										Comment
										<br />
										<textarea name="comment" ></textarea>
										<br /><br />
										<input type="submit" value="save rating">
									</form>
									@else
									<p>ban phai dang nhap moi duoc reviews</p>
									@endif
								</div>
							</div>
							
						</div>
					</div><!--/category-tab-->
					
					

					<!--recommended_items-->
					@include('frontend.home.components.recommend_product')
					<!--/recommended_items-->
					
				</div>



			</div>


		</div>
	</div>
</section>
	@endsection
	@section('js')
		<script src=" {{ asset('home/home.js') }} "></script>
		<script src="{{asset('frontend/js/product/attrs/attrs.js')}}"></script>
		<script src="{{asset('frontend/easyzoom/dist/easyzoom.js')}}"></script>
		<script>
    // Instantiate EasyZoom instances
    var $easyzoom = $('.easyzoom').easyZoom();

    // Setup thumbnails example
    var api1 = $easyzoom.filter('.easyzoom--with-thumbnails').data('easyZoom');

    $('.thumbnails').on('click', 'a', function(e) {
    	var $this = $(this);

    	e.preventDefault();

        // Use EasyZoom's `swap` method
        api1.swap($this.data('standard'), $this.attr('href'));
    });

    // Setup toggles example
    var api2 = $easyzoom.filter('.easyzoom--with-toggle').data('easyZoom');

    $('.toggle').on('click', function() {
    	var $this = $(this);

    	if ($this.data("active") === true) {
    		$this.text("Switch on").data("active", false);
    		api2.teardown();
    	} else {
    		$this.text("Switch off").data("active", true);
    		api2._init();
    	}
    });
</script>
	@endsection



	
	