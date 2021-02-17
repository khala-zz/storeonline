
@extends('frontend.layouts.master')
	@section('title')
		<title>Login - Register</title>
	@endsection
	@section('css')
		
		<link href="{{ asset('home/home.css') }}" rel="stylesheet">
	@endsection

	@section('js')
		<script src=" {{ asset('home/home.js') }} "></script>
	@endsection

	@section('content')
	
	<section id="form"><!--form-->
		<div class="container">
			@if(session('message'))
			<div class="alert alert-success">
				<strong>{{ session('message') }}</strong>
			</div>
			@endif
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Đăng nhập</h2>
						<form action="{{ route('user.login.post')}}" method="post">
							@csrf
							<input type="email" placeholder="Email" name="email" />
							<input type="password" placeholder="Mật khẩu" name="password" />
							<span>
								<input type="checkbox" class="checkbox"> 
								lưu đăng nhập
							</span>
							<button type="submit" class="btn btn-default">Đăng nhập</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>Đăng kí</h2>
						<form action="{{ route('user.register')}}" method="post">
							@csrf
							<input type="text" placeholder="Tên" name="name" value="{{old('name')}}"/>
							<span class="text-danger">{{$errors->first('name')}}</span>

							<input type="email" placeholder="Email" name="email" value="{{old('email')}}"/>
							<span class="text-danger">{{$errors->first('email')}}</span>

							<input type="password" placeholder="Mật khẩu" name="password" value="{{old('password')}}"/>
							<span class="text-danger">{{$errors->first('password')}}</span>

							<input type="password" placeholder="Nhập lại mật khẩu" name="password_confirmation" value="{{old('password_confirmation')}}"/>
							<span class="text-danger">{{$errors->first('password_confirmation')}}</span>
							
							<button type="submit" class="btn btn-default">Đăng kí</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->

	
	

	@endsection

	
	