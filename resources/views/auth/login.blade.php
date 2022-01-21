
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Simoneb STEI SEBI</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('template') }}/img/logo/logo.ico">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Play:400,700" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('template') }}/css/bootstrap.min.css">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('template') }}/css/font-awesome.min.css">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('template') }}/css/owl.carousel.css">
    <link rel="stylesheet" href="{{ asset('template') }}/css/owl.theme.css">
    <link rel="stylesheet" href="{{ asset('template') }}/css/owl.transitions.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('template') }}/css/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('template') }}/css/normalize.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('template') }}/css/main.css">
    <!-- morrisjs CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('template') }}/css/morrisjs/morris.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('template') }}/css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- metisMenu CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('template') }}/css/metisMenu/metisMenu.min.css">
    <link rel="stylesheet" href="{{ asset('template') }}/css/metisMenu/metisMenu-vertical.css">
    <!-- calendar CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('template') }}/css/calendar/fullcalendar.min.css">
    <link rel="stylesheet" href="{{ asset('template') }}/css/calendar/fullcalendar.print.min.css">
    <!-- forms CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('template') }}/css/form/all-type-forms.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('template') }}/style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('template') }}/css/responsive.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
    integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">

    <!-- modernizr JS
		============================================ -->
    <script src="{{ asset('template') }}/js/vendor/modernizr-2.8.3.min.js"></script>

    {{-- <style>
        body{
            color: white;
        }
    </style> --}}
</head>

<body style="background-image: url({{ asset('template')}}/img/product/profilesebi.jpg); background-size: cover;  background-repeat: no-repeat;   background-attachment: fixed;">
    <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
	  <div class="error-pagewrap">
      <div class="error-page-int">
        <div class="content-error">
          <div class="hpanel">
                      <div class="panel-body">
                          <div class="text-center m-b-md custom-login">
                              <img src="{{ asset('template') }}/img/logo/logo.png" alt="logo">
                              <h3>#Kampusnya Para Juara</h3>
                              <p>Sistem Monitoring dan Evaluasi Peraih Beasiswa Full</p>
                          </div>
                          <form method="POST" action="{{ route('login') }}" id="loginForm">
                              @csrf
                              <div class="form-group">
                                  <label class="control-label" for="username">Email</label>
                                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="example@gmail.com" required autocomplete="email" autofocus>
                                
                                  @error('email')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                                  <span class="help-block small">Your unique email to app</span>
                              </div>
                              <div class="form-group">
                                  <label class="control-label" for="password">Password</label>
                                  <div class="input-group" id="show_hide_password">
                                    <input id="password" type="password"  title="Please enter your password" placeholder="******" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                        <button type="button" class="btn btn-outline-secondary" data-toggle="tooltip" data-placement="bottom">
                                          <i class="bi bi-eye-slash" aria-hidden="true"></i>
                                        </button>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                  </div>
                                  <span class="help-block small">Yur strong password</span>
                              </div>
                              {{-- <div class="form-group">
                                {!! NoCaptcha::display() !!}
                                {!! NoCaptcha::renderJs() !!}
                                @error('g-recaptcha-response')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                              </div> --}}
                              <button class="btn btn-success btn-block loginbtn" type="submit">Login</button>
                              <a class="btn btn-default btn-block" href="{{route('register')}}">Register</a>
                          </form>
                      </div>
                  </div>
        </div>
      </div>   
    </div>
    <!-- jquery
		============================================ -->
    <script src="{{ asset('template') }}/js/vendor/jquery-1.12.4.min.js"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="{{ asset('template') }}/js/bootstrap.min.js"></script>
    <!-- wow JS
		============================================ -->
    <script src="{{ asset('template') }}/js/wow.min.js"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="{{ asset('template') }}/js/jquery-price-slider.js"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="{{ asset('template') }}/js/jquery.meanmenu.js"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="{{ asset('template') }}/js/owl.carousel.min.js"></script>
    <!-- sticky JS
		============================================ -->
    <script src="{{ asset('template') }}/js/jquery.sticky.js"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="{{ asset('template') }}/js/jquery.scrollUp.min.js"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="{{ asset('template') }}/js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="{{ asset('template') }}/js/scrollbar/mCustomScrollbar-active.js"></script>
    <!-- metisMenu JS
		============================================ -->
    <script src="{{ asset('template') }}/js/metisMenu/metisMenu.min.js"></script>
    <script src="{{ asset('template') }}/js/metisMenu/metisMenu-active.js"></script>
    <!-- tab JS
		============================================ -->
    <script src="{{ asset('template') }}/js/tab.js"></script>
    <!-- icheck JS
		============================================ -->
    <script src="{{ asset('template') }}/js/icheck/icheck.min.js"></script>
    <script src="{{ asset('template') }}/js/icheck/icheck-active.js"></script>
    <!-- plugins JS
		============================================ -->
    <script src="{{ asset('template') }}/js/plugins.js"></script>
    <!-- main JS
		============================================ -->
    <script src="{{ asset('template') }}/js/main.js"></script>
    <!-- tawk chat JS
		============================================ -->
    {{-- <script src="{{ asset('template') }}/js/tawk-chat.js"></script> --}}

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
    crossorigin="anonymous"></script>

    {{-- show hide Password --}}
<script>
    $(document).ready(function () {
        $("#show_hide_password button").on('click', function (event) {
            event.preventDefault();
            if ($('#show_hide_password input').attr("type") == "text") {
                $('#show_hide_password input').attr('type', 'password');
                $('#show_hide_password i').addClass("bi bi-eye-slash");
                $('#show_hide_password i').removeClass("bi bi-eye");
            } else if ($('#show_hide_password input').attr("type") == "password") {
                $('#show_hide_password input').attr('type', 'text');
                $('#show_hide_password i').removeClass("bi bi-eye-slash");
                $('#show_hide_password i').addClass("bi bi-eye");
            }
        });
    });
</script>
</body>

</html>
