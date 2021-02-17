@extends('admin.admin')
@section('title')
<title>Orders</title>
@endsection
@section('css')
<link href="{{ asset('admins/css/footable.core.css') }}" rel="stylesheet">
<link href="{{ asset('admins/css/bootstrap-select.min.css') }}" rel="stylesheet">
<link href="{{asset('admins/css/pages/footable-page.css')}}" rel="stylesheet">
<link href="{{ asset('admins/css/sweetalert.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="container-fluid">

    <!-- Bread crumb and right sidebar toggle -->
    @include('admin.content-header',['name' => 'Orders','key' => 'Danh sách','link' => 'order.index',
    'text_button' => 'Thêm'])
    <!-- End Bread crumb and right sidebar toggle -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Orders</h4>
                    <h6 class="card-subtitle"></h6>
                    <div class="table-responsive">
                        @if(session('message'))
                            <div class="alert alert-success">
                                <strong>{{ session('message') }}</strong>
                            </div>
                        @endif
                       
                        <table id="demo-foo-addrow" class="table m-t-30 table-hover contact-list"  >
                            <thead>
                                <tr>
                                    <th>Thứ tự</th>
                                    <th>Khách hàng</th>
                                    <th>Mã đơn hàng</th>
                                    <th>Tổng tiền</th>
                                    <th>Thanh toán</th>
                                    <th>Trạng thái</th>
                                    <th>Thời gian tạo</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                
                                <tr>
                                    <td>{{ $order -> id}}</td>
                                    <td>
                                        {{ $order -> name}}
                                    </td>
                                    <td> 
                                        {{$order -> ma_order}}   
                                    </td>
                                     <td> 
                                        {{$order -> grand_total}}   
                                    </td>
                                    
                                    <td>
                                        <span class="label {{ $order -> payment_status =='pending'?'label-inverse':'label-success' }}">{{ $order -> payment_status }} </span> 
                                    </td>
                                    
                                   
                                    
                                    <td>
                                        <span class="label {{ $order -> order_status =='pending'?'label-inverse':'label-success' }}">{{ $order -> order_status }} </span> 
                                    </td>
                                    
                                    
                                    
                                       
                                    <td>
                                        {{ $order -> created_at}}
                                    </td>
                                    <td>   
                                        <a href="{{ route('order.edit',['id' => $order -> id]) }}" data-toggle="tooltip" data-original-title="Xem"> <i class="fa fa-pencil text-inverse m-r-10"></i> Xem</a>
                                        
                                        
                                        <a href="" data-url="{{ route('order.delete',['id' => $order -> id]) }}" data-toggle="tooltip" data-original-title="Delete" class="sa-warning"> <i class="fa fa-close text-danger"></i> </a>
                                        
                                        
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="6" style="display: none;">
                                        {{ $orders -> links() }} 
                                    </td>
                                  
                                   
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                       
                    </div>
                    <div class="col-lg-4 ">
                       {{ $orders -> links() }}
                   </div> 
                    
                   
                   
               </div>
            </div>

        </div>
    </div>
    
</div>
                                   

@endsection

@section('js')

<script src="{{asset('admins/js/footable.all.min.js')}}"></script>
<script src="{{asset('admins/js/pages/footable-init.js')}}"></script>
<!-- Sweet-Alert  -->
<script src="{{asset('admins/js/sweetalert.min.js')}}"></script>
<script src="{{asset('admins/js/jquery.sweet-alert.custom.js')}}"></script>
    
@endsection