@extends('admin.admin')
@section('title')
<title>Danh sách User</title>
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
    @include('admin.content-header',['name' => 'Danh sách User','key' => 'Danh sách','link' => 'user.add',
    'text_button' => 'Thêm'])
    <!-- End Bread crumb and right sidebar toggle -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Danh sách User</h4>
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
                                    <th>Tên Sản phẩm</th>
                                    <th>Email</th>
                                    <th>Vai trò</th>
                                    <th>Thời gian tạo</th>
                                    <th>Trạng thái</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                    
                                <tr>
                                    <td>
                                        {{ $user -> id}}
                                    </td>
                                     
                                    <td>
                                        {{ $user -> name}}
                                    </td>
                                    <td> 
                                        {{ $user -> email}}
                                    </td>
                                   
                                     <!-- optional($productItem -> category) dam bao chay ko lỗi khi productItem -> category ko co category tuong ung trong bang category -->
                                    <td>
                                        @foreach($user->roles as $key => $item)
                                            <span class="badge badge-info">{{ $item->name }}</span>
                                        @endforeach
                                    </td>
                                    <td>
                                        {{ $user -> created_at }}
                                    </td>
                                    <td><span class="label {{ $user -> status ==1?'label-success':'label-inverse' }}">{{ $user -> status ==1?'Hiện':'Ẩn'}} </span> </td>
                                    
                                    
                                     
                                    <td>
                                        <a href="{{ route('user.edit',['id' => $user -> id]) }}" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                                        <a href="" data-url="{{ route('user.delete',['id' => $user -> id]) }}" data-toggle="tooltip" data-original-title="Delete" class="sa-warning"> <i class="fa fa-close text-danger"></i> </a>
                                        
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="6" style="display: none;">
                                        {{ $users -> links() }} 
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
                       {{ $users -> links() }}
                   </div> 
                    <div class="col-lg-4 ">
                        <a href="{{ route('user.add') }}"  class="btn btn-info btn-rounded" >Thêm User</a>
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
