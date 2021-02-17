@extends('admin.admin')

@section('title')
	<title>Thêm Setting</title>
@endsection

@section('content')
	<div class="container-fluid">
		@include('admin.content-header',['name' => 'Setting','key' => 'Thêm','link' => 'setting.index',
		'text_button' => 'Danh sách'])
		<div class="row">

			<div class="col-md-12">
				<div class="card card-body">
					<h3 class="box-title m-b-0">Thêm Setting</h3>
					<p class="text-muted m-b-30 font-13"> Điền đầy đủ thông tin bên dưới </p>
					<div class="row">
						<div class="col-sm-6 col-xs-6">
							<form action="{{ route('setting.store').'?type='. request() -> type }}" method="post">
								@csrf
								<div class="form-group">
									<label> Config key</label>
									<input type="text" class="form-control @error('config_key') is-invalid @enderror" name="config_key" placeholder="Nhập config key" value="{{ old('config_key') }}">
									@error('config_key')
										<div class="alert alert-danger khala-alert">
											{{ $message }}
										</div>
									@enderror
								</div>

								<div class="form-group">
									
									<label >Config value</label>
									@if(request() -> type === 'Textarea')
									<textarea 
									placeholder="Nhập config value"
									class="form-control @error('config_value') is-invalid @enderror"
									rows="10"
									name="config_value">
									{{ old('config_value') }}
									</textarea>
									@elseif(request() -> type === 'Text')
									<input 
									type="text" 
									class="form-control @error('config_value') is-invalid @enderror" 
									name="config_value" 
									placeholder="Nhập config value" 
									value="{{ old('config_value') }}">
									@endif
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
								<a href="{{ route('setting.index') }}" class="btn waves-effect waves-light btn-secondary">Cancel</a>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection