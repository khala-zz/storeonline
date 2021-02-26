@extends('admin.admin')
@section('title')
<title>Danh sach Slider</title>
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
    @include('admin.content-header',['name' => 'Danh sách Slider','key' => 'Danh sách','link' => 'slider.add',
    'text_button' => 'Thêm'])
    <!-- End Bread crumb and right sidebar toggle -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Danh sách Slider</h4>
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
                                    <th>Tên Slider</th>
                                    <th>Mô tả Slider</th>
                                    <th>Hình ảnh</th>
                                    <th>Thời gian tạo</th>
                                    <th>Trạng thái</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sliders as $slider)
                    
                                <tr>
                                    <td>{{ $slider -> id}}</td>
                                    <td>
                                        {{ $slider -> name}}
                                    </td>
                                    <td> 
                                        {{ $slider -> description}}
                                    </td>
                                    <td>
                                    
                                        <img src="data:image/png;base64,{{$slider -> baseimage}}" class="image_slider_150_100">
                                    </td>
                                    <td>{{ $slider -> created_at -> diffForHumans()}}</td>
                                    <td><span class="label {{ $slider -> status ==1?'label-success':'label-inverse' }}">{{ $slider -> status ==1?'Hiện':'Ẩn'}} </span> </td>
                                    
                                    <td>
                                        <a href="{{ route('slider.edit',['id' => $slider -> id]) }}" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                                        <a href="" data-url="{{ route('slider.delete',['id' => $slider -> id]) }}" data-toggle="tooltip" data-original-title="Delete" class="sa-warning"> <i class="fa fa-close text-danger"></i> </a>
                                        
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="6" style="display: none;">
                                        {{ $sliders -> links() }} 
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
                       {{ $sliders -> links() }}
                   </div> 
                    <div class="col-lg-4 ">
                        <a href="{{ route('slider.add') }}"  class="btn btn-info btn-rounded" >Thêm Slider</a>
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
