@extends('admin.admin')

@section('title')
    <title>Sửa user</title>
@endsection

@section('css')
 <!-- dung select 2 -->
 <link href=" {{ asset('admins/select2/dist/css/select2.min.css') }}" rel="stylesheet" />
 @endsection
@section('content')
    <div class="container-fluid">
        @include('admin.content-header',['name' => 'User','key' => 'Sửa','link' => 'user.index',
        'text_button' => 'Danh sách'])
        <div class="row">

            <div class="col-md-12">
                <div class="card card-body">
                    <h3 class="box-title m-b-0">Sửa User</h3>
                    <p class="text-muted m-b-30 font-13"> Điền đầy đủ thông tin bên dưới </p>
                    <div class="row">
                        <div class="col-sm-6 col-xs-6">
                            <form action="{{ route('user.update',["id" => $user -> id])}}" method="post" >
                                @csrf
                                <div class="form-group">
                                    <label> Tên </label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Nhập tên " value="{{ $user -> name }}">
                                    @error('name')
                                        <div class="alert alert-danger khala-alert">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" name = "email" class="form-control @error('email') is-invalid @enderror " placeholder="Nhập email" value="{{$user -> email }}">
                                    @error('email')
                                    <div class="alert alert-danger khala-alert">{{ $message }}</div>
                                    @enderror

                                </div>

                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name = "password" class="form-control @error('password') is-invalid @enderror " placeholder="Nhập password" >
                                    @error('password')
                                    <div class="alert alert-danger khala-alert">{{ $message }}</div>
                                    @enderror

                                </div>


                                <div class="form-group">
                                    <label >Chọn vai trò</label>
                                    <!-- dung select 2 -->
                                    <select  name = "role_id[]" class="select2 m-b-10 select2-multiple @error('role_id') is-invalid @enderror" style="width: 100%" multiple="multiple" data-placeholder="Choose">
                                        <option value=""></option>
                                        @foreach($roles as $role)
                                        <option 
                                        {{$roleOfUser -> contains('id',$role -> id) ? 'selected' : ''}}
                                        value="{{ $role -> id }}">{{ $role -> name}}</option>
                                        @endforeach
                                    </select>

                                    @error('role_id')
                                    <div class="alert alert-danger khala-alert">{{ $message }}</div>
                                    @enderror
                                </div>

                               

                                <div class="form-group">
                                    <label >Trạng thái</label>
                                    <div >
                                        <input type="radio"  name="status"  value = 0 {{ $user -> status == 0?'checked':''}}>
                                        <label  >Ẩn</label>
                                    </div>
                                    <div >
                                        <input type="radio"  name="status"  value = 1 {{ $user -> status == 1?'checked':''}}>
                                        <label >Hiện</label>
                                    </div>
                                </div>
                              
                                <button type="submit" class="btn btn-info waves-effect waves-light m-r-10">Submit</button>
                                <a href="{{ route('user.index') }}" class="btn waves-effect waves-light btn-secondary">Cancel</a>
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
    <script>
    jQuery(document).ready(function() {
        // For select 2
        $(".select2").select2();
        
    });
    </script>
 
 @endsection