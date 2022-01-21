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
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
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
    <!-- meanmenu icon CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('template') }}/css/meanmenu.min.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('template') }}/css/main.css">
    <!-- educate icon CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('template') }}/css/educate-custon-icon.css">
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
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('template') }}/style.css">
    <link rel="stylesheet" href="{{ asset('template') }}/css/modals.css">


    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('template') }}/css/responsive.css">
    <!-- modernizr JS
		============================================ -->
   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css"/>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

    <script src="{{ asset('template') }}/js/vendor/modernizr-2.8.3.min.js"></script>
  
    @yield('set')

    <style>
      body {
        background-color: #d8e3f0;
      }
    </style>
      @yield('header')
</head>

<body>
    <script src="{{ asset('template') }}/js/vendor/jquery-1.12.4.min.js"></script>

    <!-- Start Left menu area -->
    @if (Auth::user()->role == 'admin')
    <div class="left-sidebar-pro">
        <nav id="sidebar"  class="" >
          <div class="sidebar-header">
            <a href="index.html"><img class="main-logo" src="{{ asset('template') }}/img/logo/logo.png" width="165px" style="margin-top: 5px;" alt="" /></a>
            <strong><a href="index.html"><img src="{{ asset('template') }}/img/logo/logo.png" width="60%" alt="" /></a></strong>
          </div>
            <div class="left-custom-menu-adp-wrap comment-scrollbar">
                <nav  class="sidebar-nav left-sidebar-menu-pro">
                    <ul  class="metismenu" id="menu1">
                      <li style="background-color: #c4d0dd;margin-top: 10px;">
                        <a title="Landing Page" href="" aria-expanded="false"><span style="color: #2a6078; font-size: 15px" class="mini-click-non"> MAIN NAVIGATION</span></a>
                      </li>
                        <li >
                          <a title="Landing Page" href="{{route('home')}}" aria-expanded="false"><i style="color: #2a6078" class="fas fa-tachometer-alt "></i><span style="color: #2a6078" class="mini-click-non"> Dashboard</span></a>
                        </li>
                        </li>
                        <li>
                          <a title="Landing Page" href="{{route('mahasiswa')}}" aria-expanded="false"><i style="color: #2a6078" class="fas fa-user-graduate "></i><span style="color: #2a6078" class="mini-click-non"> Data Mahasiswa</span></a>
                        </li>
                        <li>
                          <a title="Landing Page" href="{{route('portofolio')}}" aria-expanded="false"><i style="color: #2a6078" class="fas fa-chart-bar "></i><span style="color: #2a6078" class="mini-click-non"> Grafik Portofolio</span></a>
                        </li>
                      </form>
                    </ul>
                </nav>
            </div>
        </nav>
    </div>
   
    <!-- End Left menu area -->
    <!-- Start Welcome area -->
    <div class="all-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="logo-pro">
                        <a href="{{route('home')}}"><img class="main-logo"  width="165px" src="{{ asset('template')}}/img/logo/logo.png"/></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-advance-area">
            <div class="header-top-area">
                <div class="container-fluid">
                    <div class="row">
                        <div style="background-color: #00a7b8" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="header-top-wraper">
                                <div class="row">
                                    <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
                                        <div class="menu-switcher-pro">
                                            <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
												<i class="educate-icon educate-nav"></i>
											</button>
                                        </div>
                                    </div>
                                    <div  class="col-lg-6 col-md-7 col-sm-6 col-xs-12">
                                        
                                    </div>
                                    <div  class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                        <div class="header-right-info">
                                            <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                            
                                                <li class="nav-item">
                                                    <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
														<span class="admin-name">{{ Auth::user()->name}}</span> 
                                                        <i class="fa fa-angle-down edu-icon edu-down-arrow"></i>
													</a>
                                                    <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn">
                                                        <li>
                                                            <form action="{{ route('logout')}}" method="POST">
                                                                @csrf
                                                                <button class="btn btn-primary" style="margin-left: 50px; margin-top: 20px;" type="submit">
                                                                <span class="edu-icon edu-locked author-log-ic"></span>Log Out
                                                                </button>
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="nav-item nav-setting-open"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="educate-icon educate-menu"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mobile Menu start -->
            <div class="mobile-menu-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="mobile-menu">
                                <nav id="dropdown">
                                    <ul class="mobile-menu-nav">
                                        <li>
                                          <a data-toggle="collapse" data-target="#Charts" href="{{route('home')}}">Dashboard <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                        </li>
                                        <li><a href="{{route('mahasiswa')}}">Data Mahasiswa</a></li>
                                        <li><a href="{{route('portofolio')}}">Grafik Portofolio</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mobile Menu end -->
            <div class="breadcome-area" style="margin-top: 20px">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list single-page-breadcome">
                                <div class="row" style="height: 35px">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <h3 class="text-center">Sistem Monitoring dan Evaluasi Peraih Beasiswa Full</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="static-table-area">
            <div class="container-fluid">
                @yield('konten')
                
            </div>
        </div>
        <div class="static-table" style="margin-top: 20px">
          <div class="container-fluid">

              @yield('konten1')
          </div>
      </div>
        <br>
        <div>
          <div style="background-color: #00a7b8" class="footer-copyright-area navbar-fixed-bottom" >
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="footer-copy-right">
                            <p>Copyright © 2021. All rights reserved. By <a href="">STEI SEBI</a></p>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div> 
    </div>  

    @elseif (Auth::user()->role == 'pewancara')
    <div class="left-sidebar-pro">
        <nav id="sidebar"  class="" >
          <div class="sidebar-header">
            <a href="index.html"><img class="main-logo" src="{{ asset('template') }}/img/logo/logo.png" width="165px" style="margin-top: 5px;" alt="" /></a>
            <strong><a href="index.html"><img src="{{ asset('template') }}/img/logo/logo.png" width="60%" alt="" /></a></strong>
          </div>
            <div class="left-custom-menu-adp-wrap comment-scrollbar">
                <nav  class="sidebar-nav left-sidebar-menu-pro">
                    <ul  class="metismenu" id="menu1">
                      <li style="background-color: #c4d0dd;margin-top: 10px;">
                        <a title="Landing Page" href="" aria-expanded="false"><span style="color: #2a6078; font-size: 15px" class="mini-click-non"> MAIN NAVIGATION</span></a>
                      </li>
                        <li >
                          <a title="Landing Page" href="{{route('home')}}" aria-expanded="false"><i style="color: #2a6078" class="fas fa-tachometer-alt "></i><span style="color: #2a6078" class="mini-click-non"> Dashboard</span></a>
                        </li>
                        </li>
                        <li>
                          <a title="Landing Page" href="{{route('mahasiswa')}}" aria-expanded="false"><i style="color: #2a6078" class="fas fa-user-graduate "></i><span style="color: #2a6078" class="mini-click-non"> Data Mahasiswa</span></a>
                        </li>
                        <li>
                          <a title="Landing Page" href="{{route('portofolio')}}" aria-expanded="false"><i style="color: #2a6078" class="fas fa-chart-bar "></i><span style="color: #2a6078" class="mini-click-non"> Grafik Portofolio</span></a>
                        </li>
                      </form>
                    </ul>
                </nav>
            </div>
        </nav>
    </div>
   
    <!-- End Left menu area -->
    <!-- Start Welcome area -->
    <div class="all-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="logo-pro">
                        <a href="{{route('home')}}"><img class="main-logo"  width="165px" src="{{ asset('template')}}/img/logo/logo.png"/></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-advance-area">
            <div class="header-top-area">
                <div class="container-fluid">
                    <div class="row">
                        <div style="background-color: #00a7b8" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="header-top-wraper">
                                <div class="row">
                                    <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
                                        <div class="menu-switcher-pro">
                                            <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
												<i class="educate-icon educate-nav"></i>
											</button>
                                        </div>
                                    </div>
                                    <div  class="col-lg-6 col-md-7 col-sm-6 col-xs-12">
                                        
                                    </div>
                                    <div  class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                        <div class="header-right-info">
                                            <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                            
                                                <li class="nav-item">
                                                    <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
														<span class="admin-name">{{ Auth::user()->name}}</span> 
                                                        <i class="fa fa-angle-down edu-icon edu-down-arrow"></i>
													</a>
                                                    <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn">
                                                        <li>
                                                            <form action="{{ route('logout')}}" method="POST">
                                                                @csrf
                                                                <button class="btn btn-primary" style="margin-left: 50px; margin-top: 20px;" type="submit">
                                                                <span class="edu-icon edu-locked author-log-ic"></span>Log Out
                                                                </button>
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="nav-item nav-setting-open"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="educate-icon educate-menu"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mobile Menu start -->
            <div class="mobile-menu-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="mobile-menu">
                                <nav id="dropdown">
                                    <ul class="mobile-menu-nav">
                                        <li>
                                          <a data-toggle="collapse" data-target="#Charts" href="{{route('home')}}">Dashboard <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                        </li>
                                        <li><a href="{{route('mahasiswa')}}">Data Mahasiswa</a></li>
                                        <li><a href="{{route('portofolio')}}">Grafik Portofolio</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mobile Menu end -->
            <div class="breadcome-area" style="margin-top: 20px">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list single-page-breadcome">
                                <div class="row" style="height: 35px">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <h3 class="text-center">Sistem Monitoring dan Evaluasi Peraih Beasiswa Full</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="static-table-area">
            <div class="container-fluid">
                @yield('konten')
                
            </div>
        </div>
        <div class="static-table" style="margin-top: 20px">
          <div class="container-fluid">

              @yield('konten1')
          </div>
      </div>
        <br>
        <div>
          <div style="background-color: #00a7b8" class="footer-copyright-area navbar-fixed-bottom" >
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="footer-copy-right">
                            <p>Copyright © 2021. All rights reserved. By <a href="">STEI SEBI</a></p>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div> 
    </div>  
       
   @else


  <div class="left-sidebar-pro">
      <nav id="sidebar"  class="mb-5" >
        <div class="sidebar-header">
          <a href="index.html"><img class="main-logo" src="{{ asset('template') }}/img/logo/logo.png" width="165px" style="margin-top: 5px;" alt="foto" /></a>
          <strong><a href="index.html"><img src="{{ asset('template') }}/img/logo/logo.png" width="60%" alt="foto" /></a></strong>
        </div>
          <div class="left-custom-menu-adp-wrap comment-scrollbar">
              <nav  class="sidebar-nav left-sidebar-menu-pro">
                  <ul  class="metismenu" id="menu1">
                    <li style="background-color: #c4d0dd;margin-top: 10px;">
                      <a title="Landing Page" href="" aria-expanded="false"><span style="color: #2a6078; font-size: 15px" class="mini-click-non"> MAIN NAVIGATION</span></a>
                    </li>
                      <li >
                        <a title="Landing Page" href="{{route('home')}}" aria-expanded="false"><i style="color: #2a6078" class="fas fa-tachometer-alt "></i><span style="color: #2a6078" class="mini-click-non"> Dashboard</span></a>
                      </li>
                      </li>
                      <li>
                        <a title="Landing Page" href="{{route('laporan')}}" aria-expanded="false"><i style="color: #2a6078" class="fas fa-book-open"></i><span style="color: #2a6078" class="mini-click-non"> Laporan Beasiswa </span></a>
                      </li>
                      <li class="active">
                        <a class="has-arrow" aria-expanded="false">
                          <i style="color: #2a6078" class="fas fa-folder-open "></i>
                          <span style="color: #2a6078" class="mini-click-non"> 9 Portofolio</span>
                        </a>
                        <ul class="submenu-angle" aria-expanded="true">
                            <li><a title="Akademik" href="{{ route('nilai')}}"><span class="mini-sub-pro">Prestasi Akademik</span></a></li>
                            <li><a title="Karya" href="{{ route('karya')}}"><span class="mini-sub-pro">Karya Tulis</span></a></li>
                            <li><a title="Forum" href="{{ route('forum')}}"><span class="mini-sub-pro">Forum Akademis</span></a></li>
                            <li><a title="Prestasi" href="{{ route('prestasi')}}"><span class="mini-sub-pro">Prestasi Kompetisi</span></a></li>
                            <li><a title="Organisasi" href="{{ route('organisasi')}}"><span class="mini-sub-pro">Organisasi</span></a></li>
                            <li><a title="Sosial" href="{{ route('sosial')}}"><span class="mini-sub-pro">Sosial </span></a></li>
                            <li><a title="Mentoring" href="{{ route('mentoring')}}"><span class="mini-sub-pro">Keaktifan Mentoring</span></a></li>
                            <li><a title="Tahfiz/Tahsin" href="{{ route('tahsin')}}"><span class="mini-sub-pro">Tahfiz/Tahsin</span></a></li>
                            <li><a title="Beasiswa" href="{{ route('beasiswa')}}"><span class="mini-sub-pro">Kekhasan Beasiswa</span></a></li>
                        </ul>
                      </li>
                      <li class="active">
                        <a class="has-arrow" aria-expanded="false">
                        <i style="color: #2a6078" class="fas fa-print"></i>
                          <span style="color: #2a6078" class="mini-click-non"> Cetak Laporan</span>
                        </a>
                        <ul class="submenu-angle" aria-expanded="true">
                            <li>
                                <a>
                                    <form class="forms-sample" enctype="multipart/form-data" method="POST" action="{{ route('cetak')}}">
                                        @csrf
                                    <select class="form-control {{ $errors->first('semester_id') ? "is-invalid":""}}" name="semester_id">
                                        <option value="" selected disabled>Pilih Semester</option>
                                        @php
                                            $semester = DB::table('semester')->get();
                                        @endphp
                                        @foreach ($semester as $item)
                                        <option value="{{ $item->id }}">Semester {{ $item->nama }}</option>
                                        @endforeach
                                    </select>
                                    <button class="btn btn-sm btn-primary login-submit-cs" type="submit" style="margin-top: 20px">Cetak</button>
                                    </form>
                                </a>
                            </li>
                        </ul>
                      </li>
                      {{-- <li>
                        <a title="Landing Page" href="#" aria-expanded="false">
                            Cetak Laporan
                            <select class="form-control {{ $errors->first('semester_id') ? "is-invalid":""}}" name="semester_id">
                                <option value="" selected disabled>
                                    <i style="color: #2a6078" class="fas fa-print"></i>
                                     <span style="color: #2a6078" class="mini-click-non">
                                        Pilih Semester
                                    </span>
                                </option>
                                @php
                                    $semester = DB::table('semester')->get();
                                @endphp
                                @foreach ($semester as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </a>
                      </li> --}}
                  </ul>
              </nav>
          </div>
      </nav>
  </div>

  <div class="all-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="logo-pro">
                    <a href="{{route('home')}}"><img class="main-logo" width="165px" src="{{ asset('template')}}/img/logo/logo.png" alt="" /></a>
                </div>
            </div>
        </div>
    </div>
    <div class="header-advance-area">
          <div class="header-top-area">
              <div class="container-fluid">
                  <div class="row">
                      <div style="background-color: #00a7b8" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                          <div class="header-top-wraper">
                              <div class="row">
                                  <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
                                      <div class="menu-switcher-pro">
                                          <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
                                            <i class="educate-icon educate-nav"></i>
                                          </button>
                                      </div>
                                  </div>
                                  <div  class="col-lg-6 col-md-7 col-sm-6 col-xs-12">
                                      
                                  </div>
                                  <div  class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                      <div class="header-right-info">
                                          <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                          
                                              <li class="nav-item">
                                                  <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                                                      <span class="admin-name">{{ Auth::user()->name}}</span> 
                                                      <i class="fa fa-angle-down edu-icon edu-down-arrow"></i>
                                                  </a>
                                                  <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn">
                                                    <li><a href="{{ route('profil') }}"><span class="edu-icon edu-home-admin author-log-ic"></span>Profile</a>
                                                    </li> 
                                                    <li>
                                                        <form action="{{ route('logout')}}" method="POST">
                                                          @csrf
                                                          <button class="btn btn-primary" style="margin-left: 50px; margin-top: 20px;" type="submit">
                                                            <span class="edu-icon edu-locked author-log-ic"></span>Log Out
                                                          </button>
                                                        </form>  
                                                      </li>
                                                  </ul>
                                              </li>
                                              <li class="nav-item nav-setting-open"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="educate-icon educate-menu"></i></a>
                                              </li>
                                          </ul>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <!-- Mobile Menu start -->
          <div class="mobile-menu-area">
              <div class="container">
                  <div class="row">
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                          <div class="mobile-menu">
                              <nav id="dropdown">
                                  <ul class="mobile-menu-nav">
                                      <li>
                                        <a data-toggle="collapse" data-target="#Charts" href="{{route('home')}}">
                                            <i style="color: #2a6078" class="fas fa-tachometer-alt "></i>
                                            Dashboard <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                      </li>
                                      <li><a href="{{route('laporan')}}"><i style="color: #2a6078" class="fas fa-book-open"></i> Laporan Perkembangn PM Beasiswa</a></li>
                                      <li><a data-toggle="collapse" data-target="#demoevent">
                                        <i style="color: #2a6078" class="fas fa-folder-open "></i> 9 Portofolio<span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                          <ul id="demoevent" class="collapse dropdown-header-top">
                                            <li><a title="Akademik" href="{{ route('nilai')}}"><span class="mini-sub-pro">Prestasi Akademik</span></a></li>
                                            <li><a title="Karya" href="{{ route('karya')}}"><span class="mini-sub-pro">Karya Tulis</span></a></li>
                                            <li><a title="Forum" href="{{ route('forum')}}"><span class="mini-sub-pro">Forum Akademis</span></a></li>
                                            <li><a title="Prestasi" href="{{ route('prestasi')}}"><span class="mini-sub-pro">Prestasi Kompetisi</span></a></li>
                                            <li><a title="Organisasi" href="{{ route('organisasi')}}"><span class="mini-sub-pro">Organisasi</span></a></li>
                                            <li><a title="Sosial" href="{{ route('sosial')}}"><span class="mini-sub-pro">Sosial </span></a></li>
                                            <li><a title="Mentoring" href="{{ route('mentoring')}}"><span class="mini-sub-pro">Keaktifan Mentoring</span></a></li>
                                            <li><a title="Tahfiz/Tahsin" href="{{ route('tahsin')}}"><span class="mini-sub-pro">Tahfiz/Tahsin</span></a></li>
                                            <li><a title="Beasiswa" href="{{ route('beasiswa')}}"><span class="mini-sub-pro">Kekhasan Beasiswa</span></a></li>
                                          </ul>
                                      </li>
                                      <li>
                                        <a>
                                        <i style="color: #2a6078" class="fas fa-print"></i>
                                          <span style="color: #2a6078" class="mini-click-non"> Cetak Laporan</span>
                                        </a>
                                        <ul class="submenu-angle" aria-expanded="true">
                                            <li>
                                                <a>
                                                    <form class="forms-sample" enctype="multipart/form-data" method="POST" action="{{ route('cetak')}}">
                                                        @csrf
                                                    <select class="form-control {{ $errors->first('semester_id') ? "is-invalid":""}}" name="semester_id">
                                                        <option value="" selected disabled>Pilih Semester</option>
                                                        @php
                                                            $semester = DB::table('semester')->get();
                                                        @endphp
                                                        @foreach ($semester as $item)
                                                        <option value="{{ $item->id }}">Semester {{ $item->nama }}</option>
                                                        @endforeach
                                                    </select>
                                                    <button class="btn btn-sm btn-primary login-submit-cs" type="submit" style="margin-top: 20px">Cetak</button>
                                                    </form>
                                                </a>
                                            </li>
                                        </ul>
                                      </li>
                                  </ul>
                              </nav>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <!-- Mobile Menu end -->
          <div class="breadcome-area" style="margin-top: 20px">
              <div class="container-fluid">
                  <div class="row">
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                          <div class="breadcome-list single-page-breadcome">
                              <div class="row" style="height: 35px">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                  <h3 class="text-center"> Sistem Monitoring dan Evaluasi Peraih Beasiswa Full</h3>
                                </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="static-table-area">
          <div class="container-fluid">
              @yield('konten')
              
          </div>
      </div>
      <div class="static-table" style="margin-top: 20px">
        <div class="container-fluid">

            @yield('konten1')
        </div>
    </div>
      <br>
      {{-- style="margin-top: 423px" --}}
      <div>
        <div style="background-color: #00a7b8; margin-top: 50px;" class="footer-copyright-area">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <div class="footer-copy-right">
                          <p>Copyright © 2021. All rights reserved. By <a href="">STEI SEBI</a></p>
                      </div>
                  </div>
              </div>
          </div>
        </div>
      </div>
      
  </div>  
  {{-- <div class="all-content-wrapper">
      <div class="container-fluid">
          <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="logo-pro">
                      <a href="index.html"><img class="main-logo" src="img/logo/logo.png" alt="" /></a>
                  </div>
              </div>
          </div>
      </div>
      <div class="header-advance-area">
          <div class="header-top-area">
              <div class="container-fluid">
                  <div class="row">
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                          <div class="header-top-wraper">
                              <div class="row">
                                  <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
                                      <div class="menu-switcher-pro">
                                          <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
                                            <i class="educate-icon educate-nav"></i>
                                          </button>
                                      </div>
                                  </div>
                                  <div class="col-lg-6 col-md-7 col-sm-6 col-xs-12">
                                      <div class="header-top-menu tabl-d-n">
                                          <ul class="nav navbar-nav mai-top-nav">
                                              <li class="nav-item"><a href="#" class="nav-link">Home</a>
                                              </li>
                                              <li class="nav-item"><a href="#" class="nav-link">About</a>
                                              </li>
                                              <li class="nav-item"><a href="#" class="nav-link">Services</a>
                                              </li>
                                              <li class="nav-item dropdown res-dis-nn">
                                                  <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">Project <span class="angle-down-topmenu"><i class="fa fa-angle-down"></i></span></a>
                                                  <div role="menu" class="dropdown-menu animated zoomIn">
                                                      <a href="#" class="dropdown-item">Documentation</a>
                                                      <a href="#" class="dropdown-item">Expert Backend</a>
                                                      <a href="#" class="dropdown-item">Expert FrontEnd</a>
                                                      <a href="#" class="dropdown-item">Contact Support</a>
                                                  </div>
                                              </li>
                                              <li class="nav-item"><a href="#" class="nav-link">Support</a>
                                              </li>
                                          </ul>
                                      </div>
                                  </div>
                                  <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                      <div class="header-right-info">
                                          <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                              <li class="nav-item">
                                                  <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                                                    <img src="img/product/pro4.jpg" alt="" />
                                                    <span class="admin-name">Prof.Anderson</span>
                                                    <i class="fa fa-angle-down edu-icon edu-down-arrow"></i>
                                                  </a>
                                                  <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn">
                                                      <li><a href="#"><span class="edu-icon edu-home-admin author-log-ic"></span>My Account</a>
                                                      </li>
                                                      <li><a href="#"><span class="edu-icon edu-user-rounded author-log-ic"></span>My Profile</a>
                                                      </li>
                                                      <li><a href="#"><span class="edu-icon edu-money author-log-ic"></span>User Billing</a>
                                                      </li>
                                                      <li><a href="#"><span class="edu-icon edu-settings author-log-ic"></span>Settings</a>
                                                      </li>
                                                      <li><a href="#"><span class="edu-icon edu-locked author-log-ic"></span>Log Out</a>
                                                      </li>
                                                  </ul>
                                              </li>
                                              <li class="nav-item nav-setting-open"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="educate-icon educate-menu"></i></a>

                                                  <div role="menu" class="admintab-wrap menu-setting-wrap menu-setting-wrap-bg dropdown-menu animated zoomIn">
                                                      <ul class="nav nav-tabs custon-set-tab">
                                                          <li class="active"><a data-toggle="tab" href="#Notes">Notes</a>
                                                          </li>
                                                          <li><a data-toggle="tab" href="#Projects">Projects</a>
                                                          </li>
                                                          <li><a data-toggle="tab" href="#Settings">Settings</a>
                                                          </li>
                                                      </ul>
                                                  </div>
                                              </li>
                                          </ul>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <!-- Mobile Menu start -->
          <div class="mobile-menu-area">
              <div class="container">
                  <div class="row">
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                          <div class="mobile-menu">
                              <nav id="dropdown">
                                  <ul class="mobile-menu-nav">
                                      <li><a data-toggle="collapse" data-target="#Charts" href="#">Home <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                          <ul class="collapse dropdown-header-top">
                                              <li><a href="index.html">Dashboard v.1</a></li>
                                              <li><a href="index-1.html">Dashboard v.2</a></li>
                                              <li><a href="index-3.html">Dashboard v.3</a></li>
                                              <li><a href="analytics.html">Analytics</a></li>
                                              <li><a href="widgets.html">Widgets</a></li>
                                          </ul>
                                      </li>
                                      <li><a href="events.html">Event</a></li>
                                      <li><a data-toggle="collapse" data-target="#demoevent" href="#">Professors <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                          <ul id="demoevent" class="collapse dropdown-header-top">
                                              <li><a href="all-professors.html">All Professors</a>
                                              </li>
                                              <li><a href="add-professor.html">Add Professor</a>
                                              </li>
                                              <li><a href="edit-professor.html">Edit Professor</a>
                                              </li>
                                              <li><a href="professor-profile.html">Professor Profile</a>
                                              </li>
                                          </ul>
                                      </li>
                                      <li><a data-toggle="collapse" data-target="#demopro" href="#">Students <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                          <ul id="demopro" class="collapse dropdown-header-top">
                                              <li><a href="all-students.html">All Students</a>
                                              </li>
                                              <li><a href="add-student.html">Add Student</a>
                                              </li>
                                              <li><a href="edit-student.html">Edit Student</a>
                                              </li>
                                              <li><a href="student-profile.html">Student Profile</a>
                                              </li>
                                          </ul>
                                      </li>
                                      <li><a data-toggle="collapse" data-target="#democrou" href="#">Courses <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                          <ul id="democrou" class="collapse dropdown-header-top">
                                              <li><a href="all-courses.html">All Courses</a>
                                              </li>
                                              <li><a href="add-course.html">Add Course</a>
                                              </li>
                                              <li><a href="edit-course.html">Edit Course</a>
                                              </li>
                                              <li><a href="course-profile.html">Courses Info</a>
                                              </li>
                                              <li><a href="course-payment.html">Courses Payment</a>
                                              </li>
                                          </ul>
                                      </li>
                                      <li><a data-toggle="collapse" data-target="#demolibra" href="#">Library <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                          <ul id="demolibra" class="collapse dropdown-header-top">
                                              <li><a href="library-assets.html">Library Assets</a>
                                              </li>
                                              <li><a href="add-library-assets.html">Add Library Asset</a>
                                              </li>
                                              <li><a href="edit-library-assets.html">Edit Library Asset</a>
                                              </li>
                                          </ul>
                                      </li>
                                      <li><a data-toggle="collapse" data-target="#demodepart" href="#">Departments <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                          <ul id="demodepart" class="collapse dropdown-header-top">
                                              <li><a href="departments.html">Departments List</a>
                                              </li>
                                              <li><a href="add-department.html">Add Departments</a>
                                              </li>
                                              <li><a href="edit-department.html">Edit Departments</a>
                                              </li>
                                          </ul>
                                      </li>
                                      <li><a data-toggle="collapse" data-target="#demo" href="#">Mailbox <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                          <ul id="demo" class="collapse dropdown-header-top">
                                              <li><a href="mailbox.html">Inbox</a>
                                              </li>
                                              <li><a href="mailbox-view.html">View Mail</a>
                                              </li>
                                              <li><a href="mailbox-compose.html">Compose Mail</a>
                                              </li>
                                          </ul>
                                      </li>
                                      <li><a data-toggle="collapse" data-target="#Miscellaneousmob" href="#">Interface <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                          <ul id="Miscellaneousmob" class="collapse dropdown-header-top">
                                              <li><a href="google-map.html">Google Map</a>
                                              </li>
                                              <li><a href="data-maps.html">Data Maps</a>
                                              </li>
                                              <li><a href="pdf-viewer.html">Pdf Viewer</a>
                                              </li>
                                              <li><a href="x-editable.html">X-Editable</a>
                                              </li>
                                              <li><a href="code-editor.html">Code Editor</a>
                                              </li>
                                              <li><a href="tree-view.html">Tree View</a>
                                              </li>
                                              <li><a href="preloader.html">Preloader</a>
                                              </li>
                                              <li><a href="images-cropper.html">Images Cropper</a>
                                              </li>
                                          </ul>
                                      </li>
                                      <li><a data-toggle="collapse" data-target="#Chartsmob" href="#">Charts <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                          <ul id="Chartsmob" class="collapse dropdown-header-top">
                                              <li><a href="bar-charts.html">Bar Charts</a>
                                              </li>
                                              <li><a href="line-charts.html">Line Charts</a>
                                              </li>
                                              <li><a href="area-charts.html">Area Charts</a>
                                              </li>
                                              <li><a href="rounded-chart.html">Rounded Charts</a>
                                              </li>
                                              <li><a href="c3.html">C3 Charts</a>
                                              </li>
                                              <li><a href="sparkline.html">Sparkline Charts</a>
                                              </li>
                                              <li><a href="peity.html">Peity Charts</a>
                                              </li>
                                          </ul>
                                      </li>
                                      <li><a data-toggle="collapse" data-target="#Tablesmob" href="#">Tables <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                          <ul id="Tablesmob" class="collapse dropdown-header-top">
                                              <li><a href="static-table.html">Static Table</a>
                                              </li>
                                              <li><a href="data-table.html">Data Table</a>
                                              </li>
                                          </ul>
                                      </li>
                                      <li><a data-toggle="collapse" data-target="#formsmob" href="#">Forms <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                          <ul id="formsmob" class="collapse dropdown-header-top">
                                              <li><a href="basic-form-element.html">Basic Form Elements</a>
                                              </li>
                                              <li><a href="advance-form-element.html">Advanced Form Elements</a>
                                              </li>
                                              <li><a href="password-meter.html">Password Meter</a>
                                              </li>
                                              <li><a href="multi-upload.html">Multi Upload</a>
                                              </li>
                                              <li><a href="tinymc.html">Text Editor</a>
                                              </li>
                                              <li><a href="dual-list-box.html">Dual List Box</a>
                                              </li>
                                          </ul>
                                      </li>
                                      <li><a data-toggle="collapse" data-target="#Appviewsmob" href="#">App views <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                          <ul id="Appviewsmob" class="collapse dropdown-header-top">
                                              <li><a href="basic-form-element.html">Basic Form Elements</a>
                                              </li>
                                              <li><a href="advance-form-element.html">Advanced Form Elements</a>
                                              </li>
                                              <li><a href="password-meter.html">Password Meter</a>
                                              </li>
                                              <li><a href="multi-upload.html">Multi Upload</a>
                                              </li>
                                              <li><a href="tinymc.html">Text Editor</a>
                                              </li>
                                              <li><a href="dual-list-box.html">Dual List Box</a>
                                              </li>
                                          </ul>
                                      </li>
                                      <li><a data-toggle="collapse" data-target="#Pagemob" href="#">Pages <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                          <ul id="Pagemob" class="collapse dropdown-header-top">
                                              <li><a href="login.html">Login</a>
                                              </li>
                                              <li><a href="register.html">Register</a>
                                              </li>
                                              <li><a href="lock.html">Lock</a>
                                              </li>
                                              <li><a href="password-recovery.html">Password Recovery</a>
                                              </li>
                                              <li><a href="404.html">404 Page</a></li>
                                              <li><a href="500.html">500 Page</a></li>
                                          </ul>
                                      </li>
                                  </ul>
                              </nav>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <!-- Mobile Menu end -->
          <div class="breadcome-area">
              <div class="container-fluid">
                  <div class="row">
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                          <div class="breadcome-list">
                              <div class="row">
                                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                      <div class="breadcome-heading">
                                          <form role="search" class="sr-input-func">
                                              <input type="text" placeholder="Search..." class="search-int form-control">
                                              <a href="#"><i class="fa fa-search"></i></a>
                                          </form>
                                      </div>
                                  </div>
                                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                      <ul class="breadcome-menu">
                                          <li><a href="#">Home</a> <span class="bread-slash">/</span>
                                          </li>
                                          <li><span class="bread-blod">Dashboard V.1</span>
                                          </li>
                                      </ul>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="footer-copyright-area">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-lg-12">
                      <div class="footer-copy-right">
                          <p>Copyright © 2018. All rights reserved. Template by <a href="https://colorlib.com/wp/templates/">Colorlib</a></p>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div> --}}

  
  @endif


    <script>
		@yield('sweet')
		
		@yield('js')
	  </script>
    <script>
      $(document).ready(function() {
        $('#data_users_reguler').DataTable();
      } );
    </script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!-- jquery
		============================================ -->
    {{-- <script src="{{ asset('template') }}/js/vendor/jquery-1.12.4.min.js"></script> --}}
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
    <!-- morrisjs JS
		============================================ -->
    <script src="{{ asset('template') }}/js/sparkline/jquery.sparkline.min.js"></script>
    <script src="{{ asset('template') }}/js/sparkline/jquery.charts-sparkline.js"></script>
    <!-- calendar JS
		============================================ -->
    <script src="{{ asset('template') }}/js/calendar/moment.min.js"></script>
    <script src="{{ asset('template') }}/js/calendar/fullcalendar.min.js"></script>
    <script src="{{ asset('template') }}/js/calendar/fullcalendar-active.js"></script>
    <!-- tab JS
		============================================ -->
    <script src="{{ asset('template') }}/js/tab.js"></script>
    <!-- plugins JS
		============================================ -->
    <script src="{{ asset('template') }}/js/plugins.js"></script>
    <!-- main JS
		============================================ -->
    <script src="{{ asset('template') }}/js/main.js"></script>
    <!-- tawk chat JS
		============================================ -->
    {{-- <script src="/js/tawk-chat.js"></script> --}}
    
</body>

</html>