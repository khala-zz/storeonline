@extends('admin.admin')

@section('title')
    <title>Sửa Slider</title>
@endsection

@section('content')
    <div class="container-fluid">
        @include('admin.content-header',['name' => 'Slider','key' => 'Sửa','link' => 'slider.index',
        'text_button' => 'Danh sách'])
        <div class="row">

            <div class="col-md-12">
                <div class="card card-body">
                    <h3 class="box-title m-b-0">Sửa Slider</h3>
                    <p class="text-muted m-b-30 font-13"> Điền đầy đủ thông tin bên dưới </p>
                    <div class="row">
                        <div class="col-sm-6 col-xs-6">
                            <form action="{{ route('slider.update',['id' => $slider -> id])}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label> Tên Slider</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Nhập tên Slider" value="{{ $slider -> name }}">
                                    @error('name')
                                        <div class="alert alert-danger khala-alert">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label> Mô tả Slider</label>
                                    <input type="text" class="form-control @error('description') is-invalid @enderror" name="description" placeholder="Nhập mô tả Slider" value=" {{ $slider -> description }} ">
                                    @error('description')
                                        <div class="alert alert-danger khala-alert">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">

                                    <label >Nội dung Slider</label>
                                    <textarea 
                                    
                                    class="form-control tinymce_editor_init @error('content') is-invalid @enderror"
                                    rows="10"
                                    name="content">
                                    {{ $slider -> content }}
                                    </textarea>

                                </div>

                                <div class="form-group">
                                  <label>Hinh Ảnh</label>
                                  <input type="file" name = "image_path" class="form-control-file @error('image_path') is-invalid @enderror" >
                                  <div class="col-md-4">
                                    <div class="row">
                                      <img src="{{ $slider -> image_path }}" class="image_slider">
                                    </div>
                                  </div>
                                  @error('image_path')
                                  <div class="alert alert-danger">{{ $message }}</div>
                                  @enderror
                                </div>

                                <div class="form-group">
                                    <label >Trạng thái</label>
                                    <div >
                                        <input type="radio"  name="status"  value="0" {{ $slider -> status == 0?'checked':''}}>
                                        <label  >Ẩn</label>
                                    </div>
                                    <div >
                                        <input type="radio"  name="status"  value="1" {{ $slider -> status == 1?'checked':''}}>
                                        <label >Hiện</label>
                                    </div>
                                    @error('status')
                                        <div class="alert alert-danger khala-alert">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>


                                <button type="submit" class="btn btn-info waves-effect waves-light m-r-10">Submit</button>
                                <a href="{{ route('slider.index') }}" class="btn waves-effect waves-light btn-secondary">Cancel</a>
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
 
 @endsection