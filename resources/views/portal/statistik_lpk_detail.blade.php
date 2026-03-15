
{{View::make('portal.header',array('judul'=> 'Statistik LPK','type' => 'pages'))}}
<?php 
    $idkota = \Request::segment(2);
    $kota   = \DB::table('ms_kotakab')->where('id', $idkota)->first();
    $datas  = \DB::table('potensi_lpk')->where('kotakab', $idkota)->get();
    $x = 0;
?>
<br>
<br>
<br>
<br>
<br>
<br>
<div class="container">
    <div class="row">
        <div class="col-xs-12">                        
            <ul vocab="http://schema.org/" typeof="BreadcrumbList" class="breadcrumb" id="bc1">
                <li property="itemListElement" typeof="ListItem" >
                    <a property="item" typeof="WebPage" href="{{url()}}">
                        <span property="name">Beranda</span></a>
                    <span property="position" content="1"></span>
                </li>
                <li property="itemListElement" typeof="ListItem">
                    <a property="item" typeof="WebPage" href="#">
                        <span property="name"></span></a>
                    <span property="position" content="2">Statistik Lembaga Pendidikan & Ketrampilan</span>
                </li>
            </ul>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-12">
            <div class="artikel-items detail">

                <h1 class="artikel-judul detail">LPK di {{$kota->nama_kotakab}}</h1>
                <div class="artikel-isi">                    
                    <table class="table table-striped table-hover table-condensed table-bordered" id="datatablejs">
                        <thead class="bg-primary">
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Nama LPK</th>
                                <th class="text-center">Alamat</th>
                                <th class="text-center">Telp/Fax</th>
                                <th class="text-center">Penanggung Jawab</th>
                                <th class="text-center">Kejuruan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($datas as $dt)
                            <?php
                                $x++;
                            ?>
                            <tr>
                                <td align="center">{{$x}}</td>
                                <td align="left">{{$dt->nama}}</td>
                                <td align="left">{{$dt->alamat}}</td>
                                <td align="left">{{$dt->telp_fax}}</td>
                                <td align="left">{{$dt->penanggung_jawab}}</td>
                                <td align="left">{{$dt->kejuruan}}</td>

                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <br>
                <hr>
                <p>
                    <strong>Share: </strong>
                <div id="sharesocial"></div>
                </p>
                <hr>
            </div>
        </div>        
    </div>
</div>

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