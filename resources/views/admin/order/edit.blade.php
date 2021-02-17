@extends('admin.admin')
@section('head')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection
@section('title')
    <title>Chi tiết đơn đặt hàng</title>
@endsection


@section('content')
    <div class="container-fluid">
        @include('admin.content-header',['name' => 'Các đơn hàng','key' => 'Đơn hàng','link' => 'order.index',
        'text_button' => 'Danh sách'])
        <div class="row">

            <div class="col-md-12">
                <div class="card card-body">
                    <h3 class="box-title m-b-0">Khách hàng {{ $order -> name}}</h3>
                    <p class="text-muted m-b-30 font-13"> Đơn hàng {{ $order -> ma_order}} </p>
                    <div class="row">
                        <div class="col-sm-12 col-xs-12">
                            <div class="table-responsive">
                                    <table id="demo-foo-addrow" class="table m-t-30 table-hover contact-list" data-page-size="10">
                                       
                                        <tbody>
                                            @foreach($products as $product)
                                            <tr>
                                                <td  width="60%">
                                                    <a href="javascript:void(0)">
                                                    <?php
                                                     $product_name = $product_model -> where('id',$product -> products_id) -> first();
                                                    ?>
                                                    {!!
                                                        $product_name -> name .'(Ma san pham: <strong>'.$product_name -> ma_sp.'</strong>)<p><small>Size: '.$product -> size.'</small></p>'
                                                    !!}    
                                                    </a>
                                                </td>
                                                <td width="15%">
                                                    {{ $product  -> price }} VND
                                                </td>
                                                <td width="5%">
                                                x
                                                </td>
                                                <td width="15%">
                                                     {{$product -> qty}} cai
                                                 </td>
                                                <td width="5%">{{ $product -> total}}</td>
                                                
                                                
                                            </tr>

                                            @endforeach
                                            
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="3">
                                                    
                                                </td>
                                              <td><p>Tổng tiền</td>
                                                <td >
                                                    {{$order -> total_price}}
                                                    <div class="text-right">
                                                        
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="3">
                                                   
                                                </td>
                                              <td><p>Giảm giá</td>
                                                <td >
                                                    @if($order -> coupon_amount !='')
                                                    {{$order -> coupon_amount}}
                                                    @else
                                                    <span>0</span>
                                                    @endif
                                                 
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="3">
                                                   
                                                </td>
                                              <td><p>Thanh toán</td>
                                                <td >
                                                    {{$order -> grand_total}}
                                                    <div class="text-right">
                                                        
                                                    </div>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            
                                <div class="form-group">
                                    <label>Chú thích</label>
                                    
                                    <textarea 
                                    class="form-control @error('note') is-invalid @enderror"
                                    rows="5"
                                    name="note"
                                    id="order_note">
                                    {{ $order -> note }}
                                </textarea>
                                @error('note')
                                <div class="alert alert-danger khala-alert">
                                    {{ $message }}
                                </div>
                                @enderror
                                <br />
                                 <br />
                                <button data-id= "{{$order -> id}}" id="order_note_submit" class="btn btn-info waves-effect waves-light m-r-10">Save</button>
                                <div class="form-group">
                                  <h4>Xác nhận đơn hàng</h4>
                                  @if($order -> order_status == 'pending')
                                  <button data-id= "{{$order -> id}}" id ="order_confirm" type="button" class="btn btn-success" data-toggle="button" aria-pressed="false">

                                    <i class="ti-settings text" aria-hidden="true"></i>
                                    <input type="hidden" name="order_status" id="order_status" value="done">
                                    <span class="text" id="order_confirm_value" >Đang chờ duyệt</span>
                                    <i class="ti-settings text-active" aria-hidden="true"></i>
                                    <span class="text-active">Đang chờ duyệt</span>


                                </button>
                                @else   
                                <button data-id= "{{$order -> id}}" id ="order_confirm" type="button" class="btn btn-success" data-toggle="button" aria-pressed="false">

                                    <i class="ti-check text" aria-hidden="true"></i>
                                    <input type="hidden" name="order_status" id="order_status" value="pending">
                                    <span class="text" id="order_confirm_value">Đã duyệt</span>

                                    <i class="ti-check text-active" aria-hidden="true"></i>
                                    <span class="text-active">Đã duyệt</span>

                                </button>
                                @endif     

                                <br />
                                 <br />
                               
                                <div class="form-group">
                                  <h4>Xác nhận thanh toán</h4>
                                  @if($order -> payment_status == 'pending')
                                  <button data-id= "{{$order -> id}}" id ="order_payment" type="button" class="btn btn-success" data-toggle="button" aria-pressed="false">
                                    
                                    <i class="ti-settings text" aria-hidden="true"></i>
                                    <input type="hidden" name="order_payment_status" id="order_payment_status" value="done">
                                    <span class="text" id="order_payment_value" >Đang chờ duyệt</span>
                                    <i class="ti-settings text-active" aria-hidden="true"></i>
                                    <span class="text-active">Đang chờ duyệt</span>
                                    
                                    
                                </button>
                                @else   
                                <button data-id= "{{$order -> id}}" id ="order_payment" type="button" class="btn btn-success" data-toggle="button" aria-pressed="false">
                                    
                                    <i class="ti-check text" aria-hidden="true"></i>
                                    <input type="hidden" name="order_payment_status" id="order_payment_status" value="pending">
                                    <span class="text" id="order_payment_value">Đã duyệt</span>

                                    <i class="ti-check text-active" aria-hidden="true"></i>
                                    <span class="text-active">Đã duyệt</span>
                                    
                                </button>
                                @endif     
                                    
                                </div>        
                            </div>

                        
                       


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('js')
    <script src="{{asset('admins/order/main.js')}}"></script>
    
@endsection