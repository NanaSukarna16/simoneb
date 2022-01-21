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
                    <h1>Sosial Kemasyarakatan</h1>
                    <a  href="{{route('sosial.create')}}">
                        <button style="margin-top: 10px" type="button" class="btn btn-success btn-rounded btn-icon" data-toggle="tooltip" data-placement="bottom" title="Tambah Sosial">
                            <i class="fa fa-plus "></i> Tambah Sosial
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
                                <th style="text-align: center">Nama Kegiatan</th>
                                <th style="text-align: center">Tanggal</th>
                                <th style="text-align: center">Penyelenggara Sosial</th>
                                <th style="text-align: center">Foto</th>
                                <th style="text-align: center">Semester</th>
                                <th style="text-align: center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                                $sosial = DB::table('sosial')->where('users_id', Auth::user()->id)->get();
                            @endphp
                            @forelse ($sosial as $item)   
                            <tr>
                                <td align="center" style="width: 50px">{{$no++}}</td>
                                <td align="center">{{$item->nama}}</td>
                                <td align="center" style="width: 150px">{{$item->tgl}}</td>
                                <td align="center">{{$item->penyelenggara_sosial}}</td>
                                <td align="center">
                                    @if(str_contains($item->foto, 'pdf'))
                                    <a href="http://localhost:8000/storage/sosial/{{ $item->foto }}" target = "_blank">
                                        {{$item->foto}}
                                    </a>
                                    @else
                                    <a href="#" class="pop">
                                        <img src="{{asset('storage/sosial/'.$item->foto)}}" alt="image" width="70px"/>
                                    </a> 
                                    @endif
                                </td> 
                                <td align="center">{{$item->semester_id}}</td>
                                <td style="width: 150px">
                                    <center>
                                        <a style="text-decoration: none" href="{{route('sosial.edit',$item->id)}}">
                                            <button type="button" class="btn btn-warning btn-rounded btn-icon btn-xs" data-toggle="tooltip" data-placement="bottom" title="Edit">
                                                <i class="fa fa-pencil-square-o"></i>
                                            </button>
                                        </a>       
                                        <a href="{{route('sosial.destroy',$item->id)}}">
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

<script>
    $(function() {
      $('.pop').on('click', function() {
        $('.imagepreview').attr('src',$(this).find('img').attr('src'));
        $('#imagemodal').modal('show');   
        });		
    });
 </script>
@endsection