@extends('admin.admin')
@section('title')
<title>Reviews</title>
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
    @include('admin.content-header',['name' => 'Reviews','key' => 'Danh sách','link' => 'review.index',
    'text_button' => 'Danh sach'])
    <!-- End Bread crumb and right sidebar toggle -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Danh sách reviews</h4>
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
                                    <th>San pham</th>
                                    <th>User</th>
                                    <th>Rating</th>
                                    <th>Comment</th>
                                    <th>Thời gian tạo</th>
                                    <th>Trạng thái</th>
                                    <th>Thao tac</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($reviews as $review)
                               
                                <tr>
                                    <td>
                                        {{ $review -> id}}
                                    </td>
                                    <td>
                                        {{ $review -> product -> name}}
                                    </td>
                                    <td> 
                                        {{ $review -> user -> name }}
                                    </td>
                                    <td> 
                                        {{$review -> rating}}
                                    </td>
                                    <td> 
                                        {{$review -> comment}}
                                    </td>
                                    <td>
                                        {{ $review -> created_at -> diffForHumans()}}
                                    </td>
                                    <td><span class="label {{ $review -> status ==1?'label-success':'label-inverse' }}">{{ $review -> status ==1?'Hiện':'Ẩn'}} </span> </td>
                                    
                                    <td>
                                      
                                        <a href="" data-url="{{ route('review.delete',['id' => $review -> id]) }}" data-toggle="tooltip" data-original-title="Delete" class="sa-warning"> <i class="fa fa-close text-danger"></i> </a>
                                      
                                        
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="6" style="display: none;">
                                        {{ $reviews -> links() }} 
                                    </td>
                                  
                                   
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <div class="row">
                    
                    <div class="col-lg-4 ">
                       {{ $reviews -> links() }}
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