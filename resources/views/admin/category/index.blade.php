@extends('admin.admin')
@section('title')
<title>Danh mục sản phẩm</title>
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
    @include('admin.content-header',['name' => 'Danh mục sản phẩm','key' => 'Danh sách','link' => 'categories.create',
    'text_button' => 'Thêm'])
    <!-- End Bread crumb and right sidebar toggle -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Danh sách danh mục sản phẩm</h4>
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
                                    <th>Tên danh mục</th>
                                    <th>Tên danh mục cha</th>
                                    <th>Thời gian tạo</th>
                                    <th>Trạng thái</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $category)
                                <?php
                                    $parent_cates = DB::table('categories')->select('name')->where('id',$category->parent_id)->get();
                                ?>
                                <tr>
                                    <td>{{ $category -> id}}</td>
                                    <td>
                                        {{ $category -> name}}
                                    </td>
                                    <td> 
                                        @foreach($parent_cates as $parent_cate)
                                            {{$parent_cate->name}}
                                        @endforeach
                                    </td>
                                    <td>{{ $category -> created_at -> diffForHumans()}}</td>
                                    <td><span class="label {{ $category -> status ==1?'label-success':'label-inverse' }}">{{ $category -> status ==1?'Hiện':'Ẩn'}} </span> </td>
                                    
                                    <td>
                                        @can('category-edit')
                                        <a href="{{ route('categories.edit',['id' => $category -> id]) }}" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                                        @endcan
                                        @can('category-delete')
                                        <a href="" data-url="{{ route('categories.delete',['id' => $category -> id]) }}" data-toggle="tooltip" data-original-title="Delete" class="sa-warning"> <i class="fa fa-close text-danger"></i> </a>
                                        @endcan
                                        
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="6" style="display: none;">
                                        {{ $categories -> links() }} 
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
                       {{ $categories -> links() }}
                   </div> 
                    <div class="col-lg-4 ">
                        <a href="{{ route('categories.create') }}"  class="btn btn-info btn-rounded" >Thêm danh mục sản phẩm</a>
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