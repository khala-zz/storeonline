<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon.png') }}">
    @yield('title')
    <!-- This page CSS -->
  
    <link href="{{asset('admins/css/style.min.css')}}" rel="stylesheet">
   
   
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="skin-blue fixed-layout">
    
    <div id="main-wrapper">
      
        <div class="row">
                    <div class="col-lg-6" style="margin-left: auto;margin-right: auto">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Đăng nhập hệ thống</h4>
                                <h6 class="card-subtitle">Điền đầy đủ thông tin bên dưới</h6>
                                <form class="form p-t-20" action="" method="post">
                                   @csrf
                                    <div class="form-group">
                                        
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon2"><i class="ti-email"></i></span>
                                            </div>
                                            <input type="text" name="email" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="basic-addon2">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon3"><i class="ti-lock"></i></span>
                                            </div>
                                            <input type="password" class="form-control" placeholder="Mật khẩu" aria-label="Password" aria-describedby="basic-addon3" name="password">
                                        </div>
                                    </div>
                                  
                                    <div class="form-group">
                                        <div class="checkbox checkbox-success">
                                            <input id="checkbox1" type="checkbox" name="remember_me">
                                            <label for="checkbox1"> Remember me </label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Đăng nhập</button>
                                    <button type="submit" class="btn btn-inverse waves-effect waves-light">Đăng kí</button>
                                </form>
                            </div>
                        </div>
                    </div>
                  
                </div>
       
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
   

    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
 
  
   
</body>

</html>
