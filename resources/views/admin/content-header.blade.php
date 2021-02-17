<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">{{ $name }}</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                @if($name === 'Image Gallery')

                <li class="breadcrumb-item"><a href="{{ route($link) }}">Products</a></li>
                <li class="breadcrumb-item active">Image Gallery</li>

                @else

                <li class="breadcrumb-item"><a href="{{ route($link) }}">{{ $name }}</a></li>
                <li class="breadcrumb-item active">{{ $key }}</li>

                @endif

            </ol>
            @if($name === 'Setting' && $key ==='Danh sách')

                <a class="btn  btn-info d-none d-lg-block m-l-15 dropdown-toggle" data-toggle="dropdown" href="#">
                  <i class="fa fa-plus-circle"></i>{{ $text_button}}
                  <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                  <li><a href="{{ route('setting.add'). '?type=Text'}} ">Text</a></li>
                  <li><a href="{{ route('setting.add'). '?type=Textarea'}}">Textarea</a></li>
                </ul>

            @else 

                <a href="{{ route($link) }}" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> {{ $text_button}}</a>

            @endif
        </div>
    </div>
</div>

 