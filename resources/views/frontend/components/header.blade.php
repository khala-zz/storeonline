	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> {{getConfigValueFromSettingTable('Phone contact')}}</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> {{getConfigValueFromSettingTable('Email contact')}}</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="{{getConfigValueFromSettingTable('facebook_link')}}"><i class="fa fa-facebook"></i></a></li>
								<li><a href="{{getConfigValueFromSettingTable('google_link')}}"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-md-4 clearfix">
						<div class="logo pull-left">
							<a href="index.html"><img src="{{ asset('eshopper/images/home/logo.png') }} alt="logo" /></a>
						</div>
						
					</div>
					<div class="col-md-8 clearfix">
						<div class="shop-menu clearfix pull-right">
							<ul class="nav navbar-nav">
								
								<li><a href=""><i class="fa fa-star"></i> Wishlist</a></li>
								<li><a href="{{route('checkout')}}"><i class="fa fa-crosshairs"></i> Checkout</a></li>

								<li><a href="{{ route('cart.view')}}"><i class="fa fa-shopping-cart"></i> Cart<span class="badge badge-pill badge-danger">{{  session('count_item_cart') }}</a></li>
                            @if(Auth::check())
                                <li><a href="{{ route('user.account')}}"><i class="fa fa-user"></i> {{ Auth::user()->name }}</a></li>
                                <li><a href="{{ route('user.logout') }}"><i class="fa fa-lock"></i> Đăng xuất </a>
                                </li>
                            @else
                                <li><a href="{{ route('user.login') }}"><i class="fa fa-lock"></i> Đăng nhập</a></li>
                            @endif


								
								
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						@include('frontend.components.main_menu')
					</div>
					<div class="col-sm-3">
						<div class="search_box pull-right">
							<input type="text" placeholder="Search"/>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
