

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
    <!-- modernizr JS
		============================================ -->
    <script src="{{ asset('template') }}/js/vendor/modernizr-2.8.3.min.js"></script>

    {{-- <style>
        body{
            color: white;
        }
    </style> --}}
</head>

<body style="background-image: url({{ asset('template')}}/img/product/profilesebi.jpg); background-size: cover;">
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
                        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label>Nama</label>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="masukan nama" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
    
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Email</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="masukan email" name="email" value="{{ old('email') }}" required autocomplete="email">
    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>NIM</label>
                                    <input id="nim" type="number" class="form-control @error('nim') is-invalid @enderror" placeholder="masukan nim (12344)" name="nim" value="{{ old('nim') }}" required autocomplete="nim">
    
                                    @error('nim')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Angkatan</label>
                                    @php
                                        $angkatan = DB::table('angkatan')->get();
                                     @endphp
                                    <select class="form-control @error('angkatan_id') is-invalid @enderror" name="angkatan_id" wire:model="angkatan_id" id="angkatan_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                        <option value="" selected disabled>Pilih Angkatan</option>
                                        @foreach($angkatan AS $row)
                                        <option value="{{ $row->id }}">{{ $row->nama }}</option>
                                        @endforeach
                                        @error('angkatan_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </select>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Prodi</label>
                                    <input id="prodi" type="text" class="form-control @error('prodi') is-invalid @enderror" placeholder="Hukum Ekonomi Syariah" name="prodi" value="{{ old('prodi') }}" required autocomplete="prodi">
                                    @error('prodi')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Alamat</label>
                                    <input id="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror" placeholder="Jl. Raya Bojongsari" name="alamat" value="{{ old('alamat') }}" required autocomplete="alamat">
                                    @error('alamat')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Provinsi</label>
                                    @php
                                        $provinsi = DB::table('provinsi')->get();
                                    @endphp
                                   <select class="form-control  @error('alamat') is-invalid @enderror" name="provinsi" wire:model="provinsi" id="forProvinsi" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                        <option value="" selected disabled>Pilih Provinsi</option>
                                        @foreach($provinsi AS $row)
                                        <option value="{{ $row->id_prov }}">{{ $row->nama }}</option>
                                        @endforeach
                                        @error('provinsi')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </select>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>No Hp</label>
                                    <input id="hp" type="number" class="form-control @error('hp') is-invalid @enderror" placeholder="0857xxxxxxxx" name="hp" value="{{ old('hp') }}" required autocomplete="hp">
    
                                    @error('hp')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Beasiswa</label>
                                    <select class="form-control w-full" name="beasiswa" id="forBeasiswa" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                       
                                        <option value="" selected disabled>Pilih Jenis Beasiswa</option>
                                        <option value="ekspad">SDM EKSPAD</option>
                                        <option value="enterpreneur">ENTERPRENEUR</option>
                                        <option value="hafidz">HAFIDZ</option>
                                        <option value="kader ulama">KADER ULAMA</option>
                                       
                                        @error('beasiswa')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </select>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Password</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
    
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Confirm Password</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                               
                                <div class="form-group col-lg-12">
                                    <label>Upload Profil</label>
                                    <input type="file" name="foto" class="form-control {{ $errors->first('foto') ? "is-invalid":""}}">
                                        @error('foto')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                </div>
                                {{-- <div class="form-group col-lg-12">
                                        {!! NoCaptcha::display() !!}
                                        {!! NoCaptcha::renderJs() !!}
                                        @error('g-recaptcha-response')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                </div> --}}
                                <button class="btn btn-success btn-block loginbtn" type="submit">Register</button>
                                <a class="btn btn-default btn-block" href="{{route('login')}}">Login</a>
                            </div> 
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
</body>

</html>
