@extends('template.app')

@section('konten')

@if (Auth::user()->role == 'admin')
<div class="row">
    <div class="analytics-sparkle-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="analytics-sparkle-line reso-mg-b-30 table-mg-t-pro dk-res-t-pro-30">
                        <div class="analytics-content">
                            <h5>Data Mahasiswa</h5>
                            <h2><span class="counter"></span><?php echo $jumlah_mhs; ?><span class="tuition-fees">Jumlah data Mahasiswa</span></h2>
                            <span class="text-info"></span>
                            <div class="progress m-b-0">
                                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:100%;"> <span class="sr-only">20% Complete</span> </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="analytics-sparkle-line table-mg-t-pro dk-res-t-pro-30">
                        <div class="analytics-content">
                            <h5>Portofolio Mahasiswa</h5>
                            <h2><span class="counter"></span><?php echo $jumlah_porto; ?> <span class="tuition-fees">Jumlah Portofolio yang sudah di upload</span></h2>
                            <span class="text-inverse"></span>
                            <div class="progress m-b-0">
                                <div class="progress-bar progress-bar-inverse" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:100%;"> <span class="sr-only">230% Complete</span> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row" style="margin-top: 20px">
    <div class="analytics-sparkle-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                    <div class="analytics-sparkle-line reso-mg-b-30 table-mg-t-pro dk-res-t-pro-30">
                        <div class="analytics-content">
                            <img src="{{ ('img/admin.png') }}" alt="admin" height="450px" width="450px">
                            <h3 class="mt-3" style="margin-top: 50px">Hai Pak {{ Auth::user()->name}}, Selamat Datang di Aplikasi Sistem Monitoring Penerimaan Beasiswa</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="analytics-sparkle-line table-mg-t-pro dk-res-t-pro-30">
                        <div class="analytics-content">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    @if (session('status'))
                                    <div class="alert-icon shadow-inner wrap-alert-b">
                                        <div class="alert alert-success alert-st-one" role="alert">
                                            <i class="fa fa-check edu-checked-pro admin-check-pro" aria-hidden="true"></i>
                                            {{ session('status') }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <h3>Daftar Angkatan Mahasiswa</h3>
                            <!-- Button trigger modal -->
                            {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                Launch demo modal
                            </button> --}}
                            <button style="margin-top: 10px" type="button" class="btn btn-success btn-rounded btn-icon" data-toggle="modal" data-target="#exampleModal">
                                <i class="fa fa-plus "></i> Tambah Angkatan
                            </button>
                            
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Tambah Daftar Angkatan</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="forms-sample" enctype="multipart/form-data" method="POST" action="{{ route('angkatan.store')}}">
                                        @csrf
                                        <div class="form-group-inner">
                                            <div class="row">
                                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                    <label class="login2 pull-right pull-right-pro">Angkatan</label>
                                                </div>
                                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                    <input type="text" value="{{ old('nama')}}"  class="form-control {{ $errors->first('nama') ? "is-invalid":""}}" class="form-control" name="nama" placeholder="2021/2022"/>

                                                    @error('nama')
                                                        <div class="alert alert-danger mt-2">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                             </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Tambahkan</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                                </div>
                            </div>
                            {{-- <a  href="#">
                                <button style="margin-top: 10px" type="button" class="btn btn-success btn-rounded btn-icon" data-toggle="tooltip" data-placement="bottom" title="Tambah Angkatan">
                                    <i class="fa fa-plus "></i> Tambah Angkatan
                                </button>
                            </a> --}}
                
                            <div class="static-table-list" style="overflow-x: auto; margin-top: 10px;">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr class="bg-success">
                                            <th style="text-align: center">No</th>
                                            <th style="text-align: center">Angkatan</th>
                                            <th style="text-align: center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                            $angkatan = DB::table('angkatan')->orderby('nama')->get();
                                        @endphp
                                        @forelse ($angkatan as $item)   
                                        <tr>
                                            <td align="center" style="width: 50px">{{$no++}}</td>
                                            <td align="center">{{$item->nama}}</td>
                                            <td style="width: 150px">
                                                <center>
                                                    <a href="{{route('angkatan.destroy',$item->id)}}">
                                                        <button type="button" class="btn btn-danger btn-rounded btn-icon btn-xs" data-toggle="tooltip" data-placement="bottom" title="Hapus" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Angkatan ini ? Jika anda menghapus ini maka semua mahasiswa yang angkatan ini akan di hapus!!')">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </a>
                                                </center>
                                            </td>
                                        </tr>  
                                        @empty
                                        <tr>
                                            <td class="border px-4 py-2 text-center text-danger" colspan="6"><b>TIDAK ADA DATA</b></td>
                                        </tr>     
                                        @endforelse
                                    </tbody>
                                </table>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@elseif (Auth::user()->role == 'pewancara')
<div class="row">
    <div class="analytics-sparkle-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="analytics-sparkle-line reso-mg-b-30 table-mg-t-pro dk-res-t-pro-30">
                        <div class="analytics-content">
                            <h5>Data Mahasiswa</h5>
                            <h2><span class="counter"></span><?php echo $jumlah_mhs; ?><span class="tuition-fees">Jumlah data Mahasiswa</span></h2>
                            <span class="text-info"></span>
                            <div class="progress m-b-0">
                                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:100%;"> <span class="sr-only">20% Complete</span> </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="analytics-sparkle-line table-mg-t-pro dk-res-t-pro-30">
                        <div class="analytics-content">
                            <h5>Portofolio Mahasiswa</h5>
                            <h2><span class="counter"></span><?php echo $jumlah_porto; ?> <span class="tuition-fees">Jumlah Portofolio yang sudah di upload</span></h2>
                            <span class="text-inverse"></span>
                            <div class="progress m-b-0">
                                <div class="progress-bar progress-bar-inverse" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:100%;"> <span class="sr-only">230% Complete</span> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row" style="margin-top: 20px">
    <div class="analytics-sparkle-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                    <div class="analytics-sparkle-line reso-mg-b-30 table-mg-t-pro dk-res-t-pro-30">
                        <div class="analytics-content">
                            <img src="{{ ('img/admin.png') }}" alt="admin" height="450px" width="450px">
                            <h3 class="mt-3" style="margin-top: 50px">Hai Pak {{ Auth::user()->name}}, Selamat Datang di Aplikasi Sistem Monitoring Penerimaan Beasiswa</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="analytics-sparkle-line table-mg-t-pro dk-res-t-pro-30">
                        <div class="analytics-content">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    @if (session('status'))
                                    <div class="alert-icon shadow-inner wrap-alert-b">
                                        <div class="alert alert-success alert-st-one" role="alert">
                                            <i class="fa fa-check edu-checked-pro admin-check-pro" aria-hidden="true"></i>
                                            {{ session('status') }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <h3>Daftar Angkatan Mahasiswa</h3>
                            <!-- Button trigger modal -->
                            {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                Launch demo modal
                            </button> --}}
                            <button style="margin-top: 10px" type="button" class="btn btn-success btn-rounded btn-icon" data-toggle="modal" data-target="#exampleModal">
                                <i class="fa fa-plus "></i> Tambah Angkatan
                            </button>
                            
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Tambah Daftar Angkatan</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="forms-sample" enctype="multipart/form-data" method="POST" action="{{ route('angkatan.store')}}">
                                        @csrf
                                        <div class="form-group-inner">
                                            <div class="row">
                                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                    <label class="login2 pull-right pull-right-pro">Angkatan</label>
                                                </div>
                                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                    <input type="text" value="{{ old('nama')}}"  class="form-control {{ $errors->first('nama') ? "is-invalid":""}}" class="form-control" name="nama" placeholder="2021/2022"/>

                                                    @error('nama')
                                                        <div class="alert alert-danger mt-2">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                             </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Tambahkan</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                                </div>
                            </div>
                            {{-- <a  href="#">
                                <button style="margin-top: 10px" type="button" class="btn btn-success btn-rounded btn-icon" data-toggle="tooltip" data-placement="bottom" title="Tambah Angkatan">
                                    <i class="fa fa-plus "></i> Tambah Angkatan
                                </button>
                            </a> --}}
                
                            <div class="static-table-list" style="overflow-x: auto; margin-top: 10px;">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr class="bg-success">
                                            <th style="text-align: center">No</th>
                                            <th style="text-align: center">Angkatan</th>
                                            <th style="text-align: center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                            $angkatan = DB::table('angkatan')->orderby('nama')->get();
                                        @endphp
                                        @forelse ($angkatan as $item)   
                                        <tr>
                                            <td align="center" style="width: 50px">{{$no++}}</td>
                                            <td align="center">{{$item->nama}}</td>
                                            <td style="width: 150px">
                                                <center>
                                                    <a href="{{route('angkatan.destroy',$item->id)}}">
                                                        <button type="button" class="btn btn-danger btn-rounded btn-icon btn-xs" data-toggle="tooltip" data-placement="bottom" title="Hapus" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Angkatan ini ? Jika anda menghapus ini maka semua mahasiswa yang angkatan ini akan di hapus!!')">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </a>
                                                </center>
                                            </td>
                                        </tr>  
                                        @empty
                                        <tr>
                                            <td class="border px-4 py-2 text-center text-danger" colspan="6"><b>TIDAK ADA DATA</b></td>
                                        </tr>     
                                        @endforelse
                                    </tbody>
                                </table>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- <div class="row" style="margin-top: 30px">
    <div class="static-table-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                    <div class="sparkline10-list mt-b-30">
                        <div class="sparkline10-hd">
                            <div style="margin-top: 8px" class="main-sparkline10-hd">
                                <img src="{{ ('img/admin.png') }}" alt="admin" height="450px" width="450px">
                                 <h3 class="mt-3" style="margin-top: 50px">Hai Pak {{ Auth::user()->name}}, Selamat Datang di Aplikasi Sistem Monitoring Penerimaan Beasiswa</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <div class="sparkline10-list mt-b-30">
                        <div class="sparkline10-hd">
                            <div style="margin-top: 8px" class="main-sparkline10-hd">
                                <div class="static-table-list" style="overflow-x: auto">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr class="bg-success">
                                                <th style="text-align: center">No</th>
                                                <th style="text-align: center">Angkatan</th>
                                                <th style="text-align: center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $no = 1;
                                                $angkatan = DB::table('angkatan')->get();
                                            @endphp
                                            @forelse ($angkatan as $item)   
                                            <tr>
                                                <td align="center" style="width: 50px">{{$no++}}</td>
                                                <td align="center">{{$item->nama}}</td>
                                                <td style="width: 150px">
                                                    <center>
                                                        <a href="{{route('forum.destroy',$item->id)}}">
                                                            <button type="button" class="btn btn-danger btn-rounded btn-icon btn-xs" data-toggle="tooltip" data-placement="bottom" title="Hapus" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data ini ?')">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </a>
                                                    </center>
                                                </td>
                                            </tr>  
                                            @empty
                                            <tr>
                                                <td class="border px-4 py-2 text-center text-danger" colspan="6"><b>TIDAK ADA DATA</b></td>
                                            </tr>     
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}

@else

<div class="row" style="margin-top: 20px">
    <div class="static-table-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="sparkline10-list mt-b-30">
                        <div class="sparkline10-hd">
                            <h3 style="margin-left: 50px">Hai {{ Auth::user()->name}} Sang Juara Ada Catatan Dari Tim Kemahasiswaan</h3>
                            <div style="margin-top: 8px" class="main-sparkline10-hd">
                                <img src="{{ ('img/dosen.png') }}" alt="dosen" height="450px" width="450px">
                            </div>
                        </div>
                        <div class="sparkline10-graph" style="margin-top: 20px;">
                            <div class="static-table-list">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr class="bg-success">
                                            <th style="text-align: center">No</th>
                                            <th style="text-align: center">Catatan</th>
                                            <th style="text-align: center">Semester</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                         $message = DB::table('messages')->where('users_id',Auth::user()->id)->get();
                                            $no = 1;
                                        @endphp
                                        @forelse ($message as $item)   
                                        <tr>
                                            <td align="center" style="width: 50px">{{$no++}}</td>
                                            <td align="center">{{$item->messages}}</td>
                                            <td align="center">{{$item->semester_id}}</td>
                                        </tr>  
                                        @empty
                                        <tr>
                                            <td class="border px-4 py-2 text-center text-danger" colspan="4"><b>TIDAK ADA CATATAN</b></td>
                                        </tr>    
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

@endsection
