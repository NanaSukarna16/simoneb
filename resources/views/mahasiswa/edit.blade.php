@extends('template.app')

@section('konten')

<div class="row">
    <div class="static-table-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="sparkline10-list mt-b-30">
                        <div class="sparkline10-hd">
                            <a  href="{{ route('mahasiswa')}}">
                                <button style="margin-top: 10px" type="button" class="btn btn-danger btn-rounded btn-icon" data-toggle="tooltip" data-placement="bottom" title="Kembali">
                                    <i class="fa fa-arrow-circle-left "></i> kembali
                                </button>
                            </a>
                            <div style="margin-top: 8px" class="main-sparkline10-hd">
                                <h1>{{$mahasiswa->name}}</h1>
                            </div>
                            <form class="forms-sample" enctype="multipart/form-data" method="POST" action="{{ route('mahasiswa.update',$mahasiswa['id'])}}">
                                @csrf
                                <div class="form-group-inner">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                            <label class="login2 pull-right pull-right-pro">Ubah Password</label>
                                        </div>
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                            <input type="text"  class="form-control {{ $errors->first('password') ? "is-invalid":""}}" class="form-control" name="password"/>

                                            @error('password')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
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

{{-- edit donatur, keterangan, status --}}
@if (Auth::user()->role == 'admin')
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="sparkline12-list">
            <div class="sparkline12-hd">
                <div class="main-sparkline12-hd">
                    <h1>Edit Donatur & Keterangan</h1>
                </div>
            </div>
            <div class="sparkline12-graph">
                <div class="basic-login-form-ad">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="all-form-element-inner">
                                <form class="forms-sample" enctype="multipart/form-data" method="POST" action="{{ route('mahasiswa.update',$mahasiswa['id'])}}">
                                    @csrf
                                    <div class="form-group-inner">
                                        <div class="row">
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                <label class="login2 pull-right pull-right-pro">Donatur</label>
                                            </div>
                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                <input type="text" value="{{ $mahasiswa['donatur']}}"  class="form-control {{ $errors->first('donatur') ? "is-invalid":""}}" class="form-control" name="donatur"/>

                                                @error('donatur')
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
                                                <label class="login2 pull-right pull-right-pro">Keterangan</label>
                                            </div>
                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                <input type="text" value="{{ $mahasiswa['keterangan']}}"  class="form-control {{ $errors->first('keterangan') ? "is-invalid":""}}" class="form-control" name="keterangan"/>

                                                @error('keterangan')
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
                                                <label class="login2 pull-right pull-right-pro">Status</label>
                                            </div>
                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                <div class="form-select-list">
                                                    <select class="form-control  {{ $errors->first('status') ? "is-invalid":""}}" name="status" >
                                                        <option value="" selected disabled>Pilih Status</option>
                                                        <option value="Aktif">Aktif</option>
                                                        <option value="Tidak Aktif">Tidak Aktif</option>
                                                    </select>
                                                    @error('status')
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

{{-- pesan --}}
<div class="row" style="margin-top: 20px">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="sparkline10-list mt-b-30">
            <div class="sparkline10-hd">
                <div style="margin-top: 8px" class="main-sparkline10-hd">
                    <h1>Data Pesan Tim Kemahasiswaan</h1>
                    <a  href="{{route('pesan.create')}}">
                        <button style="margin-top: 10px" type="button" class="btn btn-success btn-rounded btn-icon" data-toggle="tooltip" data-placement="bottom" title="Tambah Pesan">
                            <i class="fa fa-plus "></i> Tambah Pesan
                        </button>
                    </a>      
                </div>
            </div>
            <div class="sparkline10-graph" style="margin-top: 20px;">
                <div class="static-table-list">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr class="bg-success">
                                <th style="text-align: center">No</th>
                                <th style="text-align: center">Pesan</th>
                                <th style="text-align: center">Semester</th>
                                <th style="text-align: center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @forelse ($message as $item)   
                            <tr>
                                <td align="center" style="width: 50px">{{$no++}}</td>
                                <td align="center">{{$item->messages}}</td>
                                <td align="center">{{$item->semester_id}}</td>
                                <td>
                                    <center>
                                        <a style="text-decoration: none" href="{{route('pesan.edit',$item->id)}}">
                                            <button type="button" class="btn btn-warning btn-rounded btn-icon btn-xs" data-toggle="tooltip" data-placement="bottom" title="Edit">
                                                <i class="fa fa-pencil-square-o"></i>
                                            </button>
                                        </a>
                                        
                                        <a href="{{route('pesan.destroy',$item->id)}}">
                                            <button type="button" class="btn btn-danger btn-rounded btn-icon btn-xs" data-toggle="tooltip" data-placement="bottom" title="Hapus" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data ini ?')">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </a>
                                    </center>
                                </td>
                            </tr>  
                            @empty
                            <tr>
                                <td class="border px-4 py-2 text-center text-danger" colspan="4"><b>TIDAK ADA DATA</b></td>
                            </tr>    
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</div>

{{-- Laporan --}}
<div class="static-table-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline10-list mt-b-30">
                    <div class="sparkline10-hd">
                        <div style="margin-top: 8px" class="main-sparkline10-hd">
                            <h1>Laporan Perkembangan PM Beasiswa</h1>
                        </div>
                    </div>
                    <div class="sparkline10-graph" style="margin-top: 20px;">
                        <div class="static-table-list">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr class="bg-success">
                                        <th style="text-align: center">No</th>
                                        <th style="text-align: center">File PPT/World</th>
                                        <th style="text-align: center">Semester</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @forelse ($laporan as $item)   
                                    <tr>
                                        <td align="center" style="width: 50px">{{$no++}}</td>
                                        <td align="center">
                                            <a href="">{{$item->laporan}}</a>
                                        </td>
                                        <td align="center">{{$item->semester_id}}</td>
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

{{-- nilai  --}}
<div class="static-table-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline10-list mt-b-30">
                    <div class="sparkline10-hd">
                        <div style="margin-top: 8px" class="main-sparkline10-hd">
                            <h1>Prestasi Akademik</h1>
                        </div>
                    </div>
                    <div class="sparkline10-graph" style="margin-top: 20px;">
                        <div class="static-table-list" style="overflow-x: auto">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr class="bg-success">
                                        <th style="text-align: center">No</th>
                                        <th style="text-align: center">IPK</th>
                                        <th style="text-align: center">IPS</th>
                                        <th style="text-align: center">Tahun</th>
                                        <th style="text-align: center">Foto</th>
                                        <th style="text-align: center">Semester</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @forelse ($nilai as $item)   
                                    <tr>
                                        <td align="center" style="width: 50px">{{$no++}}</td>
                                        <td align="center">{{$item->ipk}}</td>
                                        <td align="center" style="width: 150px">{{$item->ips}}</td>
                                        <td align="center">{{$item->tahun}}</td>
                                        <td align="center">
                                            @if(str_contains($item->foto, 'pdf'))
                                            <a href="http://localhost:8000/storage/nilai/{{ $item->foto }}" target = "_ blank">
                                                {{$item->foto}}
                                            </a>
                                            @else
                                            <a href="#" class="pop">
                                                <img src="{{asset('storage/nilai/'.$item->foto)}}" alt="image" width="70px"/>
                                            </a> 
                                            @endif
                                        </td> 
                                        <td align="center">{{$item->semester_id}}</td>
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

{{-- Karya  --}}
<div class="static-table-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline10-list mt-b-30">
                    <div class="sparkline10-hd">
                        <div style="margin-top: 8px" class="main-sparkline10-hd">
                            <h1>Publikasi Karya Tulis</h1>
                        </div>
                    </div>
                    <div class="sparkline10-graph" style="margin-top: 20px;">
                        <div class="static-table-list">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr class="bg-success">
                                        <th style="text-align: center">No</th>
                                        <th style="text-align: center">Judul</th>
                                        <th style="text-align: center">Tanggal</th>
                                        <th style="text-align: center">Nama Media</th>
                                        <th style="text-align: center">Link</th>
                                        <th style="text-align: center">Semester</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @forelse ($karya as $item)   
                                    <tr>
                                        <td align="center" style="width: 50px">{{$no++}}</td>
                                        <td align="center">{{$item->judul}}</td>
                                        <td align="center">{{$item->tgl}}</td>
                                        <td align="center">{{$item->media}}</td> 
                                        <td align="center">
                                            <a href="{{ $item->link }}" target=_blank>{{$item->link}}</a>
                                        </td>
                                        <td align="center">{{$item->semester_id}}</td>
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

{{-- Forum --}}
<div class="static-table-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline10-list mt-b-30">
                    <div class="sparkline10-hd">
                        <div style="margin-top: 8px" class="main-sparkline10-hd">
                            <h1>Kepesertaan Forum Akademis</h1>
                        </div>
                    </div>
                    <div class="sparkline10-graph" style="margin-top: 20px;">
                        <div class="static-table-list">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr class="bg-success">
                                        <th style="text-align: center">No</th>
                                        <th style="text-align: center">Nama</th>
                                        <th style="text-align: center">Tanggal</th>
                                        <th style="text-align: center">Foto</th>
                                        <th style="text-align: center">Penyelenggara</th>
                                        <th style="text-align: center">Semester</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @forelse ($forum as $item)   
                                    <tr>
                                        <td align="center" style="width: 50px">{{$no++}}</td>
                                        <td align="center">{{$item->nama}}</td>
                                        <td align="center">{{$item->tgl}}</td>
                                        <td align="center">
                                            @if(str_contains($item->foto, 'pdf'))
                                            <a href="http://localhost:8000/storage/forum/{{ $item->foto }}" target = "_ blank">
                                                {{$item->foto}}
                                            </a>
                                            @else
                                            <a href="#" class="pop">
                                                <img src="{{asset('storage/forum/'.$item->foto)}}" alt="image" width="70px"/>
                                            </a> 
                                            @endif
                                        </td> 
                                        <td align="center">{{$item->penyelenggara}}</td>
                                        <td align="center">{{$item->semester_id}}</td>
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

{{-- Prestasi Kompetisi --}}
<div class="static-table-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline10-list mt-b-30">
                    <div class="sparkline10-hd">
                        <div style="margin-top: 8px" class="main-sparkline10-hd">
                            <h1>Prestasi Kompetisi</h1>
                        </div>
                    </div>
                    <div class="sparkline10-graph" style="margin-top: 20px;">
                        <div class="static-table-list">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr class="bg-success">
                                        <th style="text-align: center">No</th>
                                        <th style="text-align: center">Nama</th>
                                        <th style="text-align: center">Peringkat</th>
                                        <th style="text-align: center">Level</th>
                                        <th style="text-align: center">Penyelenggara Kompetisi</th>
                                        <th style="text-align: center">Foto</th>
                                        <th style="text-align: center">Semester</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @forelse ($prestasi as $item)   
                                    <tr>
                                        <td align="center" style="width: 50px">{{$no++}}</td>
                                        <td align="center">{{$item->nama}}</td>
                                        <td align="center">{{$item->peringkat}}</td>
                                        <td align="center">{{$item->level}}</td> 
                                        <td align="center">{{$item->penyelenggara_prestasi}}</td>
                                        <td align="center">
                                            @if(str_contains($item->foto, 'pdf'))
                                            <a href="http://localhost:8000/storage/prestasi/{{ $item->foto }}" target = "_ blank">
                                                {{$item->foto}}
                                            </a>
                                            @else
                                            <a href="#" class="pop">
                                                <img src="{{asset('storage/prestasi/'.$item->foto)}}" alt="image" width="70px"/>
                                            </a> 
                                            @endif
                                        </td> 
                                        <td align="center">{{$item->semester_id}}</td>
                                    </tr> 
                                    @empty
                                    <tr>
                                        <td class="border px-4 py-2 text-center text-danger" colspan="7"><b>TIDAK ADA DATA</b></td>
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

{{-- Organisasi --}}
<div class="static-table-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline10-list mt-b-30">
                    <div class="sparkline10-hd">
                        <div style="margin-top: 8px" class="main-sparkline10-hd">
                            <h1>Organisasi Mahasiswa/Kepanitiaan</h1>
                        </div>
                    </div>
                    <div class="sparkline10-graph" style="margin-top: 20px;">
                        <div class="static-table-list">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr class="bg-success">
                                        <th style="text-align: center">No</th>
                                        <th style="text-align: center">Nama</th>
                                        <th style="text-align: center">Jabatan</th>
                                        <th style="text-align: center">Masa Jabatan</th>
                                        <th style="text-align: center">Foto</th>
                                        <th style="text-align: center">Semester</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @forelse ($org_mhs as $item)   
                                    <tr>
                                        <td align="center" style="width: 50px">{{$no++}}</td>
                                        <td align="center">{{$item->nama}}</td>
                                        <td align="center">{{$item->jabatan}}</td>
                                        <td align="center">{{$item->masa_jabatan}}</td> 
                                        <td align="center">
                                            @if(str_contains($item->foto, 'pdf'))
                                            <a href="http://localhost:8000/storage/organisasi/{{ $item->foto }}" target = "_ blank">
                                                {{$item->foto}}
                                            </a>
                                            @else
                                            <a href="#" class="pop">
                                                <img src="{{asset('storage/organisasi/'.$item->foto)}}" alt="image" width="70px"/>
                                            </a> 
                                            @endif
                                        </td> 
                                        <td align="center">{{$item->semester_id}}</td>
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

{{-- Sosial --}}
<div class="static-table-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline10-list mt-b-30">
                    <div class="sparkline10-hd">
                        <div style="margin-top: 8px" class="main-sparkline10-hd">
                            <h1>Sosial Kemasyarakatan</h1>
                        </div>
                    </div>
                    <div class="sparkline10-graph" style="margin-top: 20px;">
                        <div class="static-table-list">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr class="bg-success">
                                        <th style="text-align: center">No</th>
                                        <th style="text-align: center">Nama</th>
                                        <th style="text-align: center">Tanggal</th>
                                        <th style="text-align: center">Penyelenggara Sosial</th>
                                        <th style="text-align: center">Foto</th>
                                        <th style="text-align: center">Semester</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @forelse ($sosial as $item)   
                                    <tr>
                                        <td align="center" style="width: 50px">{{$no++}}</td>
                                        <td align="center">{{$item->nama}}</td>
                                        <td align="center">{{$item->tgl}}</td> 
                                        <td align="center">{{$item->penyelenggara_sosial}}</td>
                                        <td align="center">
                                            @if(str_contains($item->foto, 'pdf'))
                                            <a href="http://localhost:8000/storage/sosial/{{ $item->foto }}" target = "_ blank">
                                                {{$item->foto}}
                                            </a>
                                            @else
                                            <a href="#" class="pop">
                                                <img src="{{asset('storage/sosial/'.$item->foto)}}" alt="image" width="70px"/>
                                            </a> 
                                            @endif
                                        </td> 
                                        <td align="center">{{$item->semester_id}}</td>
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

{{-- Mentoring --}}
<div class="static-table-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline10-list mt-b-30">
                    <div class="sparkline10-hd">
                        <div style="margin-top: 8px" class="main-sparkline10-hd">
                            <h1>Keaktifan Mentoring</h1>
                        </div>
                    </div>
                    <div class="sparkline10-graph" style="margin-top: 20px;">
                        <div class="static-table-list">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr class="bg-success">
                                        <th style="text-align: center">No</th>
                                        <th style="text-align: center">Nama</th>
                                        <th style="text-align: center">Jumlah Pertemuan</th>
                                        <th style="text-align: center">Jumlah Kehadiran</th>
                                        <th style="text-align: center">Persen</th>
                                        <th style="text-align: center">Foto</th>
                                        <th style="text-align: center">Semester</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @forelse ($mentoring as $item)   
                                    <tr>
                                        <td align="center" style="width: 50px">{{$no++}}</td>
                                        <td align="center">{{$item->nama}}</td>
                                        <td align="center">{{$item->jml_pertemuan}}</td>
                                        <td align="center">{{$item->jml_kehadiran}}</td> 
                                        <td align="center">{{$item->persen}}</td>
                                        <td align="center">
                                            @if(str_contains($item->foto, 'pdf'))
                                            <a href="http://localhost:8000/storage/mentoring/{{ $item->foto }}" target = "_ blank">
                                                {{$item->foto}}
                                            </a>
                                            @else
                                            <a href="#" class="pop">
                                                <img src="{{asset('storage/mentoring/'.$item->foto)}}" alt="image" width="70px"/>
                                            </a> 
                                            @endif
                                        </td> 
                                        <td align="center">{{$item->semester_id}}</td>
                                    </tr>   
                                    @empty
                                    <tr>
                                        <td class="border px-4 py-2 text-center text-danger" colspan="7"><b>TIDAK ADA DATA</b></td>
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

{{-- Tahsin --}}
<div class="static-table-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline10-list mt-b-30">
                    <div class="sparkline10-hd">
                        <div style="margin-top: 8px" class="main-sparkline10-hd">
                            <h1>Kelulusan Tahsin/Tahfiz</h1>
                        </div>
                    </div>
                    <div class="sparkline10-graph" style="margin-top: 20px;">
                        <div class="static-table-list">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr class="bg-success">
                                        <th style="text-align: center">No</th>
                                        <th style="text-align: center">Level</th>
                                        <th style="text-align: center">No SK</th>
                                        <th style="text-align: center">Nilai</th>
                                        <th style="text-align: center">Foto</th>
                                        <th style="text-align: center">Semester</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @forelse ($tahsin as $item)   
                                    <tr>
                                        <td align="center" style="width: 50px">{{$no++}}</td>
                                        <td align="center">{{$item->level}}</td>
                                        <td align="center">{{$item->no_sk}}</td> 
                                        <td align="center">{{$item->nilai}}</td>
                                        <td align="center">
                                            @if(str_contains($item->foto, 'pdf'))
                                            <a href="http://localhost:8000/storage/tahsin/{{ $item->foto }}" target = "_ blank">
                                                {{$item->foto}}
                                            </a>
                                            @else
                                            <a href="#" class="pop">
                                                <img src="{{asset('storage/tahsin/'.$item->foto)}}" alt="image" width="70px"/>
                                            </a> 
                                            @endif
                                        </td> 
                                        <td align="center">{{$item->semester_id}}</td>
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

{{-- Kekhasan Beasiswa --}}
<div class="static-table-area">
    <div class="container-fluid">
        @if ($mahasiswa->beasiswa == 'hes')
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline10-list mt-b-30">
                    <div class="sparkline10-hd">
                        <div style="margin-top: 8px" class="main-sparkline10-hd">
                            <h1>Kekhasan Beasiswa</h1>
                        </div>
                    </div>
                    <div class="sparkline10-graph" style="margin-top: 20px;">
                        <div class="static-table-list" style="overflow-x: auto">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr class="bg-success">
                                        <th style="text-align: center">No</th>
                                        <th style="text-align: center">No Sertifikat</th>
                                        <th style="text-align: center">Judul Materi</th>
                                        <th style="text-align: center">Agenda</th>
                                        <th style="text-align: center">Foto</th>
                                        <th style="text-align: center">Semester</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @forelse ($beasiswa as $item)   
                                    <tr>
                                        <td align="center">{{$no++}}</td>
                                        <td align="center">{{$item->no_sertifikat}}</td>
                                        <td align="center">{{$item->nama}}</td>
                                        <td align="center">{{$item->agenda}}</td>
                                        <td align="center">
                                            @if(str_contains($item->foto, 'pdf'))
                                            <a href="http://localhost:8000/storage/beasiswa/{{ $item->foto }}" target = "_ blank">
                                                {{$item->foto}}
                                            </a>
                                            @else
                                            <a href="#" class="pop">
                                                <img src="{{asset('storage/beasiswa/'.$item->foto)}}" alt="image" width="70px"/>
                                            </a> 
                                            @endif
                                        </td>
                                        <td align="center">{{$item->semester_id}}</td>
                                    </tr>  
                                    @empty
                                    <tr>
                                        <td class="border px-4 py-2 text-center text-danger" colspan="4"><b>TIDAK ADA DATA</b></td>
                                    </tr>    
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            
        @elseif ($mahasiswa->beasiswa == 'hafidz')
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline10-list mt-b-30">
                    <div class="sparkline10-hd">
                        <div style="margin-top: 8px" class="main-sparkline10-hd">
                            <h1>Kekhasan Beasiswa</h1>
                        </div>
                    </div>
                    <div class="sparkline10-graph" style="margin-top: 20px;">
                        <div class="static-table-list" style="overflow-x: auto">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr class="bg-success">
                                        <th style="text-align: center">No</th>
                                        <th style="text-align: center">Nama LTQ</th>
                                        <th style="text-align: center">Jenis Kegiatan</th>
                                        <th style="text-align: center">Foto</th>
                                        <th style="text-align: center">Semester</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @forelse ($beasiswa as $item)   
                                    <tr>
                                        <td align="center">{{$no++}}</td>
                                        <td align="center">{{$item->penyelenggara}}</td>
                                        <td align="center" style="width: 350px">{{$item->nama}}</td>
                                        <td align="center">
                                            @if(str_contains($item->foto, 'pdf'))
                                            <a href="http://localhost:8000/storage/beasiswa/{{ $item->foto }}" target = "_ blank">
                                                {{$item->foto}}
                                            </a>
                                            @else
                                            <a href="#" class="pop">
                                                <img src="{{asset('storage/beasiswa/'.$item->foto)}}" alt="image" width="70px"/>
                                            </a> 
                                            @endif
                                        </td>
                                        <td align="center">{{$item->semester_id}}</td>
                                    </tr>  
                                    @empty
                                    <tr>
                                        <td class="border px-4 py-2 text-center text-danger" colspan="4"><b>TIDAK ADA DATA</b></td>
                                    </tr>    
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
        
        @else
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline10-list mt-b-30">
                    <div class="sparkline10-hd">
                        <div style="margin-top: 8px" class="main-sparkline10-hd">
                            <h1>Kekhasan Beasiswa</h1>
                        </div>
                    </div>
                    <div class="sparkline10-graph" style="margin-top: 20px;">
                        <div class="static-table-list" style="overflow-x: auto">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr class="bg-success">
                                        <th style="text-align: center">No</th>
                                        <th style="text-align: center">Nama Usaha</th>
                                        <th style="text-align: center">Deskripsi Usaha</th>
                                        <th style="text-align: center">Foto</th>
                                        <th style="text-align: center">Semester</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @forelse ($beasiswa as $item)   
                                    <tr>
                                        <td align="center">{{$no++}}</td>
                                        <td align="center">{{$item->nama}}</td>
                                        <td align="center" style="width: 350px">{{$item->deskripsi}}</td>
                                        <td align="center">
                                            @if(str_contains($item->foto, 'pdf'))
                                            <a href="http://localhost:8000/storage/beasiswa/{{ $item->foto }}" target = "_ blank">
                                                {{$item->foto}}
                                            </a>
                                            @else
                                            <a href="#" class="pop">
                                                <img src="{{asset('storage/beasiswa/'.$item->foto)}}" alt="image" width="70px"/>
                                            </a> 
                                            @endif
                                        </td>
                                        <td align="center">{{$item->semester_id}}</td>
                                    </tr>  
                                    @empty
                                    <tr>
                                        <td class="border px-4 py-2 text-center text-danger" colspan="4"><b>TIDAK ADA DATA</b></td>
                                    </tr>    
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> 
            </div> 
        </div> 
        {{-- <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline10-list mt-b-30">
                    <div class="sparkline10-hd">
                        <div style="margin-top: 8px" class="main-sparkline10-hd">
                            <h1>Kekhasan Beasiswa</h1>
                        </div>
                    </div>
                    <div class="sparkline10-graph" style="margin-top: 20px;">
                        <div class="static-table-list">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr class="bg-success">
                                        <th style="text-align: center">No</th>
                                        <th style="text-align: center">Nama</th>
                                        <th style="text-align: center">Deskripsi</th>
                                        <th style="text-align: center">Foto</th>
                                        <th style="text-align: center">Semester</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @forelse ($beasiswa as $item)   
                                    <tr>
                                        <td align="center" style="width: 50px">{{$no++}}</td>
                                        <td align="center">{{$item->nama}}</td>
                                        <td align="center" style="width: 350px">{{$item->deskripsi}}</td>
                                        <td align="center">
                                            <a href="#" class="pop">
                                                <img src="{{asset('img/'.$item->foto)}}" alt="image" width="70px"/>
                                            </a>
                                        </td> 
                                        <td align="center">{{$item->semester_id}}</td>
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
        </div> --}}
        @endif
    </div>
</div>

@elseif(Auth::user()->role == 'mbs')

{{-- profil usaha --}}
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="sparkline10-list mt-b-30">
            <div class="sparkline10-hd">
                <div style="margin-top: 8px" class="main-sparkline10-hd">
                    <h1>Profil Usaha</h1>
                    <a  href="{{route('profil-usaha.create')}}">
                        <button style="margin-top: 10px" type="button" class="btn btn-success btn-rounded btn-icon" data-toggle="tooltip" data-placement="bottom" title="Tambah Karya">
                            <i class="fa fa-plus "></i> Tambah Profil Usaha
                        </button>
                    </a>
                </div>
            </div>
            <div class="sparkline10-graph" style="margin-top: 20px;">
                <div class="static-table-list" style="overflow-x: auto">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr class="bg-success">
                                <th style="text-align: center">No</th>
                                <th style="text-align: center">Nama Usaha</th>
                                <th style="text-align: center">Bidang Usaha</th>
                                <th style="text-align: center">Status Usaha</th>
                                <th style="text-align: center">Lama Usaha</th>
                                <th style="text-align: center">Omset/Bulan</th>
                                <th style="text-align: center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @forelse ($usaha as $item)   
                            <tr>
                                <td align="center">{{$no++}}</td>
                                <td align="center">{{$item->nama}}</td>
                                <td align="center">{{$item->bidang}}</td>
                                <td align="center">{{$item->status}}</td>
                                <td align="center">{{$item->lama}}</td>
                                <td align="center">Rp. {{number_format($item->omset ?? 0, 2)}}</td>
                                <td style="width: 150px">
                                    <center>
                                        <a style="text-decoration: none" href="{{route('profil-usaha.edit',$item->id)}}">
                                            <button type="button" class="btn btn-warning btn-rounded btn-icon btn-xs" data-toggle="tooltip" data-placement="bottom" title="Edit">
                                                <i class="fa fa-pencil-square-o"></i>
                                            </button>
                                        </a>
                                        
                                        <a href="{{route('profil-usaha.destroy',$item->id)}}">
                                            <button type="button" class="btn btn-danger btn-rounded btn-icon btn-xs" data-toggle="tooltip" data-placement="bottom" title="Hapus" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data ini ?')">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </a>
                                    </center>
                                </td>
                            </tr>  
                            @empty
                            <tr>
                                <td class="border px-4 py-2 text-center text-danger" colspan="4"><b>TIDAK ADA DATA</b></td>
                            </tr>    
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            {{-- awal pop up gambar --}}
            <div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">							   
                  <div class="modal-content">         						      
                   <div class="modal-body">
                                                         
                     <button type="button" class="close" data-dismiss="modal"><span 
                     aria-hidden="true">&times;</span><span class="sr- 
                     only">Close</span></button>						        
                    <img src="" class="imagepreview" style="width: 100%;">
                                                    
                   </div>							    
                 </div>								   
                </div>
            </div>
            {{-- awal pop up gambar --}}
        </div>
    </div>
</div>

{{-- keuangan usaha --}}
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="sparkline10-list mt-b-30">
            <div class="sparkline10-hd">
                <div style="margin-top: 8px" class="main-sparkline10-hd">
                    <h1>Keuangan Usaha</h1>
                    <a  href="{{route('keuangan.create')}}">
                        <button style="margin-top: 10px" type="button" class="btn btn-success btn-rounded btn-icon" data-toggle="tooltip" data-placement="bottom" title="Tambah Karya">
                            <i class="fa fa-plus "></i> Tambah Keuangan Usaha
                        </button>
                    </a>
                </div>
            </div>
            <div class="sparkline10-graph" style="margin-top: 20px;">
                <div class="static-table-list" style="overflow-x: auto">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr class="bg-success">
                                <th style="text-align: center">No</th>
                                <th style="text-align: center">File</th>
                                <th style="text-align: center">Tanggal</th>
                                <th style="text-align: center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @forelse ($keuangan as $item)   
                            <tr>
                                <td align="center">{{$no++}}</td>
                                 <td align="center">
                                    <a href="http://localhost:8000/storage/keuangan/{{ $item->file }}">{{ $item->file }}</a>
                                </td>
                                <td align="center">{{ \Carbon\Carbon::parse($item->created_at)->translatedFormat(' d F Y') }}</td>
                                <td style="width: 150px">
                                    <center>
                                        <a style="text-decoration: none" href="{{route('keuangan.edit',$item->id)}}">
                                            <button type="button" class="btn btn-warning btn-rounded btn-icon btn-xs" data-toggle="tooltip" data-placement="bottom" title="Edit">
                                                <i class="fa fa-pencil-square-o"></i>
                                            </button>
                                        </a>                                      
                                        <a href="{{route('keuangan.destroy',$item->id)}}">
                                            <button type="button" class="btn btn-danger btn-rounded btn-icon btn-xs" data-toggle="tooltip" data-placement="bottom" title="Hapus" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data ini ?')">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </a>
                                    </center>
                                </td>
                            </tr>  
                            @empty
                            <tr>
                                <td class="border px-4 py-2 text-center text-danger" colspan="4"><b>TIDAK ADA DATA</b></td>
                            </tr>    
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            {{-- awal pop up gambar --}}
            <div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">							   
                  <div class="modal-content">         						      
                   <div class="modal-body">
                                                         
                     <button type="button" class="close" data-dismiss="modal"><span 
                     aria-hidden="true">&times;</span><span class="sr- 
                     only">Close</span></button>						        
                    <img src="" class="imagepreview" style="width: 100%;">
                                                    
                   </div>							    
                 </div>								   
                </div>
            </div>
            {{-- awal pop up gambar --}}
        </div>
    </div>
</div>

{{-- ppt --}}
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="sparkline10-list mt-b-30">
            <div class="sparkline10-hd">
                <div style="margin-top: 8px" class="main-sparkline10-hd">
                    <h1>PPT</h1>
                    <a  href="{{route('ppt.create')}}">
                        <button style="margin-top: 10px" type="button" class="btn btn-success btn-rounded btn-icon" data-toggle="tooltip" data-placement="bottom" title="Tambah Karya">
                            <i class="fa fa-plus "></i> Tambah PPT
                        </button>
                    </a>
                </div>
            </div>
            <div class="sparkline10-graph" style="margin-top: 20px;">
                <div class="static-table-list" style="overflow-x: auto">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr class="bg-success">
                                <th style="text-align: center">No</th>
                                <th style="text-align: center">File</th>
                                <th style="text-align: center">Tanggal</th>
                                <th style="text-align: center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @forelse ($ppt as $item)   
                            <tr>
                                <td align="center">{{$no++}}</td>
                                 <td align="center">
                                    <a href="http://localhost:8000/storage/ppt/{{ $item->file }}">{{ $item->file }}</a>
                                </td>
                                <td align="center">{{ \Carbon\Carbon::parse($item->created_at)->translatedFormat(' d F Y') }}</td>
                                <td style="width: 150px">
                                    <center>
                                        <a style="text-decoration: none" href="{{route('ppt.edit',$item->id)}}">
                                            <button type="button" class="btn btn-warning btn-rounded btn-icon btn-xs" data-toggle="tooltip" data-placement="bottom" title="Edit">
                                                <i class="fa fa-pencil-square-o"></i>
                                            </button>
                                        </a>                                      
                                        <a href="{{route('ppt.destroy',$item->id)}}">
                                            <button type="button" class="btn btn-danger btn-rounded btn-icon btn-xs" data-toggle="tooltip" data-placement="bottom" title="Hapus" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data ini ?')">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </a>
                                    </center>
                                </td>
                            </tr>  
                            @empty
                            <tr>
                                <td class="border px-4 py-2 text-center text-danger" colspan="4"><b>TIDAK ADA DATA</b></td>
                            </tr>    
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            {{-- awal pop up gambar --}}
            <div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">							   
                  <div class="modal-content">         						      
                   <div class="modal-body">
                                                         
                     <button type="button" class="close" data-dismiss="modal"><span 
                     aria-hidden="true">&times;</span><span class="sr- 
                     only">Close</span></button>						        
                    <img src="" class="imagepreview" style="width: 100%;">
                                                    
                   </div>							    
                 </div>								   
                </div>
            </div>
            {{-- awal pop up gambar --}}
        </div>
    </div>
</div>

{{-- sku --}}
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="sparkline10-list mt-b-30">
            <div class="sparkline10-hd">
                <div style="margin-top: 8px" class="main-sparkline10-hd">
                    <h1>SKU</h1>
                    <a  href="{{route('sku.create')}}">
                        <button style="margin-top: 10px" type="button" class="btn btn-success btn-rounded btn-icon" data-toggle="tooltip" data-placement="bottom" title="Tambah Karya">
                            <i class="fa fa-plus "></i> Tambah SKU
                        </button>
                    </a>
                </div>
            </div>
            <div class="sparkline10-graph" style="margin-top: 20px;">
                <div class="static-table-list" style="overflow-x: auto">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr class="bg-success">
                                <th style="text-align: center">No</th>
                                <th style="text-align: center">File</th>
                                <th style="text-align: center">Tanggal</th>
                                <th style="text-align: center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @forelse ($sku as $item)   
                            <tr>
                                <td align="center">{{$no++}}</td>
                                 <td align="center">
                                    <a href="http://localhost:8000/storage/ppt/{{ $item->file }}">{{ $item->file }}</a>
                                </td>
                                <td align="center">{{ \Carbon\Carbon::parse($item->created_at)->translatedFormat(' d F Y') }}</td>
                                <td style="width: 150px">
                                    <center>
                                        <a style="text-decoration: none" href="{{route('sku.edit',$item->id)}}">
                                            <button type="button" class="btn btn-warning btn-rounded btn-icon btn-xs" data-toggle="tooltip" data-placement="bottom" title="Edit">
                                                <i class="fa fa-pencil-square-o"></i>
                                            </button>
                                        </a>                                      
                                        <a href="{{route('sku.destroy',$item->id)}}">
                                            <button type="button" class="btn btn-danger btn-rounded btn-icon btn-xs" data-toggle="tooltip" data-placement="bottom" title="Hapus" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data ini ?')">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </a>
                                    </center>
                                </td>
                            </tr>  
                            @empty
                            <tr>
                                <td class="border px-4 py-2 text-center text-danger" colspan="4"><b>TIDAK ADA DATA</b></td>
                            </tr>    
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            {{-- awal pop up gambar --}}
            <div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">							   
                  <div class="modal-content">         						      
                   <div class="modal-body">
                                                         
                     <button type="button" class="close" data-dismiss="modal"><span 
                     aria-hidden="true">&times;</span><span class="sr- 
                     only">Close</span></button>						        
                    <img src="" class="imagepreview" style="width: 100%;">
                                                    
                   </div>							    
                 </div>								   
                </div>
            </div>
            {{-- awal pop up gambar --}}
        </div>
    </div>
</div>

@else


{{-- pesan --}}
<div class="row" style="margin-top: 20px">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="sparkline10-list mt-b-30">
            <div class="sparkline10-hd">
                <div style="margin-top: 8px" class="main-sparkline10-hd">
                    <h1>Data Pesan Tim Kemahasiswaan</h1>
                    <a  href="{{route('pesan.create')}}">
                        <button style="margin-top: 10px" type="button" class="btn btn-success btn-rounded btn-icon" data-toggle="tooltip" data-placement="bottom" title="Tambah Pesan">
                            <i class="fa fa-plus "></i> Tambah Pesan
                        </button>
                    </a>      
                </div>
            </div>
            <div class="sparkline10-graph" style="margin-top: 20px;">
                <div class="static-table-list">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr class="bg-success">
                                <th style="text-align: center">No</th>
                                <th style="text-align: center">Pesan</th>
                                <th style="text-align: center">Semester</th>
                                <th style="text-align: center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @forelse ($message as $item)   
                            <tr>
                                <td align="center" style="width: 50px">{{$no++}}</td>
                                <td align="center">{{$item->messages}}</td>
                                <td align="center">{{$item->semester_id}}</td>
                                <td>
                                    <center>
                                        <a style="text-decoration: none" href="{{route('pesan.edit',$item->id)}}">
                                            <button type="button" class="btn btn-warning btn-rounded btn-icon btn-xs" data-toggle="tooltip" data-placement="bottom" title="Edit">
                                                <i class="fa fa-pencil-square-o"></i>
                                            </button>
                                        </a>
                                        
                                        <a href="{{route('pesan.destroy',$item->id)}}">
                                            <button type="button" class="btn btn-danger btn-rounded btn-icon btn-xs" data-toggle="tooltip" data-placement="bottom" title="Hapus" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data ini ?')">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </a>
                                    </center>
                                </td>
                            </tr>  
                            @empty
                            <tr>
                                <td class="border px-4 py-2 text-center text-danger" colspan="4"><b>TIDAK ADA DATA</b></td>
                            </tr>    
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</div>

{{-- Laporan --}}
<div class="static-table-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline10-list mt-b-30">
                    <div class="sparkline10-hd">
                        <div style="margin-top: 8px" class="main-sparkline10-hd">
                            <h1>Laporan Perkembangan PM Beasiswa</h1>
                        </div>
                    </div>
                    <div class="sparkline10-graph" style="margin-top: 20px;">
                        <div class="static-table-list">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr class="bg-success">
                                        <th style="text-align: center">No</th>
                                        <th style="text-align: center">File PPT/World</th>
                                        <th style="text-align: center">Semester</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @forelse ($laporan as $item)   
                                    <tr>
                                        <td align="center" style="width: 50px">{{$no++}}</td>
                                        <td align="center">
                                            <a href="">{{$item->laporan}}</a>
                                        </td>
                                        <td align="center">{{$item->semester_id}}</td>
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

{{-- nilai  --}}
<div class="static-table-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline10-list mt-b-30">
                    <div class="sparkline10-hd">
                        <div style="margin-top: 8px" class="main-sparkline10-hd">
                            <h1>Prestasi Akademik</h1>
                        </div>
                    </div>
                    <div class="sparkline10-graph" style="margin-top: 20px;">
                        <div class="static-table-list" style="overflow-x: auto">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr class="bg-success">
                                        <th style="text-align: center">No</th>
                                        <th style="text-align: center">IPK</th>
                                        <th style="text-align: center">IPS</th>
                                        <th style="text-align: center">Tahun</th>
                                        <th style="text-align: center">Foto</th>
                                        <th style="text-align: center">Semester</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @forelse ($nilai as $item)   
                                    <tr>
                                        <td align="center" style="width: 50px">{{$no++}}</td>
                                        <td align="center">{{$item->ipk}}</td>
                                        <td align="center" style="width: 150px">{{$item->ips}}</td>
                                        <td align="center">{{$item->tahun}}</td>
                                        <td align="center">
                                            @if(str_contains($item->foto, 'pdf'))
                                            <a href="http://localhost:8000/storage/nilai/{{ $item->foto }}" target = "_ blank">
                                                {{$item->foto}}
                                            </a>
                                            @else
                                            <a href="#" class="pop">
                                                <img src="{{asset('storage/nilai/'.$item->foto)}}" alt="image" width="70px"/>
                                            </a> 
                                            @endif
                                        </td> 
                                        <td align="center">{{$item->semester_id}}</td>
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

{{-- Karya  --}}
<div class="static-table-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline10-list mt-b-30">
                    <div class="sparkline10-hd">
                        <div style="margin-top: 8px" class="main-sparkline10-hd">
                            <h1>Publikasi Karya Tulis</h1>
                        </div>
                    </div>
                    <div class="sparkline10-graph" style="margin-top: 20px;">
                        <div class="static-table-list">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr class="bg-success">
                                        <th style="text-align: center">No</th>
                                        <th style="text-align: center">Judul</th>
                                        <th style="text-align: center">Tanggal</th>
                                        <th style="text-align: center">Nama Media</th>
                                        <th style="text-align: center">Link</th>
                                        <th style="text-align: center">Semester</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @forelse ($karya as $item)   
                                    <tr>
                                        <td align="center" style="width: 50px">{{$no++}}</td>
                                        <td align="center">{{$item->judul}}</td>
                                        <td align="center">{{$item->tgl}}</td>
                                        <td align="center">{{$item->media}}</td> 
                                        <td align="center">
                                            <a href="{{ $item->link }}" target=_blank>{{$item->link}}</a>
                                        </td>
                                        <td align="center">{{$item->semester_id}}</td>
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

{{-- Forum --}}
<div class="static-table-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline10-list mt-b-30">
                    <div class="sparkline10-hd">
                        <div style="margin-top: 8px" class="main-sparkline10-hd">
                            <h1>Kepesertaan Forum Akademis</h1>
                        </div>
                    </div>
                    <div class="sparkline10-graph" style="margin-top: 20px;">
                        <div class="static-table-list">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr class="bg-success">
                                        <th style="text-align: center">No</th>
                                        <th style="text-align: center">Nama</th>
                                        <th style="text-align: center">Tanggal</th>
                                        <th style="text-align: center">Foto</th>
                                        <th style="text-align: center">Penyelenggara</th>
                                        <th style="text-align: center">Semester</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @forelse ($forum as $item)   
                                    <tr>
                                        <td align="center" style="width: 50px">{{$no++}}</td>
                                        <td align="center">{{$item->nama}}</td>
                                        <td align="center">{{$item->tgl}}</td>
                                        <td align="center">
                                            @if(str_contains($item->foto, 'pdf'))
                                            <a href="http://localhost:8000/storage/forum/{{ $item->foto }}" target = "_ blank">
                                                {{$item->foto}}
                                            </a>
                                            @else
                                            <a href="#" class="pop">
                                                <img src="{{asset('storage/forum/'.$item->foto)}}" alt="image" width="70px"/>
                                            </a> 
                                            @endif
                                        </td> 
                                        <td align="center">{{$item->penyelenggara}}</td>
                                        <td align="center">{{$item->semester_id}}</td>
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

{{-- Prestasi Kompetisi --}}
<div class="static-table-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline10-list mt-b-30">
                    <div class="sparkline10-hd">
                        <div style="margin-top: 8px" class="main-sparkline10-hd">
                            <h1>Prestasi Kompetisi</h1>
                        </div>
                    </div>
                    <div class="sparkline10-graph" style="margin-top: 20px;">
                        <div class="static-table-list">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr class="bg-success">
                                        <th style="text-align: center">No</th>
                                        <th style="text-align: center">Nama</th>
                                        <th style="text-align: center">Peringkat</th>
                                        <th style="text-align: center">Level</th>
                                        <th style="text-align: center">Penyelenggara Kompetisi</th>
                                        <th style="text-align: center">Foto</th>
                                        <th style="text-align: center">Semester</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @forelse ($prestasi as $item)   
                                    <tr>
                                        <td align="center" style="width: 50px">{{$no++}}</td>
                                        <td align="center">{{$item->nama}}</td>
                                        <td align="center">{{$item->peringkat}}</td>
                                        <td align="center">{{$item->level}}</td> 
                                        <td align="center">{{$item->penyelenggara_prestasi}}</td>
                                        <td align="center">
                                            @if(str_contains($item->foto, 'pdf'))
                                            <a href="http://localhost:8000/storage/prestasi/{{ $item->foto }}" target = "_ blank">
                                                {{$item->foto}}
                                            </a>
                                            @else
                                            <a href="#" class="pop">
                                                <img src="{{asset('storage/prestasi/'.$item->foto)}}" alt="image" width="70px"/>
                                            </a> 
                                            @endif
                                        </td> 
                                        <td align="center">{{$item->semester_id}}</td>
                                    </tr> 
                                    @empty
                                    <tr>
                                        <td class="border px-4 py-2 text-center text-danger" colspan="7"><b>TIDAK ADA DATA</b></td>
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

{{-- Organisasi --}}
<div class="static-table-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline10-list mt-b-30">
                    <div class="sparkline10-hd">
                        <div style="margin-top: 8px" class="main-sparkline10-hd">
                            <h1>Organisasi Mahasiswa/Kepanitiaan</h1>
                        </div>
                    </div>
                    <div class="sparkline10-graph" style="margin-top: 20px;">
                        <div class="static-table-list">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr class="bg-success">
                                        <th style="text-align: center">No</th>
                                        <th style="text-align: center">Nama</th>
                                        <th style="text-align: center">Jabatan</th>
                                        <th style="text-align: center">Masa Jabatan</th>
                                        <th style="text-align: center">Foto</th>
                                        <th style="text-align: center">Semester</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @forelse ($org_mhs as $item)   
                                    <tr>
                                        <td align="center" style="width: 50px">{{$no++}}</td>
                                        <td align="center">{{$item->nama}}</td>
                                        <td align="center">{{$item->jabatan}}</td>
                                        <td align="center">{{$item->masa_jabatan}}</td> 
                                        <td align="center">
                                            @if(str_contains($item->foto, 'pdf'))
                                            <a href="http://localhost:8000/storage/organisasi/{{ $item->foto }}" target = "_ blank">
                                                {{$item->foto}}
                                            </a>
                                            @else
                                            <a href="#" class="pop">
                                                <img src="{{asset('storage/organisasi/'.$item->foto)}}" alt="image" width="70px"/>
                                            </a> 
                                            @endif
                                        </td> 
                                        <td align="center">{{$item->semester_id}}</td>
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

{{-- Sosial --}}
<div class="static-table-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline10-list mt-b-30">
                    <div class="sparkline10-hd">
                        <div style="margin-top: 8px" class="main-sparkline10-hd">
                            <h1>Sosial Kemasyarakatan</h1>
                        </div>
                    </div>
                    <div class="sparkline10-graph" style="margin-top: 20px;">
                        <div class="static-table-list">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr class="bg-success">
                                        <th style="text-align: center">No</th>
                                        <th style="text-align: center">Nama</th>
                                        <th style="text-align: center">Tanggal</th>
                                        <th style="text-align: center">Penyelenggara Sosial</th>
                                        <th style="text-align: center">Foto</th>
                                        <th style="text-align: center">Semester</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @forelse ($sosial as $item)   
                                    <tr>
                                        <td align="center" style="width: 50px">{{$no++}}</td>
                                        <td align="center">{{$item->nama}}</td>
                                        <td align="center">{{$item->tgl}}</td> 
                                        <td align="center">{{$item->penyelenggara_sosial}}</td>
                                        <td align="center">
                                            @if(str_contains($item->foto, 'pdf'))
                                            <a href="http://localhost:8000/storage/sosial/{{ $item->foto }}" target = "_ blank">
                                                {{$item->foto}}
                                            </a>
                                            @else
                                            <a href="#" class="pop">
                                                <img src="{{asset('storage/sosial/'.$item->foto)}}" alt="image" width="70px"/>
                                            </a> 
                                            @endif
                                        </td> 
                                        <td align="center">{{$item->semester_id}}</td>
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

{{-- Mentoring --}}
<div class="static-table-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline10-list mt-b-30">
                    <div class="sparkline10-hd">
                        <div style="margin-top: 8px" class="main-sparkline10-hd">
                            <h1>Keaktifan Mentoring</h1>
                        </div>
                    </div>
                    <div class="sparkline10-graph" style="margin-top: 20px;">
                        <div class="static-table-list">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr class="bg-success">
                                        <th style="text-align: center">No</th>
                                        <th style="text-align: center">Nama</th>
                                        <th style="text-align: center">Jumlah Pertemuan</th>
                                        <th style="text-align: center">Jumlah Kehadiran</th>
                                        <th style="text-align: center">Persen</th>
                                        <th style="text-align: center">Foto</th>
                                        <th style="text-align: center">Semester</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @forelse ($mentoring as $item)   
                                    <tr>
                                        <td align="center" style="width: 50px">{{$no++}}</td>
                                        <td align="center">{{$item->nama}}</td>
                                        <td align="center">{{$item->jml_pertemuan}}</td>
                                        <td align="center">{{$item->jml_kehadiran}}</td> 
                                        <td align="center">{{$item->persen}}</td>
                                        <td align="center">
                                            @if(str_contains($item->foto, 'pdf'))
                                            <a href="http://localhost:8000/storage/mentoring/{{ $item->foto }}" target = "_ blank">
                                                {{$item->foto}}
                                            </a>
                                            @else
                                            <a href="#" class="pop">
                                                <img src="{{asset('storage/mentoring/'.$item->foto)}}" alt="image" width="70px"/>
                                            </a> 
                                            @endif
                                        </td> 
                                        <td align="center">{{$item->semester_id}}</td>
                                    </tr>   
                                    @empty
                                    <tr>
                                        <td class="border px-4 py-2 text-center text-danger" colspan="7"><b>TIDAK ADA DATA</b></td>
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

{{-- Tahsin --}}
<div class="static-table-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline10-list mt-b-30">
                    <div class="sparkline10-hd">
                        <div style="margin-top: 8px" class="main-sparkline10-hd">
                            <h1>Kelulusan Tahsin/Tahfiz</h1>
                        </div>
                    </div>
                    <div class="sparkline10-graph" style="margin-top: 20px;">
                        <div class="static-table-list">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr class="bg-success">
                                        <th style="text-align: center">No</th>
                                        <th style="text-align: center">Level</th>
                                        <th style="text-align: center">No SK</th>
                                        <th style="text-align: center">Nilai</th>
                                        <th style="text-align: center">Foto</th>
                                        <th style="text-align: center">Semester</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @forelse ($tahsin as $item)   
                                    <tr>
                                        <td align="center" style="width: 50px">{{$no++}}</td>
                                        <td align="center">{{$item->level}}</td>
                                        <td align="center">{{$item->no_sk}}</td> 
                                        <td align="center">{{$item->nilai}}</td>
                                        <td align="center">
                                            @if(str_contains($item->foto, 'pdf'))
                                            <a href="http://localhost:8000/storage/tahsin/{{ $item->foto }}" target = "_ blank">
                                                {{$item->foto}}
                                            </a>
                                            @else
                                            <a href="#" class="pop">
                                                <img src="{{asset('storage/tahsin/'.$item->foto)}}" alt="image" width="70px"/>
                                            </a> 
                                            @endif
                                        </td> 
                                        <td align="center">{{$item->semester_id}}</td>
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

{{-- Kekhasan Beasiswa --}}
<div class="static-table-area">
    <div class="container-fluid">
        @if ($mahasiswa->beasiswa == 'hes')
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline10-list mt-b-30">
                    <div class="sparkline10-hd">
                        <div style="margin-top: 8px" class="main-sparkline10-hd">
                            <h1>Kekhasan Beasiswa</h1>
                        </div>
                    </div>
                    <div class="sparkline10-graph" style="margin-top: 20px;">
                        <div class="static-table-list" style="overflow-x: auto">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr class="bg-success">
                                        <th style="text-align: center">No</th>
                                        <th style="text-align: center">No Sertifikat</th>
                                        <th style="text-align: center">Judul Materi</th>
                                        <th style="text-align: center">Agenda</th>
                                        <th style="text-align: center">Foto</th>
                                        <th style="text-align: center">Semester</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @forelse ($beasiswa as $item)   
                                    <tr>
                                        <td align="center">{{$no++}}</td>
                                        <td align="center">{{$item->no_sertifikat}}</td>
                                        <td align="center">{{$item->nama}}</td>
                                        <td align="center">{{$item->agenda}}</td>
                                        <td align="center">
                                            @if(str_contains($item->foto, 'pdf'))
                                            <a href="http://localhost:8000/storage/beasiswa/{{ $item->foto }}" target = "_ blank">
                                                {{$item->foto}}
                                            </a>
                                            @else
                                            <a href="#" class="pop">
                                                <img src="{{asset('storage/beasiswa/'.$item->foto)}}" alt="image" width="70px"/>
                                            </a> 
                                            @endif
                                        </td>
                                        <td align="center">{{$item->semester_id}}</td>
                                    </tr>  
                                    @empty
                                    <tr>
                                        <td class="border px-4 py-2 text-center text-danger" colspan="4"><b>TIDAK ADA DATA</b></td>
                                    </tr>    
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            
        @elseif ($mahasiswa->beasiswa == 'hafidz')
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline10-list mt-b-30">
                    <div class="sparkline10-hd">
                        <div style="margin-top: 8px" class="main-sparkline10-hd">
                            <h1>Kekhasan Beasiswa</h1>
                        </div>
                    </div>
                    <div class="sparkline10-graph" style="margin-top: 20px;">
                        <div class="static-table-list" style="overflow-x: auto">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr class="bg-success">
                                        <th style="text-align: center">No</th>
                                        <th style="text-align: center">Nama LTQ</th>
                                        <th style="text-align: center">Jenis Kegiatan</th>
                                        <th style="text-align: center">Foto</th>
                                        <th style="text-align: center">Semester</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @forelse ($beasiswa as $item)   
                                    <tr>
                                        <td align="center">{{$no++}}</td>
                                        <td align="center">{{$item->penyelenggara}}</td>
                                        <td align="center" style="width: 350px">{{$item->nama}}</td>
                                        <td align="center">
                                            @if(str_contains($item->foto, 'pdf'))
                                            <a href="http://localhost:8000/storage/beasiswa/{{ $item->foto }}" target = "_ blank">
                                                {{$item->foto}}
                                            </a>
                                            @else
                                            <a href="#" class="pop">
                                                <img src="{{asset('storage/beasiswa/'.$item->foto)}}" alt="image" width="70px"/>
                                            </a> 
                                            @endif
                                        </td>
                                        <td align="center">{{$item->semester_id}}</td>
                                    </tr>  
                                    @empty
                                    <tr>
                                        <td class="border px-4 py-2 text-center text-danger" colspan="4"><b>TIDAK ADA DATA</b></td>
                                    </tr>    
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
        
        @else
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline10-list mt-b-30">
                    <div class="sparkline10-hd">
                        <div style="margin-top: 8px" class="main-sparkline10-hd">
                            <h1>Kekhasan Beasiswa</h1>
                        </div>
                    </div>
                    <div class="sparkline10-graph" style="margin-top: 20px;">
                        <div class="static-table-list" style="overflow-x: auto">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr class="bg-success">
                                        <th style="text-align: center">No</th>
                                        <th style="text-align: center">Nama Usaha</th>
                                        <th style="text-align: center">Deskripsi Usaha</th>
                                        <th style="text-align: center">Foto</th>
                                        <th style="text-align: center">Semester</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @forelse ($beasiswa as $item)   
                                    <tr>
                                        <td align="center">{{$no++}}</td>
                                        <td align="center">{{$item->nama}}</td>
                                        <td align="center" style="width: 350px">{{$item->deskripsi}}</td>
                                        <td align="center">
                                            @if(str_contains($item->foto, 'pdf'))
                                            <a href="http://localhost:8000/storage/beasiswa/{{ $item->foto }}" target = "_ blank">
                                                {{$item->foto}}
                                            </a>
                                            @else
                                            <a href="#" class="pop">
                                                <img src="{{asset('storage/beasiswa/'.$item->foto)}}" alt="image" width="70px"/>
                                            </a> 
                                            @endif
                                        </td>
                                        <td align="center">{{$item->semester_id}}</td>
                                    </tr>  
                                    @empty
                                    <tr>
                                        <td class="border px-4 py-2 text-center text-danger" colspan="4"><b>TIDAK ADA DATA</b></td>
                                    </tr>    
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> 
            </div> 
        </div> 
        {{-- <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline10-list mt-b-30">
                    <div class="sparkline10-hd">
                        <div style="margin-top: 8px" class="main-sparkline10-hd">
                            <h1>Kekhasan Beasiswa</h1>
                        </div>
                    </div>
                    <div class="sparkline10-graph" style="margin-top: 20px;">
                        <div class="static-table-list">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr class="bg-success">
                                        <th style="text-align: center">No</th>
                                        <th style="text-align: center">Nama</th>
                                        <th style="text-align: center">Deskripsi</th>
                                        <th style="text-align: center">Foto</th>
                                        <th style="text-align: center">Semester</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @forelse ($beasiswa as $item)   
                                    <tr>
                                        <td align="center" style="width: 50px">{{$no++}}</td>
                                        <td align="center">{{$item->nama}}</td>
                                        <td align="center" style="width: 350px">{{$item->deskripsi}}</td>
                                        <td align="center">
                                            <a href="#" class="pop">
                                                <img src="{{asset('img/'.$item->foto)}}" alt="image" width="70px"/>
                                            </a>
                                        </td> 
                                        <td align="center">{{$item->semester_id}}</td>
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
        </div> --}}
        @endif
    </div>
</div>

@endif
 {{-- awal pop up gambar --}}
 <div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">							   
      <div class="modal-content">         						      
       <div class="modal-body">
                                             
         <button type="button" class="close" data-dismiss="modal"><span 
         aria-hidden="true">&times;</span><span class="sr- 
         only">Close</span></button>						        
        <img src="" class="imagepreview" style="width: 100%;">
                                        
       </div>							    
     </div>								   
    </div>
</div>
{{-- awal pop up gambar --}}


<script>
    $(function() {
      $('.pop').on('click', function() {
        $('.imagepreview').attr('src',$(this).find('img').attr('src'));
        $('#imagemodal').modal('show');   
        });		
    });
 </script>

@endsection
@section('js')
   
@endsection

