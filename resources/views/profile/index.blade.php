@extends('template.app')

@section('konten')

<div class="row">
    <div class="single-pro-review-area mt-t-30 mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="profile-info-inner">
                        <div class="single-cards-item">
                            <div class="single-product-image">
                                <a href="#"><img src="{{ asset('template')}}/img/product/profilesebi.jpg" alt=""></a>
                            </div>
                            <a  href="{{ route('profile.edit')}}">
                                <button style="margin-top: 10px" type="button" class="btn btn-danger btn-rounded btn-icon" data-toggle="tooltip" data-placement="bottom" title="Kembali">
                                    Update Profile
                                </button>
                            </a>
                            <div class="single-product-text">
                                {{-- <img src="{{ asset('template')}}/img/product/pro4.jpg" alt="">  --}}
                                <img src="{{ asset('img/'.Auth::user()->foto)}}" alt="foto_profil"/>
                                <h4><a class="cards-hd-dn" href="#">{{ Auth::user()->name}}</a></h4>
                                <h5>{{ Auth::user()->role}}</h5>
                            </div>
                        </div>
                        {{-- <div class="profile-img">
                            <img src="{{asset('img/'.Auth::user()->foto)}}" alt="foto_profil"/>
                        </div> --}}
                        <div class="profile-details-hr">
                            <div class="row">
                                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                    <div class="address-hr">
                                        <p><b>Jenis Beasiswa</b><br /> {{Auth::user()->beasiswa}}</p>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                    <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
                                        <p><b>NIM</b><br /> {{ Auth::user()->nim}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                    <div class="address-hr">
                                        <p><b>Email ID</b><br /> {{ Auth::user()->email}}</p>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                    <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
                                        <p><b>Prodi</b><br /> {{ Auth::user()->prodi}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                    <div class="address-hr">
                                        <p><b>Alamat</b><br /> {{ Auth::user()->alamat}}</p>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                    <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
                                        <p><b>No Handphone</b><br /> {{ Auth::user()->hp}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="address-hr">
                                        <a href=""><i class="fa fa-medal"> Prestasi Akademik</i></a>
                                        <h3><?php echo $nilai; ?></h3>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="address-hr">
                                        <a href=""><i class="fa fa-pencil-alt"> Karya Tulis</i></a>
                                        <h3><?php echo $karya; ?></h3>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="address-hr">
                                        <a href=""><i class="fa fa-comments"> Forum Akademis</i></a>
                                        <h3><?php echo $forum; ?></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="address-hr">
                                        <a href=""><i class="fa fa-trophy"> Prestasi Kompetisi</i></a>
                                        <h3><?php echo $prestasi; ?></h3>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="address-hr">
                                        <a href=""><i class="fa fa-american-sign-language-interpreting"> Organisasi</i></a>
                                        <h3><?php echo $organisasi; ?></h3>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="address-hr">
                                        <a href=""><i class="fa fa-users"> Sosial Kemasyarakatan</i></a>
                                        <h3><?php echo $sosial; ?></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="address-hr">
                                        <a href=""><i class="fa fa-chalkboard-teacher"> Keaktifan Mentoring</i></a>
                                        <h3><?php echo $mentoring; ?></h3>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="address-hr">
                                        <a href=""><i class="fa fa-quran"> Kelulusan Tahfiz/Tahsin</i></a>
                                        <h3><?php echo $tahsin; ?></h3>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="address-hr">
                                        <a href=""><i class="fa fa-award"> Kekhasan Beasiswa</i></a>
                                        <h3><?php echo $beasiswa; ?></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection