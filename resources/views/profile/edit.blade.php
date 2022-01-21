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
                                                  <a class="nav-link active" id="data-tab" data-toggle="tab" href="{{ route('profile.edit')}}" role="tab" aria-controls="home" aria-selected="true"><b> Update Profile</b></a>
                                                </li>
                                                <li class="nav-item">
                                                  <a class="nav-link" href="{{ route('profile.edit_password')}}"><b>Update Password</b> </a>
                                                </li>
                                            </ul>  
                                            <div class="mt-3" style="margin-top: 20px">  
                                                <form class="forms-sample" enctype="multipart/form-data" method="POST" action="{{ route('profile.update') }}">
                                                            @method('patch')
                                                        @csrf
                                                        <div class="row">
                                                            <div class="form-group col-lg-12">
                                                                <label>Nama</label>
                                                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="masukan nama" name="name" value="{{ old('name', $user->name) }}" required autocomplete="name" autofocus>
                                
                                                                @error('name')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group col-lg-6">
                                                                <label>Email</label>
                                                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="masukan email" name="email" value="{{ old('email', $user->email) }}" required autocomplete="email">
                                
                                                                @error('email')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group col-lg-6">
                                                                <label>NIM</label>
                                                                <input id="nim" type="number" class="form-control @error('nim') is-invalid @enderror" placeholder="masukan nim (12344)" name="nim" value="{{ old('nim', $user->nim) }}" required autocomplete="nim">
                                
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
                                                                <select class="form-control @error('angkatan_id') is-invalid @enderror" name="angkatan_id"  id="angkatan_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                                                    <option value="" selected disabled>Pilih Angkatan</option>
                                                                    @foreach($angkatan AS $row)
                                                                    <option value="{{ $row->id }}" {{$row->id == $user['angkatan_id'] ? 'selected' : ''}}>{{ $row->nama }}</option>
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
                                                                <input id="prodi" type="text" class="form-control @error('prodi') is-invalid @enderror" placeholder="Hukum Ekonomi Syariah" name="prodi" value="{{ old('prodi', $user->prodi) }}" required autocomplete="prodi">
                                                                @error('prodi')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group col-lg-6">
                                                                <label>Alamat</label>
                                                                <input id="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror" placeholder="Jl. Raya Bojongsari" name="alamat" value="{{ old('name', $user->alamat) }}" required autocomplete="alamat">
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
                                                            <select class="form-control  @error('provinsi') is-invalid @enderror" name="provinsi" wire:model="provinsi" id="forProvinsi" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                                                    <option value="" selected disabled>Pilih Provinsi</option>
                                                                    @foreach($provinsi AS $row)
                                                                    <option value="{{ $row->id_prov }}"  {{$row->id_prov == $user['provinsi'] ? 'selected' : ''}}>{{ $row->nama }}</option>
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
                                                                <input id="hp" type="number" class="form-control @error('hp') is-invalid @enderror" placeholder="0857xxxxxxxx" name="hp" value="{{ old('name', $user->hp) }}" required autocomplete="hp">
                                
                                                                @error('hp')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group col-lg-6">
                                                                <label>Beasiswa</label>
                                                                <select class="form-control w-full" name="beasiswa" id="forBeasiswa" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                                                <option value="{{ $user->beasiswa }}" {{$user->beasiswa == $user['beasiswa'] ? 'selected' : ''}}>{{ $user->beasiswa }}</option>
                                                                    <option value="ekspad" >SDM EKSPAD</option>
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
                                                            <div class="form-group col-lg-12">
                                                                <label>Upload Profil</label>
                                                                @if ($user['foto'])  
                                                                <img src="{{ asset('img/'.$user['foto'])}}" width="120px" alt="gambar">                       
                                                                @else
                                                                    <span class="text-danger">Tidak Ada Gambar</span>
                                                                @endif
                                                                <input type="file" name="foto" class="form-control">
                                                                <small class="text-danger">Kosongkan Jika Tidak Ingin Mengubah Gambar</small>
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