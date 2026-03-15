
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
                <h1 class="artikel-judul detail"><small>{{\getUtility('tenaga_kerja_smk', 'kabupaten_kota', str_replace('_',' ', ucfirst($kab)), 'kabupaten_kota')}}</small></h1>
                <div class="artikel-isi">
                    <table class="table table-striped table-hover table-condensed table-bordered" id="datatablejs">
                        <thead class="bg-primary">
                            <tr>
                                <th class="text-center" rowspan="2">No</th>
                                <th class="text-center" rowspan="2">SMK</th>
                                <th class="text-center" rowspan="2">Status Sekolah</th>
                                <th class="text-center" rowspan="2">Alamat</th>
                                <th class="text-center" rowspan="2">Telepon</th>
                                <th class="text-center" rowspan="2">Jurusan</th>
                                <th class="text-center" colspan="3">Jumlah</th>
                            </tr>
                            <tr>
                                <th class="text-center">Pendidik</th>
                                <th class="text-center">Tenaga Kependidikan</th>
                                <th class="text-center">Siswa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $x = 0;
                                $rschart = \DB::table('tenaga_kerja_smk')
                                    ->where('kabupaten_kota', str_replace('_',' ', ucfirst($kab)))
                                    ->orderBy('sekolah', 'desc')->get();
                            ?>
                            @foreach($rschart as $item)
                            <?php $x++; ?>
                            <tr>
                                <td align="center">{{$x}}</td>
                                <td align="left">{{$item->sekolah}}</td>
                                <td align="left">{{$item->status_sekolah}}</td>
                                <td align="left">{{$item->alamat}}</td>
                                <td align="left">{{$item->telp_sekolah}}</td>
                                <td align="left">
                                    <ol>
                                        {{($item->jurusan_1!=' ')?"<li>".$item->jurusan_1."</li>":""}}
                                        {{($item->jurusan_2!=' ')?"<li>".$item->jurusan_2."</li>":""}}
                                        {{($item->jurusan_3!=' ')?"<li>".$item->jurusan_3."</li>":""}}
                                        {{($item->jurusan_4!=' ')?"<li>".$item->jurusan_4."</li>":""}}
                                        {{($item->jurusan_5!=' ')?"<li>".$item->jurusan_5."</li>":""}}
                                        {{($item->jurusan_6!=' ')?"<li>".$item->jurusan_6."</li>":""}}
                                        {{($item->jurusan_7!=' ')?"<li>".$item->jurusan_7."</li>":""}}
                                        {{($item->jurusan_8!=' ')?"<li>".$item->jurusan_8."</li>":""}}
                                        {{($item->jurusan_9!=' ')?"<li>".$item->jurusan_9."</li>":""}}
                                    </ol>
                                </td>
                                <td align="center">{{$item->pendidik}}</td>
                                <td align="center">{{$item->tenaga_kependidikan}}</td>
                                <td align="center">{{$item->siswa}}</td>
                            </tr>
                            @endforeach
                            <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Office</th>
                                    <th>Age</th>
                                    <th>Start date</th>
                                    <th>Salary</th>
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