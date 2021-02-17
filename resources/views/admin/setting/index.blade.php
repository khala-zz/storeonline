@extends('admin.admin')
@section('title')
<title>Setting</title>
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
    @include('admin.content-header',['name' => 'Setting','key' => 'Danh sách','link' => 'setting.add',
    'text_button' => 'Thêm'])
    <!-- End Bread crumb and right sidebar toggle -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Danh sách Setting</h4>
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
                                    <th>Config key</th>
                                    <th>Config value</th>
                                    <th>Thời gian tạo</th>
                                    <th>Trạng thái</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($settings as $setting)
                               
                                <tr>
                                    <td>{{ $setting -> id}}</td>
                                    <td>
                                        {{ $setting -> config_key}}
                                    </td>
                                    <td> 
                                        
                                        {{ $setting -> config_value }}        
                                      
                                    </td>
                                    <td>{{ $setting -> created_at -> diffForHumans()}}</td>
                                    <td><span class="label {{ $setting -> status ==1?'label-success':'label-inverse' }}">{{ $setting -> status ==1?'Hiện':'Ẩn'}} </span> </td>
                                    
                                    <td>
                                        <a href="{{ route('setting.edit',['id' => $setting -> id]) }}" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                                        <a href="" data-url="{{ route('setting.delete',['id' => $setting -> id]) }}" data-toggle="tooltip" data-original-title="Delete" class="sa-warning"> <i class="fa fa-close text-danger"></i> </a>
                                        
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="6" style="display: none;">
                                        {{ $settings -> links() }} 
                                    </td>
                                  
                                   
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                       
                    </div>
                    <div class="col-lg-6 ">
                       {{ $settings -> links() }}
                   </div> 
                    <div class="col-lg-2">
                        <a class="btn  btn-info d-none d-lg-block m-l-15 dropdown-toggle" data-toggle="dropdown" href="#">
                          <i class="fa fa-plus-circle"></i>Thêm Setting
                          <span class="caret"></span>
                      </a>
                      <ul class="dropdown-menu">
                          <li><a href="{{ route('setting.add'). '?type=Text'}} ">Text</a></li>
                          <li><a href="{{ route('setting.add'). '?type=Textarea'}}">Textarea</a></li>
                      </ul>
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