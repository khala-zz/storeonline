@extends('admin.admin')

@section('title')
    <title>Sửa Coupon</title>
@endsection

@section('css')
 <!-- dung select 2 -->
 
 <link href=" {{ asset('admins/select2/dist/css/select2.min.css') }}" rel="stylesheet" />
 <!-- dung tagsinput -->

 
 @endsection
@section('content')
    <div class="container-fluid">
        @include('admin.content-header',['name' => 'Coupon','key' => 'Sửa','link' => 'product.index',
        'text_button' => 'Danh sách'])
        <div class="row">

            <div class="col-md-12">
                <div class="card card-body">
                    <h3 class="box-title m-b-0">Sửa Coupon</h3>
                    <p class="text-muted m-b-30 font-13"> Điền đầy đủ thông tin bên dưới </p>
                    <div class="row">
                        <div class="col-sm-6 col-xs-6">
                            <form action="{{ route('coupon.update',['id' => $coupon -> id])}}" method="post"  >
                                @csrf
                                <div class="form-group">
                                    <label> Tên Coupon</label>
                                    <input type="text" class="form-control @error('coupon_code') is-invalid @enderror" name="coupon_code" placeholder="Nhập tên Coupon" value="{{ $coupon -> coupon_code }}">
                                    @error('coupon_code')
                                        <div class="alert alert-danger khala-alert">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label> Giảm %</label>
                                    <input type="number" class="form-control @error('amount') is-invalid @enderror" name="amount" placeholder="Nhập số % giảm" value="{{ $coupon -> amount }}">
                                    @error('amount')
                                        <div class="alert alert-danger khala-alert">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                

                                <div class="form-group">
                                    <label >Chọn kiểu giảm</label>
                                    <!-- dung select 2 -->
                                    <select class="select2 form-control custom-select @error('amount_type') is-invalid @enderror"  name = "amount_type">
                                        <option value="Percentage">Percentage</option>
                                        
                                    </select>
                                    @error('amount_type')
                                    <div class="alert alert-danger khala-alert">{{ $message }}</div>
                                    @enderror
                                </div>

                     

                                <div class="form-group">
                                    <label class="control-label">Ngày hết hạn</label>
                                    <input type="date" class="form-control @error('expiry_date') is-invalid @enderror" name="expiry_date" placeholder="dd/mm/yyyy" value="{{ $coupon -> expiry_date }}">
                                    @error('expiry_date')
                                        <div class="alert alert-danger khala-alert">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                               
                                <div class="form-group">
                                    <label >Trạng thái</label>
                                    <div >
                                        <input type="radio"  name="status"  value="0" {{ $coupon -> status == 0?'checked':''}}>
                                        <label  >Ẩn</label>
                                    </div>
                                    <div >
                                        <input type="radio"  name="status"  value="1" {{ $coupon -> status == 1?'checked':''}}>
                                        <label >Hiện</label>
                                    </div>
                                </div>


                                <button type="submit" class="btn btn-info waves-effect waves-light m-r-10">Submit</button>
                                <a href="{{ route('coupon.index') }}" class="btn waves-effect waves-light btn-secondary">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

 @section('js')
   
 
    
    <!--select 2 -->
    <script src="{{ asset('admins/select2/dist/js/select2.full.min.js') }}"></script>
    <!--tags input -->
    <script src="{{ asset('admins/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>

   

    

    <script>
    jQuery(document).ready(function() {
        // For select 2
        $(".select2").select2();
        
    });
    </script>
 
 @endsection