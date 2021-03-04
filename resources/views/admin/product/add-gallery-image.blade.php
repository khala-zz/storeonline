@extends('admin.admin')
@section('title')
<title>Image Gallery</title>
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
    @include('admin.content-header',['name' => 'Image Gallery','key' => 'Danh sách','link' => 'product.index',
    'text_button' => 'Danh sách sản phẩm'])
    <!-- End Bread crumb and right sidebar toggle -->
  <div class="row">
                    <div class="col-lg-6">
                       <div class="card" >
                          <img class="card-img-top" src="{{ $product -> feature_image_path }}" alt="{{ $product -> name }}">
                          <div class="card-body">
                            <h4 class="card-title">{{ $product -> name }}</h4>
                            <h4 class="card-title">{{ $product -> price }}</h4>
                            <h1>Thêm image gallery</h1>
                            <form action="{{route('image-gallery.store')}}" method="post" role="form" enctype="multipart/form-data">
                                    
                                    @csrf
                                    <div class="form-group">
                                        <input type="hidden" name="products_id" value="{{$product->id}}">
                                        <input type="file" name="image_path[]" id="id_imageGallery" class="form-control" multiple="multiple" required>
                                        <span class="text-danger">{{$errors->first('image')}}</span>
                                       
                                        <button type="submit" class="btn btn-success" style="margin-left: auto;margin-right: auto;margin-top: 10px;">Upload</button>
                                    </div>

                                </form>
                          </div>
                        </div>

                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Danh sách hình ảnh của Sản phẩm</h4>
                                <div class="table-responsive">
                                    <table class="table color-table success-table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Image</th>
                                                <th>Action</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; 
                                           
 
use Illuminate\Support\Facades\Storage;
 
$googleDriveStorage = Storage::disk('google_drive');
 
                                            // Trước tiên cần lấy ra thông tin của file 'test.txt'
                                            // trên google drive trước đã
                                            $fileinfo = collect($googleDriveStorage->listContents('1Q7gpPodh56tCp1cY4mJ35F-mL7mW5ozH', false))
                                                ->where('type', 'file')
                                                ->where('name', 'JwQ0ECxsTt6lEWbWW34d.jpg')
                                                ->first();
                                            // Đọc nội dung file 'test.txt' mà mình đã tạo ở trên
                                            $contents = $googleDriveStorage->get($fileinfo['path']);
                                            dd($contents);
 

                                            ?>
                                            @foreach($imagesGallery as $image)
                                            
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>
                                                    <img src="<?php echo $contents; ?>" class="image_product_100_100">
                                                </td>
                                                <td>
                                                    <a href="" data-url="{{ route('image-gallery.delete',['id' => $image -> id]) }}" data-toggle="tooltip" data-original-title="Delete" class="sa-warning"> <i class="fa fa-close text-danger"></i> </a>
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
    
@endsection
