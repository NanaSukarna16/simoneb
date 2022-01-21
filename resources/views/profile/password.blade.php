@extends('template.app')

@section('konten')

<div class="row">
    <div class="basic-form-area mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="sparkline12-list">
                        <div class="sparkline12-hd">
                            <div class="main-sparkline12-hd">
                                <h1>Edit Profil</h1>
                                <a  href="{{ route('profil')}}">
                                    <button style="margin-top: 10px" type="button" class="btn btn-danger btn-rounded btn-icon" data-toggle="tooltip" data-placement="bottom" title="Kembali">
                                        <i class="fa fa-arrow-circle-left "></i> kembali
                                    </button>
                                </a>
                            </div>
                        </div>
                        <div class="sparkline12-graph" style="margin-top: 20px">
                            <div class="basic-login-form-ad">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="all-form-element-inner">
                                            <ul class="nav nav-tabs">
                                                <li class="nav-item">
                                                  <a class="nav-link" href="{{ route('profile.edit')}}"><b> Update Profile</b></a>
                                                </li>
                                                <li class="nav-item">
                                                  <a class="nav-link" href="{{ route('profile.edit_password')}}"><b>Update Password</b> </a>
                                                </li>
                                            </ul>
                                            <div class="mt-3" style="margin-top: 20px">
                                                <form class="forms-sample" enctype="multipart/form-data" method="POST" action="{{ route('profile.update2') }}">
                                                            @method('patch')
                                                        @csrf
                                                        <div class="row">
                                                            <div class="form-group col-lg-6">
                                                                <label>Password</label>
                                                                <input id="password" value="" type="password" class="form-control" name="password" required autocomplete="new-password">
                                                            </div>
                                                            <div class="form-group col-lg-6">
                                                                <label>Confirm Password</label>
                                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                                            </div>                                          
                                                            <div class="form-group">
                                                                <div class="col-md-6 offset-md-4">
                                                                    <button type="submit" class="btn btn-primary">
                                                                        Update Profile
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div> 
                                                </form> 
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
    </div>
</div>

@endsection

@section('js')
   
@endsection