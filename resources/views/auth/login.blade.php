<!DOCTYPE html>
<html lang="en">
<head>
  <title>YAYASAN DARUL ULUM</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
  <link rel="icon" type="image/png" href="{{asset('assets/images/logo1.png')}}"/>
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{asset('assets/login-v3/vendor/bootstrap/css/bootstrap.min.css')}}">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{asset('assets/login-v3/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{asset('assets/login-v3/fonts/iconic/css/material-design-iconic-font.min.css')}}">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{asset('assets/login-v3/vendor/animate/animate.css')}}">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="{{asset('assets/login-v3/vendor/css-hamburgers/hamburgers.min.css')}}">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{asset('assets/login-v3/vendor/animsition/css/animsition.min.css')}}">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{asset('assets/login-v3/vendor/select2/select2.min.css')}}">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="{{asset('assets/login-v3/vendor/daterangepicker/daterangepicker.css')}}">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{asset('assets/login-v3/css/util.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/login-v3/css/main.css')}}">
<!--===============================================================================================-->
  <style type="text/css">
    .merah{
      background: red;
    }
  </style>
</head>
<body>
  
  <div class="limiter">
    <div class="container-login100" style="background-image: url('assets/login-v3/images/bg-01.jpg');">
      <div class="wrap-login100">
        <form class="login100-form validate-form" autocomplete="off" method="POST" action="{{ route('login') }}">
          {{ csrf_field() }}
         <!--  <span class="login100-form-logo">
            <i class="zmdi zmdi-landscape"></i>
          </span> -->
          <div class="login100-form-title p-b-34 p-t-27">
            <img src="{{asset('assets/images/logo1.png')}}" width="200px" height="200px">
          </div>
          <span class="login100-form-title p-b-34 p-t-27">
            YAYASAN DARUL ULUM
          </span>
          <div class="wrap-input100 validate-input" data-validate = "Enter Username">
            <input required="" class="input100" autocomplete="off" value="" type="text" name="username" id="username" placeholder="Username" autofocus="">
            <span class="focus-input100" data-placeholder="&#xf207;"></span>
            @if ($errors->has('username'))
                    <strong style="color: yellow">{{ $errors->first('username') }}</strong>
            @endif
          </div>
          <div class="wrap-input100 validate-input" data-validate="Enter password">
            <input required="" class="input100" autocomplete="off" value="" type="password" name="password" id="password" placeholder="Password">
            <span class="focus-input100" data-placeholder="&#xf191;"></span>
          </div>
          <div class="container-login100-form-btn">
            <button type="submit" class="login100-form-btn">
              Login
            </button>
          </div>
          <div class="text-center p-t-90">
            <a class="txt1" href="#">
              Lupa Password?
            </a>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div id="dropDownSelect1"></div>
<!--===============================================================================================-->
  <script src="{{asset('assets/login-v3/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
  <script src="{{asset('assets/login-v3/vendor/animsition/js/animsition.min.js')}}"></script>
<!--===============================================================================================-->
  <script src="{{asset('assets/login-v3/vendor/bootstrap/js/popper.js')}}"></script>
  <script src="{{asset('assets/login-v3/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
  <script src="{{asset('assets/login-v3/vendor/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
  <script src="{{asset('assets/login-v3/vendor/daterangepicker/moment.min.js')}}"></script>
  <script src="{{asset('assets/login-v3/vendor/daterangepicker/daterangepicker.js')}}"></script>
<!--===============================================================================================-->
  <script src="{{asset('assets/login-v3/vendor/countdowntime/countdowntime.js')}}"></script>
<!--===============================================================================================-->
  <script src="{{asset('assets/login-v3/js/main.js')}}"></script>

</body>
</html>
<script type="text/javascript">
window.onload = function(e){ 
  $('#username').val(null);
  $('#password').val(null);
}
</script>