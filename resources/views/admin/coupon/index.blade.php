@extends('admin.admin')
@section('title')
<title>Danh sách Coupon</title>
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
    @include('admin.content-header',['name' => 'Danh sách Coupon','key' => 'Danh sách','link' => 'coupon.add',
    'text_button' => 'Thêm'])
    <!-- End Bread crumb and right sidebar toggle -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Danh sách Coupon</h4>
                    <h6 class="card-subtitle"></h6>
                    <div class="table-responsive">
                        @if(session('success'))
                            <div class="alert alert-success">
                                <strong>{{ session('success') }}</strong>
                            </div>
                        @endif
                       
                        <table id="demo-foo-addrow" class="table m-t-30 table-hover contact-list"  >
                            <thead>
                                <tr>
                                    <th>Thứ tự</th>
                                    <th>Tên coupon</th>
                                    <th>% giảm</th>
                                    <th>Loại giảm</th>
                                    <th>Thời gian tạo</th>
                                    <th>Ngày hết hạn</th>
                                    <th>Trạng thái</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($coupons as $coupon)
                    
                                <tr>
                                    <td>
                                        {{ $coupon -> id}}
                                    </td>
                                     
                                    <td>
                                        {{ $coupon -> coupon_code}}
                                    </td>
                                    
                                    <td> 
                                        {{ $coupon -> amount}}
                                    </td>
    
                                    <td>
                                        {{ $coupon -> amount_type}}
                                    </td>

                                    <td>
                                        {{ $coupon -> created_at }}
                                    </td>

                                    <td>
                                        {{ $coupon -> expiry_date}}
                                    </td>

                                    <td>
                                        <span class="label {{ $coupon -> status ==1?'label-success':'label-inverse' }}">{{ $coupon -> status ==1?'Hiện':'Ẩn'}} </span> 
                                    </td>
                                    
                                    <td>
                                        <a href="{{ route('coupon.edit',['id' => $coupon -> id]) }}" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                                        <a href="" data-url="{{ route('coupon.delete',['id' => $coupon -> id]) }}" data-toggle="tooltip" data-original-title="Delete" class="sa-warning"> <i class="fa fa-close text-danger"></i> </a>
                                        
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="6" style="display: none;">
                                        {{ $coupons -> links() }} 
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
                       {{ $coupons -> links() }}
                   </div> 
                    <div class="col-lg-4 ">
                        <a href="{{ route('coupon.add') }}"  class="btn btn-info btn-rounded" >Thêm Coupon</a>
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