@extends('admin.admin')

@section('title')
	<title>Thêm Permissions</title>
@endsection

@section('content')
	<div class="container-fluid">
		@include('admin.content-header',['name' => 'Permissions','key' => 'Thêm','link' => 'permission.add',
		'text_button' => 'Danh sách'])
		<div class="row">

			<div class="col-md-12">
				<div class="card card-body">
					<h3 class="box-title m-b-0">Thêm Permissions</h3>
					<p class="text-muted m-b-30 font-13"> Điền đầy đủ thông tin bên dưới </p>
					<div class="row">
						<div class="col-sm-6 col-xs-6">
							@if(session('success'))
	                            <div class="alert alert-success">
	                                <strong>{{ session('success') }}</strong>
	                            </div>
	                        @endif
							<form action="{{ route('permission.store') }}" method="post">
								@csrf
								<div class="form-group">
									<label >Chọn tên module</label>
									<select class="form-control"  name = "module_parent">
					                    <option value=''>Chọn tên module</option>
					                    @foreach(config('permissions.table_module') as $moduleItem)
					                      <option value="{{ $moduleItem }}"> {{ $moduleItem }}</option>
					                    @endforeach
					                </select>
									
								</div>

								<div class="form-group">
				                  <div class="row">
				                     @foreach(config('permissions.module_children') as $moduleItemChildren)
				                    <div class="col-md-3">
				                      <label >
				                        <input type="checkbox" value="{{$moduleItemChildren}}" name="module_children[]">
				                        {{$moduleItemChildren}}
				                      </label>
				                    </div>
				                    
				                    @endforeach
				                 </div>
				                </div>


								<button type="submit" class="btn btn-info waves-effect waves-light m-r-10">Submit</button>
								
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection