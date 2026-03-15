
{{View::make('portal.header',array('judul'=> 'Statistik LPK','type' => 'pages'))}}
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
                        <span property="name">Statistik Lembaga Pendidikan & Ketrampilan</span></a>
                    <span property="position" content="2"></span>
                </li>
            </ul>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-12">
            <div class="artikel-items detail">

                <h1 class="artikel-judul detail">Statistik Lembaga Pendidikan & Ketrampilan</h1>
                <div class="artikel-isi">                    
                    <table class="table table-striped table-hover table-condensed table-bordered" id="datatablejs">
                        <thead class="bg-primary">
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Kabupaten / Kota</th>
                                <th class="text-center">Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $x = 0;
                                $rschart = \DB::table('potensi_lpk')
                                    ->join('ms_kotakab', 'potensi_lpk.kotakab', '=', 'ms_kotakab.id')
                                    ->select('kotakab',
                                        \DB::raw("COUNT(*) AS jml_lpk"), 'nama_kotakab'
                                    )
                                    ->groupBy('kotakab')
                                    ->orderBy('kotakab', 'asc')->get();
                            ?>
                            @foreach($rschart as $item)
                            <?php
                                $x++;
                                $jml_lpk[$x] = $item->jml_lpk;
                            ?>
                            <tr>
                                <td align="center">{{$x}}</td>
                                <td align="left"><a href="{{url()}}/statistik_lpk/{{$item->kotakab}}">{{ucwords(strtolower($item->nama_kotakab))}}</a></td>
                                <td align="right">{{$item->jml_lpk}}</td>

                            </tr>
                            @endforeach
                            <tfoot>
                                <tr>
                                    <th colspan="2">Jumlah</th>
                                    <th class="text-right">{{array_sum($jml_lpk)}}</th>
                                </tr>
                            </tfoot>
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