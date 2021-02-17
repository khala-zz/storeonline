@extends('admin.admin')

@section('title')
	<title>Thêm Sản phẩm</title>
@endsection

@section('css')
 <!-- dung select 2 -->
 
 <link href=" {{ asset('admins/select2/dist/css/select2.min.css') }}" rel="stylesheet" />
 <!-- dung tagsinput -->
 <link href=" {{ asset('admins/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}" rel="stylesheet" />
 

  

 @endsection
@section('content')
	<div class="container-fluid">
		@include('admin.content-header',['name' => 'Sản phẩm','key' => 'Thêm','link' => 'product.index',
		'text_button' => 'Danh sách'])
		<div class="row">

			<div class="col-md-12">
				<div class="card card-body">
					<h3 class="box-title m-b-0">Thêm Sản phẩm</h3>
					<p class="text-muted m-b-30 font-13"> Điền đầy đủ thông tin bên dưới </p>
					<div class="row">
						<div class="col-sm-6 col-xs-6">
							<form action="{{ route('product.store')}}" method="post" enctype="multipart/form-data" >
								@csrf
								<div class="form-group">
									<label> Tên Sản phẩm</label>
									<input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Nhập tên Sản phẩm" value="{{ old('name') }}">
									@error('name')
										<div class="alert alert-danger khala-alert">
											{{ $message }}
										</div>
									@enderror
								</div>

								<div class="form-group">
									<label> Mã Sản phẩm</label>
									<input type="text" class="form-control @error('ma_sp') is-invalid @enderror" name="ma_sp" placeholder="Nhập mã Sản phẩm" value="{{ old('ma_sp') }}">
									@error('ma_sp')
										<div class="alert alert-danger khala-alert">
											{{ $message }}
										</div>
									@enderror
								</div>

								<div class="form-group">
									<label> Giá Sản phẩm</label>
									<input type="text" class="form-control @error('price') is-invalid @enderror" name="price" placeholder="Nhập tên Sản phẩm" value="{{ old('price') }}">
									@error('price')
										<div class="alert alert-danger khala-alert">
											{{ $message }}
										</div>
									@enderror
								</div>

								<div class="form-group">
									<label> Mô tả Sản phẩm</label>
									<textarea 
									
									class="form-control @error('description') is-invalid @enderror"
									rows="10"
									name="description">
									{{ old('description') }}
									</textarea>
									@error('description')
										<div class="alert alert-danger khala-alert">
											{{ $message }}
										</div>
									@enderror
								</div>

								<div class="form-group">
									<label >Nội dung Sản phẩm</label>
									<textarea 
									
									class="form-control tinymce_editor_init @error('content') is-invalid @enderror"
									rows="20"
									name="content">
									{{ old('content') }}
									</textarea>

								</div>

								<div class="form-group">
				                  <label>Hinh Ảnh đại diện</label>
				                  <input type="file" name = "feature_image_path" class="form-control-file @error('feature_image_path') is-invalid @enderror" >
				                  @error('feature_image_path')
				                  <div class="alert alert-danger khala-alert">{{ $message }}</div>
				                  @enderror
				                </div>
				                <!---
				                <div class="form-group">
				                	<label>Ảnh chi tiết</label>
				                	<input type="file" multiple  name ="image_path[]" class="form-control-file" >
				                </div>

				                --->


				                <div class="form-group">
				                	<label >Chọn danh mục</label>
				                	<!-- dung select 2 -->
				                	<select class="select2 form-control custom-select @error('category_id') is-invalid @enderror"  name = "category_id">
				                		<option value=''>Chọn danh mục </option>
				                		{!! $htmlOption !!}
				                	</select>
				                	@error('category_id')
				                	<div class="alert alert-danger khala-alert">{{ $message }}</div>
				                	@enderror
				                </div>

				                <div class="form-group">
				                	<label >Chọn brand</label>
				                	<!-- dung select 2 -->
				                	<select class="select2 form-control custom-select @error('brand_id') is-invalid @enderror"  name = "brand_id">
				                		<option value=''>Chọn brand </option>
				                		{!! $htmlOptionBrand !!}
				                	</select>
				                	@error('brand_id')
				                	<div class="alert alert-danger khala-alert">{{ $message }}</div>
				                	@enderror
				                </div>

				                <!-- dung select 2 -->
				                <div class="form-group">
				                  <h5 >Nhập tags cho sản phẩm</h5>
				                  <select name = "tags[]"  class="form-control" multiple data-role="tagsinput">
				                  <option value=""></option>
				                  </select>


				                </div>   

								<div class="form-group">
									<label >Trạng thái</label>
									<div >
										<input type="radio"  name="status"  value="0">
										<label  >Ẩn</label>
									</div>
									<div >
										<input type="radio"  name="status"  value="1">
										<label >Hiện</label>
									</div>
									@error('status')
										<div class="alert alert-danger khala-alert">
											{{ $message }}
										</div>
									@enderror
								</div>


								<button type="submit" class="btn btn-info waves-effect waves-light m-r-10">Submit</button>
								<a href="{{ route('product.index') }}" class="btn waves-effect waves-light btn-secondary">Cancel</a>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection

 @section('js')
   
    <!--editor tinymce5-->
    <script src="{{ asset('admins/js/tinymce/tinymce.min.js') }}"></script>

    <script src="{{ asset('admins/js/tinymce/init_tinymce.js') }}"></script>
    
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