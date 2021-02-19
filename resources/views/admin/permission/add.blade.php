@extends('admin.admin')

@section('title')
	<title>Thêm Permission</title>
@endsection

@section('content')
	<div class="container-fluid">
		@include('admin.content-header',['name' => 'Permission','key' => 'Thêm','link' => 'permission.index',
		'text_button' => 'Danh sách'])
		<div class="row">

			<div class="col-md-12">
				<div class="card card-body">
					<h3 class="box-title m-b-0">Thêm PerMission</h3>
					<p class="text-muted m-b-30 font-13"> Điền đầy đủ thông tin bên dưới </p>
					<div class="row">
						<div class="col-sm-6 col-xs-6">
							<form action="{{ route('permission.store')}}" method="post">
								@csrf
								<div class="form-group">
									<label> Tên Permission</label>
									<input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Nhập tên permission" value="{{ old('name') }}">
									@error('name')
										<div class="alert alert-danger khala-alert">
											{{ $message }}
										</div>
									@enderror
								</div>

								<div class="form-group">
									<label >Permission cha</label>
									<select class="form-control" name="parent_id">
										<option value="0">Chọn permission cha</option>
										{!! $htmlOption !!}
									</select>
									
								</div>

								<button type="submit" class="btn btn-info waves-effect waves-light m-r-10">Submit</button>
								<a href="{{ route('permission.index') }}" class="btn waves-effect waves-light btn-secondary">Cancel</a>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection
