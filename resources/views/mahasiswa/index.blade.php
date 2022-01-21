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
                <div class="main-sparkline10-hd">
                    <h1>Data Mahasiswa Penerima Beasiswa</h1>
                    {{-- <a  href="" target="blank">
                        <button style="margin-top: 10px" type="button" class="btn btn-success btn-rounded btn-icon" data-toggle="tooltip" data-placement="bottom" title="Export Excel">
                            <i class="fas fa-file-excel"></i>  Exsport Excel
                        </button>
                    </a>
                    <a  href="" target="blank">
                        <button style="margin-top: 10px" type="button" class="btn btn-danger btn-rounded btn-icon" data-toggle="tooltip" data-placement="bottom" title="Cetak pdf">
                            <i class="fas fa-file-excel"></i>  Cetak PDF
                        </button>
                    </a> --}}
                </div>
            </div>
            <div class="sparkline10-graph" style="margin-top: 20px;">
                <div class="row">
                    <div class="col-md-4">
                        <form action="{{route('mahasiswa')}}">
                        <label for="filter_angkatan">Filter Berdasarkan Angkatan</label>
                        <select class="form-control filter_angkatan" name="angkatan" id="filter-angkatan" onchange="this.form.submit();">
                            <option hidden>Pilih Angkatan</option>
                            @foreach ($angkat as $item)
                            <option value="{{$item->id}}">{{$item->nama}}</option>
                            @endforeach
                        </select>
                        </form>
                    </div>
                </div>
                <div style="margin-top: 20px" class="static-table-list scrol">
                    @include('mahasiswa.tabel',$mahasiswa)
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
   
@endsection

