
{{View::make('portal.header',array('judul'=> 'Statistik Potensi Tenaga Kerja SMK','type' => 'pages'))}}
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
                        <span property="name">Statistik Potensi Tenaga Kerja SMK</span></a>
                    <span property="position" content="2"></span>
                </li>
            </ul>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-12">
            <div class="artikel-items detail">

                <h1 class="artikel-judul detail">Statistik Potensi Tenaga Kerja SMK</h1>
                <div class="artikel-isi">                    
                    <table class="table table-striped table-hover table-condensed table-bordered" id="datatablejs">
                        <thead class="bg-primary">
                            <tr>
                                <th class="text-center" rowspan="2">No</th>
                                <th class="text-center" rowspan="2">Kabupaten / Kota</th>
                                <th class="text-center" colspan="6">Jumlah</th>
                            </tr>
                            <tr>
                                <th class="text-center" width="10%">SMK</th>
                                <th class="text-center" width="10%">Negeri</th>
                                <th class="text-center" width="10%">Swasta</th>
                                <th class="text-center" width="10%">Pendidik</th>
                                <th class="text-center" width="10%">Tenaga Kependidikan</th>
                                <th class="text-center" width="10%">Siswa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $x = 0;
                                $rschart = \DB::table('tenaga_kerja_smk')
                                    ->select('kabupaten_kota',
                                        \DB::raw("COUNT(*) AS jmlsekolah"),
                                        \DB::raw("SUM(IF(status_sekolah='Negeri', 1, 0)) AS negeri"),
                                        \DB::raw("SUM(IF(status_sekolah='Swasta', 1, 0)) AS swasta"),
                                        \DB::raw("SUM(pendidik) AS pendidik"),
                                        \DB::raw("SUM(tenaga_kependidikan) AS tpk"),
                                        \DB::raw("SUM(siswa) AS siswa")
                                    )
                                    ->groupBy('kabupaten_kota')
                                    ->orderBy('kabupaten_kota', 'desc')->get();
                            ?>
                            @foreach($rschart as $item)
                            <?php
                                $x++;
                                $jmlsekolah[$x] = $item->jmlsekolah;
                                $negeri[$x] = $item->negeri;
                                $swasta[$x] = $item->swasta;
                                $pendidik[$x] = $item->pendidik;
                                $tpk[$x] = $item->tpk;
                                $siswa[$x] = $item->siswa;
                            ?>
                            <tr>
                                <td align="center">{{$x}}</td>
                                <td align="left"><a href="{{url()}}/statistik_potensi_smk/{{str_replace(' ','_', strtolower($item->kabupaten_kota))}}">{{$item->kabupaten_kota}}</a></td>
                                <td align="right">{{$item->jmlsekolah}}</td>
                                <td align="right">{{$item->negeri}}</td>
                                <td align="right">{{$item->swasta}}</td>
                                <td align="right">{{$item->pendidik}}</td>
                                <td align="right">{{$item->tpk}}</td>
                                <td align="right">{{$item->siswa}}</td>
                            </tr>
                            @endforeach
                            <tfoot>
                                <tr>
                                    <th colspan="2">Jumlah</th>
                                    <th class="text-right">{{array_sum($jmlsekolah)}}</th>
                                    <th class="text-right">{{array_sum($negeri)}}</th>
                                    <th class="text-right">{{array_sum($swasta)}}</th>
                                    <th class="text-right">{{array_sum($pendidik)}}</th>
                                    <th class="text-right">{{array_sum($tpk)}}</th>
                                    <th class="text-right">{{array_sum($siswa)}}</th>
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