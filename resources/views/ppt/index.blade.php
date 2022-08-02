@extends('template.app')

@section('konten')

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        @if (session('status'))
        <div class="alert-icon shadow-inner wrap-alert-b">
            <div class="alert alert-success alert-st-one" role="alert">
                <i class="fa fa-check edu-checked-pro admin-check-pro" aria-hidden="true"></i>
                {{-- <p class="message-mg-rt"><strong>Well done!</strong> You successfully read this important message.</p> --}}
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
                                $ppt = DB::table('ppt')->where('users_id', Auth::user()->id)->get();
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
<script>
    $(function() {
      $('.pop').on('click', function() {
        $('.imagepreview').attr('src',$(this).find('img').attr('src'));
        $('#imagemodal').modal('show');   
        });		
    });
 </script>
@endsection