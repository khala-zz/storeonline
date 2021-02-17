@extends('admin.admin')
@section('title')
<title>Danh sách sản phẩm</title>
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
    @include('admin.content-header',['name' => 'Danh sách Sản phẩm','key' => 'Danh sách','link' => 'product.add',
    'text_button' => 'Thêm'])
    <!-- End Bread crumb and right sidebar toggle -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Danh sách Sản phẩm</h4>
                    <h6 class="card-subtitle"></h6>
                    <div class="table-responsive">
                        <form action="{{ route('product.index')}}">
                            <input type="text" name="query" placeholder="tim san pham" value="{{ request('query','')}}">

                            <!-- category search -->
                            <select name="category_search" >
                                <option value="0">--- tim theo danh muc ---</option>
                                @foreach($categories as $category)
                                <option 
                                value="{{$category -> id}}"
                                @if(request('category_search',0) == $category -> id) selected @endif>{{$category -> name}}</option>
                                @endforeach
                            </select>

                              <!-- tag search -->
                            <select name="tag_search" >
                                <option value="0">--- tim theo tag ---</option>
                                @foreach($tags as $tag)
                                <option value="{{$tag -> id}}"
                                     @if(request('tag_search',0) == $tag -> id) selected @endif>{{$tag -> name}}</option>
                                @endforeach
                            </select>
                            <input type="submit" value="tim kiem">
                        </form>
                        @if(session('success'))
                            <div class="alert alert-success">
                                <strong>{{ session('success') }}</strong>
                            </div>
                        @endif
                       
                        <table id="demo-foo-addrow" class="table m-t-30 table-hover contact-list"  >
                            <thead>
                                <tr>
                                    <th>Thứ tự</th>
                                    <th>Hình ảnh</th>
                                    <th>Tên Sản phẩm</th>
                                    <th>Giá</th>
                                    <th>Danh mục</th>
                                    <th>Thời gian tạo</th>
                                    <th>Trạng thái</th>
                                    <th>Images Gallery</th>
                                    <th>Product Attribute</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                    
                                <tr>
                                    <td>{{ $product -> id}}</td>
                                     <td>
                                        <img src="{{ $product -> feature_image_path }}" class="image_product_50_50">
                                    </td>
                                    <td>
                                        {{ $product -> name}}
                                    </td>
                                    <td> 
                                        {{ $product -> price}}
                                    </td>
                                   
                                     <!-- optional($productItem -> category) dam bao chay ko lỗi khi productItem -> category ko co category tuong ung trong bang category -->
                                    <td>{{ optional($product -> category) -> name }}</td>
                                    <td>{{ $product -> created_at -> diffForHumans()}}</td>
                                    <td><span class="label {{ $product -> status ==1?'label-success':'label-inverse' }}">{{ $product -> status ==1?'Hiện':'Ẩn'}} </span> </td>
                                    
                                     <td>
                                        <a href="{{ route('image-gallery.add',['id' => $product -> id]) }}" class="btn btn-primary btn-rounded btn-sm"> Add images </a>
                                    </td>
                                     <td>
                                        <a href="{{ route('product-attr.add',['id' => $product -> id]) }}" class="btn btn-danger btn-rounded btn-sm"> Add attr </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('product.edit',['id' => $product -> id]) }}" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                                        <a href="" data-url="{{ route('product.delete',['id' => $product -> id]) }}" data-toggle="tooltip" data-original-title="Delete" class="sa-warning"> <i class="fa fa-close text-danger"></i> </a>
                                        
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="6" style="display: none;">
                                        {{ $products -> links() }} 
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
                       {{ $products -> links() }}
                   </div> 
                    <div class="col-lg-4 ">
                        <a href="{{ route('product.add') }}"  class="btn btn-info btn-rounded" >Thêm Sản phẩm</a>
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