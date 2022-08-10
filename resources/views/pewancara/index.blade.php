@extends('template.app')

@section('konten')

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

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="sparkline10-list mt-b-30">
            <div class="sparkline10-hd">
                <div style="margin-top: 8px" class="main-sparkline10-hd">
                    <h1>Data Pewancara Evaluasi</h1>
                    <a  href="{{route('pewancara.create')}}">
                        <button style="margin-top: 10px" type="button" class="btn btn-success btn-rounded btn-icon" data-toggle="tooltip" data-placement="bottom" title="Tambah Nilai">
                            <i class="fa fa-plus "></i> Tambah Pewancara
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
                                <th style="text-align: center">Nama</th>
                                <th style="text-align: center">Created_at</th>
                                <th style="text-align: center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @php
                                $no = 1;
                                $nilai = DB::table('nilai')->where('users_id', Auth::user()->id)->get();
                            @endphp --}}
                            @forelse ($pewancara as $item)   
                            <tr>
                                <td align="center" style="width: 50px">{{++$no}}</td>
                                <td align="center">{{$item->nama}}</td>
                                <td align="center">{{$item->created_at}}</td>
                                <td style="width: 150px">
                                    <center>
                                        <a style="text-decoration: none" href="{{route('pewancara.edit',$item->id)}}">
                                            <button type="button" class="btn btn-warning btn-rounded btn-icon btn-xs" data-toggle="tooltip" data-placement="bottom" title="Edit">
                                                <i class="fa fa-pencil-square-o"></i>
                                            </button>
                                        </a>       
                                        <a href="{{route('pewancara.destroy',$item->id)}}">
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
                <div class="float-left">
                    <b>Jumlah Data : <?php echo $total; ?></b>
                </div>
                <div class="float-right">
                    {{ $pewancara->links() }}
                </div>
            </div>
        </div>
    </div> 
</div>

@endsection