@extends('admin.admin')

@section('title')
	<title>Sửa Role</title>
@endsection

@section('css')

  <link href=" {{ asset('admins/role/add/add.css') }}" rel="stylesheet" />
 
 @endsection

@section('content')
	<div class="container-fluid">
		@include('admin.content-header',['name' => 'Roles','key' => 'Sửa','link' => 'role.index',
		'text_button' => 'Danh sách'])
		<div class="row">

			<div class="col-md-12">
				<div class="card card-body">
					<h3 class="box-title m-b-0">Sửa Roles</h3>
					<p class="text-muted m-b-30 font-13"> Điền đầy đủ thông tin bên dưới </p>
					<div class="row">
						<div class="col-sm-6 col-xs-6">
							@if(session('success'))
	                            <div class="alert alert-success">
	                                <strong>{{ session('success') }}</strong>
	                            </div>
	                        @endif
							<form action="{{ route('role.update',["id" => $role -> id]) }}" method="post">
								@csrf
								<div class="form-group">
									<label> Tên vai trò</label>
									<input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Nhập tên vai trò" value="{{ $role -> name }}">
									@error('name')
										<div class="alert alert-danger khala-alert">
											{{ $message }}
										</div>
									@enderror
								</div>

								<div class="form-group">
									<label>Tên hiển thị</label>


									<input type="text" class="form-control @error('display_name') is-invalid @enderror" name="display_name" placeholder="Nhập tên hiển thị" value="{{ $role -> display_name }}">
									@error('display_name')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
								</div>

								<div class="form-group">
									<label>Mô tả vai trò</label>


									<textarea name = "description" class="form-control @error('description') is-invalid @enderror" >
										{{ $role -> description }}
									</textarea>
									@error('description')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
								</div>

								<div class="col-md-12">
									<div class="row">
										<div class="col-md-12">
											<label >
												<input type="checkbox" class="checkall">CheckAll
											</label>
										</div>
										@foreach($permissionsParent as $permissionParentItem)

										<div class="card mb-3 col-md-12" >
											<div class="card-header bg-primary">
												<label >
													<input type="checkbox" value="" class="checkbox_wrapper checkbox_wrapper_{{$permissionParentItem -> name}}">
												</label>  
												Module {{ $permissionParentItem -> name }}
											</div>

											<div class="row">
												@foreach($permissionParentItem -> permissionsChildrent as $permissionsChildrenItem)
												<div class="card-body col-md-3">
													<h5 class="card-title">
														<label >
															<input type="checkbox" name="permission_id[]" value="{{$permissionsChildrenItem -> id }}" class="checkbox_children checkbox_children_{{$permissionParentItem -> name}}" {{ $permissionsChecked->contains('id',$permissionsChildrenItem -> id) ? 'checked':''}}>
														</label> 
														{{$permissionsChildrenItem -> name}}</h5>

													</div>
													@endforeach
												</div>
											</div>
											@endforeach

										</div>

									</div>

									<div class="form-group">
	                                    <label >Trạng thái</label>
	                                    <div >
	                                        <input type="radio"  name="status"  value="0" {{ $role -> status == 0?'checked':''}}>
	                                        <label  >Ẩn</label>
	                                    </div>
	                                    <div >
	                                        <input type="radio"  name="status"  value="1" {{ $role -> status == 1?'checked':''}}>
	                                        <label >Hiện</label>
	                                    </div>
                               		 </div>
                                @error('status')
                                        <div class="alert alert-danger khala-alert">
                                            {{ $message }}
                                        </div>
                                @enderror


								<button type="submit" class="btn btn-info waves-effect waves-light m-r-10">Submit</button>
								<a href="{{ route('role.index') }}" class="btn waves-effect waves-light btn-secondary">Cancel</a>
								
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection

@section('js')
<script src="{{ asset('admins/role/add/add.js') }}"></script>
@endsection