
<link rel="stylesheet" href="{{ asset('template') }}/css/tabel.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap.min.css">
{{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css"> --}}

<style>
    .center {
    text-align: center
    }
</style>


<table id="mahasiswa" class="table table-striped table-bordered nowrap display" style="width:100%">
    <thead>
        <tr>
            <th class="center" >No</th>
            <th class="center">Nama</th>
            <th class="center">Foto</th>
            <th class="center">NIM</th>
            <th class="center">Email</th>
            <th style="width: 150px" class="center">Angkatan</th>
            <th class="center">Prodi</th>
            <th class="center">Alamat</th>
            <th style="width: 150px" class="center">No Hp</th>
            <th class="center">Beasiswa</th>
            <th class="center">Donatur</th>
            <th style="width: 120px" class="center">Keterangan</th>
            <th style="width: 120px" class="center">Status</th>
            <th style="width: 150px" class="center" style="width: 150px;">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @php
            $no = 1;
            
        @endphp
        @foreach ($mahasiswa as $item)   
        <tr>
            <td class="center">{{$no++}}</td>
            <td class="center">{{$item->name}}</td>
            <td class="center">
                <a href="#" class="pop">
                    <img src="{{asset('img/'.$item->foto)}}" alt="image"/>
                </a>
            </td>
            <td class="center">{{$item->nim}}</td>
            <td class="center">{{$item->email}}</td>
            <td class="center">{{$item->nama}}</td>
            <td class="center">{{$item->prodi}}</td>
            <td class="center">{{$item->alamat}}</td>
            <td class="center">{{$item->hp}}</td>
            <td class="center">{{$item->beasiswa}}</td>
            <td class="center">{{$item->donatur}}</td>
            <td class="center">{{$item->keterangan}}</td>
            <td class="center">
                <?php if ($item->status == 'Tidak Aktif') { ?>
                    <label class="label label-danger">Tidak Aktif</label>
                  <?php } else { ?>
                    <label class="label label-success">Aktif</label>
                <?php } ?>
            </td>
            
            <td class="center">
                <a style="text-decoration: none" href="{{route('mahasiswa.edit',$item->id)}}">
                    <button type="button" class="btn btn-warning btn-rounded btn-icon btn-xs" data-toggle="tooltip" data-placement="bottom" title="Lihat & Edit">
                        <i class="fa fa-pencil-square-o"></i>
                    </button>
                </a>
                <a href="{{route('mahasiswa.destroy',$item->id)}}"  >
                    <button type="button" class="btn btn-danger btn-rounded btn-icon btn-xs" data-toggle="tooltip" data-placement="bottom" title="Hapus" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data ini ?')">
                        <i class="fa fa-trash"></i>
                    </button>
                </a>

            </td>
        </tr>      
        @endforeach
    </tbody>
</table>
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

{{-- <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script> --}}
<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script> 
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>




<script>
    $(document).ready(function() {
    var table = $('#mahasiswa').DataTable( {
        "scrollX": true
       
    } );
   
    new $.fn.dataTable.FixedHeader( table );
});

</script>