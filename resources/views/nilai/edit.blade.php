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
                                <h1>Edit Nilai</h1>
                                <a  href="{{ route('nilai')}}">
                                    <button style="margin-top: 10px" type="button" class="btn btn-danger btn-rounded btn-icon" data-toggle="tooltip" data-placement="bottom" title="Kembali">
                                        <i class="fa fa-arrow-circle-left "></i> kembali
                                    </button>
                                </a>
                            </div>
                        </div>
                        <div class="sparkline12-graph">
                            <div class="basic-login-form-ad">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="all-form-element-inner">
                                            <form class="forms-sample" enctype="multipart/form-data" method="POST" action="{{ route('nilai.update',$nilai['id'])}}">
                                                @csrf
                                                <div class="form-group-inner">
                                                    {{-- <div class="row">
                                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                            <label class="login2 pull-right pull-right-pro">Nama</label>
                                                        </div>
                                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                            <div class="form-select-list">
                                                                <select class="form-control  {{ $errors->first('user') ? "is-invalid":""}}" name="user" >
                                                                    <option value="" selected disabled>Pilih Mahasiswa</option>
                                                                    @foreach ($user as $item)
                                                                    <option value="{{ $item->id }}" {{$item->id == $nilai['users_id'] ? 'selected' : ''}}>{{ $item->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('user')
                                                                <div class="alert alert-danger mt-2">
                                                                    {{ $message }}
                                                                </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div> --}}
                                                    <input  name="user" type="hidden" value="{{ Auth::user()->id }}">
                                                </div>
                                                <div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                            <label class="login2 pull-right pull-right-pro">IPK</label>
                                                        </div>
                                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                            <input type="number" value="{{ $nilai['ipk']}}" step="any" class="form-control {{ $errors->first('ipk') ? "is-invalid":""}}" class="form-control" name="ipk" placeholder="4.00"/>

                                                            @error('ipk')
                                                            <div class="alert alert-danger mt-2">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                            <label class="login2 pull-right pull-right-pro">IPS</label>
                                                        </div>
                                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                            <input type="number" value="{{ $nilai['ips']}}" step="any" class="form-control {{ $errors->first('ips') ? "is-invalid":""}}" class="form-control" name="ips" placeholder="4.00"/>

                                                            @error('ips')
                                                            <div class="alert alert-danger mt-2">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                            <label class="login2 pull-right pull-right-pro">Tahun</label>
                                                        </div>
                                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                            <input type="text" value="{{ $nilai['tahun']}}"  class="form-control {{ $errors->first('tahun') ? "is-invalid":""}}" class="form-control" name="tahun" placeholder="2021/2022"/>

                                                            @error('tahun')
                                                            <div class="alert alert-danger mt-2">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                            <label class="login2 pull-right pull-right-pro">Upload Foto/PDF</label>
                                                        </div>
                                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                            @if ($nilai['foto'])  
                                                            <img src="{{ asset('storage/nilai/'.$nilai['foto'])}}" width="120px" alt="gambar">                       
                                                            @else
                                                                <span class="text-danger">Tidak Ada Gambar</span>
                                                            @endif
                                                            <input type="file" name="foto" class="form-control">
                                                            <small class="text-danger">Kosongkan Jika Tidak Ingin Mengubah Gambar</small>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                            <label class="login2 pull-right pull-right-pro">Semester</label>
                                                        </div>
                                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                            <div class="form-select-list">
                                                                <select class="form-control {{ $errors->first('semester_id') ? "is-invalid":""}}" name="semester_id">
                                                                    <option value="" selected disabled>Pilih Semester</option>
                                                                    @foreach ($semester as $item)
                                                                    <option value="{{ $item->id }}" {{$item->id == $nilai['semester_id'] ? 'selected' : ''}}>{{ $item->nama }}</option>
                                                                    @endforeach
                                                                </select>

                                                                @error('semester_id')
                                                                <div class="alert alert-danger mt-2">
                                                                    {{ $message }}
                                                                </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group-inner">
                                                    <div class="login-btn-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3"></div>
                                                            <div class="col-lg-9">
                                                                <div class="login-horizental cancel-wp pull-left form-bc-ele">
                                                                    <button class="btn btn-sm btn-primary login-submit-cs" type="submit">Update</button>
                                                                </div>
                                                            </div>
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

@endsection

@section('js')
   
@endsection