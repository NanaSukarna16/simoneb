@extends('template.app')

@section('konten')

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="sparkline10-list mt-b-30">
                <div style="margin-top: 20px" class="static-table-list scrol">
                    @include('portofolio.grafik')
                </div>
        </div>
    </div>
</div>
@endsection

@section('js')

@endsection
