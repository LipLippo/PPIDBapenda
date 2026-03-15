<?php 
    $ms        = \DB::table('ms_investasi')->where('id', Request::segment(2))->first();
    $inv       = \DB::table('ms_kategori_investasi')->where('id', Request::segment(3))->first();
    $investasi = \DB::table('ms_konten_investasi')->where('idkategori', Request::segment(3))->get();
    $i = 1;
?>


{{View::make('portal.header')}}
<section id="page-heading" style="background-image:url({{asset('/assets/investasi/sapi.jpg')}})">


    <br>
    <br>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <ul class="breadcrumb">
                    <li><a href="{{url()}}">Beranda</a></li>
                    <li><a href="{{url()}}/investment">Investasi</a></li>
                    <li><a href="{{url()}}/investment/{{$ms->id}}">{{@$ms->nama_investasi}}</a></li>
                    <li class="active">{{@$inv->nama_kategori}}</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section id="isi-data">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="section-heading">Investasi - {{@$ms->nama_investasi.' '.@$inv->nama_kategori}}</div>
            </div>

            @if($inv->istable == 1)
                <table class="table table-striped table-hover table-condensed table-bordered" id="datatablejs">
                    <thead class="bg-primary">
                        <tr>
                            <th class="text-center" style="width:100px">No</th>
                            <th class="text-center">Judul</th>
                        </tr>
                    </thead>
                    <tbody>
            @endif

            @foreach($investasi as $invest)
                @if($inv->istable == 1)
                    <tr>
                        <td align="center">{{$i}}</td>
                        <td><a href="{{url()}}/investment/{{@$ms->id}}/{{@$inv->id}}/{{@$invest->id}}">{{$invest->judul}}</a></td>
                    </tr>
                @else
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <a href="{{url()}}/investment/{{@$ms->id}}/{{@$inv->id}}/{{@$invest->id}}" class="clearfix well well-sm featured-list-item">
                          <div class="col-xs-4">
                            <img src="{{asset('/packages/upload/investasi/'.@$invest->logo)}}" alt="" width="100%">
                          </div>
                          <div class="col-xs-8">
                            <h1>{{@$invest->judul}}</h1>
                          </div>
                        </a>
                    </div>
                @endif
                <?php $i++; ?>
            @endforeach

            @if($inv->istable == 1)
                </tbody>
                </table>
            @endif
        </div>
        <div class="row">
            <div class="col-md-12">
                <hr>
                <a href="{{url()}}/investment/{{$ms->id}}" class="btn btn-primary"><i class="glyphicon glyphicon-chevron-left"></i> Back to List</a> &nbsp; 
                <a href="{{url()}}/investment" class="btn btn-warning"><i class="glyphicon glyphicon-th-list"></i> Show all investment</a>
                <hr>
            </div>
        </div>
    </div>
</section>

{{View::make('portal.footer')}}

<script type="text/javascript">
    $(document).ready(function(){
        $('#datatablejs').dataTable( {
            "pageLength": 35
        } );

        $('#datatablejs_length').addClass('pull-left');
        $('#datatablejs_filter').addClass('pull-right');
        $('#datatablejs_info').addClass('pull-left');
        $('#datatablejs_paginate').addClass('pull-right');
    })
</script>