@extends('admin.admin')
@section('head')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection
@section('title')
<title>Product Attribute</title>
@endsection
@section('css')
<link href="{{ asset('admins/css/footable.core.css') }}" rel="stylesheet">
<link href="{{ asset('admins/css/bootstrap-select.min.css') }}" rel="stylesheet">
<link href="{{asset('admins/css/pages/footable-page.css')}}" rel="stylesheet">
<link href="{{ asset('admins/css/sweetalert.css') }}" rel="stylesheet">
<!-- xeditable css -->
<link href="{{ asset('admins/x-editable/dist/bootstrap3-editable/css/bootstrap-editable.css') }}" rel="stylesheet">

@endsection
@section('content')
<div class="container-fluid">

    <!-- Bread crumb and right sidebar toggle -->
    @include('admin.content-header',['name' => 'Image Gallery','key' => 'Danh sách','link' => 'product.index',
    'text_button' => 'Danh sách sản phẩm'])
    <!-- End Bread crumb and right sidebar toggle -->
  <div class="row">
                    <div class="col-lg-4">
                       <div class="card" >
                          <img class="card-img-top" src="{{ $product -> feature_image_path }}" alt="{{ $product -> name }}">
                          <div class="card-body">
                            <h4 class="card-title">{{ $product -> name }}</h4>
                            <h4 class="card-title">{{ $product -> price }}</h4>
                            <h1>Thêm thuộc tính sản phẩm</h1>

                            @if(session('success'))
                                <div class="alert alert-success">
                                    <strong>{{ session('success') }}</strong>
                                </div>
                            @endif

                            <form action="{{route('product-attr.store')}}" method="post">
                                    
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <div class="form-group">
                                        <input type="hidden" name="product_id" value="{{$product->id}}">
                                        <div class="form-group">
                                    
                                    <input type="text" class="form-control @error('sku') is-invalid @enderror" name="sku" placeholder="Nhập SKU" value="{{ old('sku') }}">
                                    
                                    @error('sku')
                                        <div class="alert alert-danger khala-alert">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    
                                    <input type="text" class="form-control @error('price') is-invalid @enderror" name="price" placeholder="Nhập Price" value="{{ old('price') }}">
                                    @error('price')
                                        <div class="alert alert-danger khala-alert">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    
                                    <input type="text" class="form-control @error('size') is-invalid @enderror" name="size" placeholder="Nhập Size" value="{{ old('size') }}">
                                    @error('size')
                                        <div class="alert alert-danger khala-alert">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    
                                    <input type="number" class="form-control @error('stock') is-invalid @enderror" name="stock" placeholder="Nhập số lượng trong kho" value="{{ old('stock') }}">
                                    @error('stock')
                                        <div class="alert alert-danger khala-alert">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                       
                                        <button type="submit" class="btn btn-success" style="margin-left: auto;margin-right: auto;margin-top: 10px;">Upload</button>
                                    </div>

                                </form>
                          </div>
                        </div>

                    </div>
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Danh sách thuộc tính Sản phẩm</h4>
                                <div class="table-responsive">
                                    <table class="table color-table success-table">
                                        <thead>
                                            <tr>
                                                <th>SKU</th>
                                                <th>Size</th>
                                                <th>Price</th>
                                                <th>Stock</th>
                                                <th>Action</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($productAttrs as $key => $productAttr)
                                            <input type="hidden" name="id[]" value="{{$productAttr->id}}">
                                            <tr>
                                                <td>
                                                    <a href="javascript:void(0)"  data-type="text" data-pk="1" id="sku_{{$productAttr->id}}" class ="productAttr-sku" name="sku" data-title="Nhập sku">{{$productAttr -> sku}}
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="javascript:void(0)" class ="productAttr-size" data-type="text" data-pk="1" data-title="Enter username" name="size" id="size_{{$productAttr->id}}">{{$productAttr -> size}}
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="javascript:void(0)" class ="productAttr-price" name ="price" data-type="text" data-pk="1" data-title="Nhập price" id="price_{{$productAttr->id}}">{{$productAttr -> price}}
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="javascript:void(0)" class ="productAttr-stock" data-type="text" data-pk="1" data-title="Nhập stock" name="stock" id="stock_{{$productAttr->id}}">{{$productAttr -> stock}}
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="" data-toggle="tooltip" data-original-title="Cập nhật"  data-id="{{$productAttr -> id}}" class="attr-update"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                                                    <a href="" data-url="{{ route('product-attr.delete',['id' => $productAttr -> id]) }}" data-toggle="tooltip" data-original-title="Delete" class="sa-warning"> <i class="fa fa-close text-danger"></i> </a>
                                                </td>
                                            </tr>
                                            @endforeach

                                           
                                         
                                        </tbody>
                                    </table>
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

<!-- text xedtior -->
<script src="{{asset('admins/x-editable/dist/bootstrap3-editable/js/bootstrap-editable.js')}}"></script>

<script type="text/javascript">
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $(function() {
       
        $('.productAttr-sku').editable({
            type: 'text',
            pk: 1,
            name: 'sku[]',
            title: 'Nhập sku',
            mode: 'inline'
        });
        $('.productAttr-size').editable({
            type: 'text',
            pk: 1,
            name: 'size[]',
            title: 'Nhập size',
            mode: 'inline'
        });
        $('.productAttr-price').editable({
            type: 'text',
            pk: 1,
            name: 'price[]',
            title: 'Nhập price',
            mode: 'inline'
        });
        $('.productAttr-stock').editable({
            type: 'text',
            pk: 1,
            name: 'stock[]',
            title: 'Nhập stock',
            mode: 'inline'
        });

        //xu ly ajax để cap nhat dữ liệu attr
       
        $(document).on("click", ".attr-update" , function(e) {
          e.preventDefault();
          var edit_id = $(this).data('id');
          var sku = $('#sku_'+edit_id).text();
          var size = $('#size_'+edit_id).text();
          var price = $('#price_'+edit_id).text();
          var stock = $('#stock_'+edit_id).text();
         
          if(sku != '' && size != '' && price != '' && stock != ''){
            $.ajax({
              url: '/admin/product-attr/update',
              type: 'get',
              data: {_token: CSRF_TOKEN,editid: edit_id,sku: sku,size: size,price: price,stock: stock},
              success: function(response){
                alert('cập nhật thành công');
                }
                
            });
        }
        else{
            alert('Vui lòng điền đầy đủ thông tin');
        }
    });
    });
    </script>

    
@endsection