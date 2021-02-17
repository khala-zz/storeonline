@extends('admin.admin')

@section('title')
    <title>Sửa Setting</title>
@endsection

@section('content')
    <div class="container-fluid">
        @include('admin.content-header',['name' => 'Setting','key' => 'Sửa','link' => 'setting.index',
        'text_button' => 'Danh sách'])
        <div class="row">

            <div class="col-md-12">
                <div class="card card-body">
                    <h3 class="box-title m-b-0">Sửa Setting</h3>
                    <p class="text-muted m-b-30 font-13"> Điền đầy đủ thông tin bên dưới </p>
                    <div class="row">
                        <div class="col-sm-6 col-xs-6">
                            <form action="{{ route('setting.update',['id' => $setting -> id]) }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label> Config key</label>
                                    <input type="text" class="form-control @error('config_key') is-invalid @enderror" name="config_key" placeholder="Nhập config key" value="{{ $setting -> config_key }}">
                                    @error('config_key')
                                        <div class="alert alert-danger khala-alert">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    
                                    <label >Config value</label>
                                    @if($setting -> type === 'Textarea')
                                    <textarea 
                                    placeholder="Nhập config value"
                                    class="form-control @error('config_value') is-invalid @enderror"
                                    rows="10"
                                    name="config_value">
                                    {{ $setting -> config_value }}
                                    </textarea>
                                    @elseif($setting -> type === 'Text')
                                    <input 
                                    type="text" 
                                    class="form-control @error('config_value') is-invalid @enderror" 
                                    name="config_value" 
                                    placeholder="Nhập config value" 
                                    value="{{ $setting -> config_value }}">
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label >Trạng thái</label>
                                    <div >
                                        <input type="radio"  name="status"  value="0" {{ $setting -> status == 0?'checked':''}}>
                                        <label  >Ẩn</label>
                                    </div>
                                    <div >
                                        <input type="radio"  name="status"  value="1" {{ $setting -> status == 1?'checked':''}}>
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