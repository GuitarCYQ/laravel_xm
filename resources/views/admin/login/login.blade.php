<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>后台登录</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset(__ADMIN__) }}/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="{{ asset(__ADMIN__) }}/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset(__ADMIN__) }}/css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset(__ADMIN__) }}/images/favicon.png" />
</head>

<body>
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
            <div class="row w-100">
                <div class="col-lg-4 mx-auto">
                    <div class="auth-form-light text-left p-5">
                        <div class="brand-logo">
                            <img src="{{ asset(__ADMIN__) }}/images/logo.svg">
                        </div>
                        <h4>后台登录</h4>
                        @if(session()->has('errormsg'))
                        <div class="alert alert-danger">
                            {{session('errormsg')}}
                        </div>
                        @endif
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger">
                                    {{ $error }}
                                </div>
                            @endforeach
                        @endif
                        <form class="pt-3" action="{{route('admin.login.dologin')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="username" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <input type="text" name="code" class="form-control form-control-lg" id="exampleInputCaptcha" placeholder="Captcha">
                                <img src="{{captcha_src('math')}}" alt="" onclick="this.src='{{captcha_src()}}?'+Math.random()" style="cursor: pointer;">
                            </div>
                            <div class="mt-3">
                                <input type="submit" value="SIGN IN" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="{{ asset(__ADMIN__) }}/vendors/js/vendor.bundle.base.js"></script>
<script src="{{ asset(__ADMIN__) }}/vendors/js/vendor.bundle.addons.js"></script>
<!-- endinject -->
<!-- inject:js -->
<script src="{{ asset(__ADMIN__) }}/js/off-canvas.js"></script>
<script src="{{ asset(__ADMIN__) }}/js/misc.js"></script>
<!-- endinject -->
</body>

</html>
