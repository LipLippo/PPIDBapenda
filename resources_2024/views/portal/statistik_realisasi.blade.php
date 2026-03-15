
{{View::make('portal.header',array('judul'=> 'Statistik Realisasi Perizinan','type' => 'pages'))}}
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
                        <span property="name">Statistik</span></a>
                    <span property="position" content="2"></span>
                </li>
            </ul>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-12">
            <div class="artikel-items detail">
                <!--<div class="artikel-waktu">
                    Diposkan &nbsp; 16 Februari 2017 &nbsp; 02.30 WIB &nbsp; Oleh : Admin &nbsp; <a href="Statistik"><i class="fa fa-fw fa-tag"></i> Statistik</a>
                </div>-->
                <h1 class="artikel-judul detail">Statistik Realisasi Izin</h1>                
                <div class="artikel-isi">                    
                    <table class="table table-striped table-hover table-condensed table-bordered datatablejs">
                        <thead>
                            <tr class="bg-primary">
                                <th class="text-center">No</th>
                                <th class="text-center">Tanggal</th>
                                <th class="text-center">Judul</th>
                                <th class="text-center">Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $x = 0;
                                $rschart = \DB::table('statistik_realisasi')->orderBy('tanggal', 'desc')->get();
                            ?>
                            @foreach($rschart as $item)
                            <?php $x++; ?>
                            <tr>
                                <td align="center">{{$x}}</td>
                                <td align="left"><i class="fa fa-calendar-o fa-fw"></i> {{\formatTanggalPanjang($item->tanggal)}}</td>
                                <td>{{$item->title}}</td>
                                <td class="text-center">
                                    <a href="{{url()}}/statistik_realisasi/{{$item->id}}" class="btn btn-sm btn-default"><i class="fa fa-bar-chart-o"></i></a>
                                </td>
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
        $('.tableData').dataTable();
        $('.dataTables_length').addClass('pull-left');
        $('.dataTables_filter').addClass('pull-right');
        $('.dataTables_info').addClass('pull-left');
        $('.dataTables_paginate').addClass('pull-right');
    })
</script>