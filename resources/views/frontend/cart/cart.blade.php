
@extends('frontend.layouts.master')
	@section('title')
		<title>Giỏ hàng</title>
	@endsection
	@section('css')
		
		<link href="{{ asset('home/home.css') }}" rel="stylesheet">
	@endsection

	@section('js')
		<script src=" {{ asset('home/home.js') }} "></script>
	@endsection

	@section('content')
	
	<section id="cart_items">
		<div class="container">
			@if(session('message'))
			<div class="alert alert-success">
				<strong>{{ session('message') }}</strong>
			</div>
			@endif
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
                    <thead>
                    <tr class="cart_menu">
                        <td class="image">Item</td>
                        <td class="description"></td>
                        <td class="price">Price</td>
                        <td class="quantity">Quantity</td>
                        <td class="total">Total</td>
                        <td></td>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($cart_datas as $cart_data)
                            <?php
                                $image_products=DB::table('products')->select('feature_image_path')->where('id',$cart_data->product_id)->get();
                            ?>
                            <tr>
                                <td class="cart_product">
                                    @foreach($image_products as $image_product)
                                        <a href=""><img src="{{url('product/small',$image_product->feature_image_path)}}" alt="" style="width: 100px;"></a>
                                    @endforeach
                                </td>
                                <td class="cart_description">
                                    <h4><a href="">{{$cart_data->product_name}}</a></h4>
                                    <p>{{$cart_data->product_code}} | {{$cart_data->size}}</p>
                                </td>
                                <td class="cart_price">
                                    <p>${{$cart_data->price}}</p>
                                </td>
                                <td class="cart_quantity">
                                    <div class="cart_quantity_button">
                                        <a class="cart_quantity_up" href="{{ route('cart.update',['id' => $cart_data -> id,'quantity' => 1]) }}"> + </a>
                                        <input class="cart_quantity_input" type="text" name="quantity" value="{{$cart_data->quantity}}" autocomplete="off" size="2">
                                        @if($cart_data->quantity>1)
                                            <a class="cart_quantity_down" href="{{ route('cart.update',['id' => $cart_data -> id,'quantity' => -1]) }}"> - </a>
                                        @endif
                                    </div>
                                </td>
                                <td class="cart_total">
                                    <p class="cart_total_price">$ {{$cart_data->price*$cart_data->quantity}}</p>
                                </td>
                                <td class="cart_delete">
                                    <a class="cart_quantity_delete" href="{{route('cart.delete',['id' => $cart_data -> id])}}"><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>What would you like to do next?</h3>
				<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
			</div>
			<div class="row">
				 <div class="col-sm-6">
                    @if(Session::has('message_coupon'))
                        <div class="alert alert-danger text-center" role="alert">
                            {{Session::get('message_coupon')}}
                        </div>
                    @endif
                    <div class="chose_area" style="padding: 20px;">
                        <form action="{{ route('apply.coupon') }}" method="post" role="form">
                            @csrf
                            <input type="hidden" name="Total_amountPrice" value="{{$total_price}}">
                            <div class="form-group">
                                <label for="coupon_code">Coupon Code</label>
                                <div class="controls {{$errors->has('coupon_code')?'has-error':''}}">
                                    <input type="text" class="form-control" name="coupon_code" id="coupon_code" placeholder="Promotion By Coupon">
                                    <span class="text-danger">{{$errors->first('coupon_code')}}</span>
                                </div>
                                <button type="submit" class="btn btn-primary">Apply</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-sm-6">
                    @if(Session::has('message_apply_sucess'))
                        <div class="alert alert-success text-center" role="alert">
                            {{Session::get('message_apply_sucess')}}
                        </div>
                    @endif
                    <div class="total_area">
                        <ul>
                            @if(Session::has('discount_amount_price'))
                                <li>Sub Total <span>$ {{$total_price}}</span></li>
                                <li>Coupon Discount (Code : {{Session::get('coupon_code')}}) <span>$ {{Session::get('discount_amount_price')}}</span></li>
                                <li>Total <span>$ {{$total_price-Session::get('discount_amount_price')}}</span></li>
                            @else
                                <li>Total <span>$ {{$total_price}}</span></li>
                            @endif
                        </ul>
                        <div style="margin-left: 20px;"><a class="btn btn-default check_out" href="{{route('checkout')}}">Check Out</a></div>
                    </div>
                </div>
			</div>
		</div>
	</section><!--/#do_action-->

	
	

	@endsection

	
	