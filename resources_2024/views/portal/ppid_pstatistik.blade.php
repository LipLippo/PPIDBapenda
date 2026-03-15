
{{View::make('portal.ppid_header',array('judul'=> 'Pengajuan Informasi','type' => 'pages'))}}

<br>
<div class="container">
    <div class="row">
        <div class="col-xs-12">                        
            <ul vocab="http://schema.org/" typeof="BreadcrumbList" class="breadcrumb" id="bc1">
                <li property="itemListElement" typeof="ListItem" >
                    <a property="item" typeof="WebPage" href="{{url('')}}">
                        <span property="name">Beranda</span></a>
                    <span property="position" content="1"></span>
                </li>
                <li property="itemListElement" typeof="ListItem">
                    <a property="item" typeof="WebPage" href="{{url('')}}/pengajuan_informasi">
                        <span property="name">Statisik Perohonan Informasi dan Keberatan</span></a>
                    <span property="position" content="2"></span>
                </li>
            </ul>
        </div>

        <!-- <div class="col-xs-12 col-sm-8 col-md-8 col-lg-9"> -->
        <div class="col-xs-12">
            <div class="artikel-items detail">

                <h1 class="artikel-judul detail">Statisik Perohonan Informasi dan Keberatan</h1>
                <div class="artikel-isi">

                    <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

                    <table class="table table-striped table-hover table-condensed sortable" id="datatable" style="display: none;">
                        <thead>
                            <tr>
                                <th align="left">Informasi</th>
                                <th align="right"><div align="right">Perohonan</div></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td align="left">JANUARI</td>
                                <td align="right">{{getStatistik('ppid_pengajuan_informasi', '01', date('Y'))}}</td>
                            </tr>
                            <tr>
                                <td align="left">FEBRUARI</td>
                                <td align="right">{{getStatistik('ppid_pengajuan_informasi', '01', date('Y'))}}</td>
                            </tr>
                            <tr>
                                <td align="left">MARET</td>
                                <td align="right">{{getStatistik('ppid_pengajuan_informasi', '02', date('Y'))}}</td>
                            </tr>
                            <tr>
                                <td align="left">APRIL</td>
                                <td align="right">{{getStatistik('ppid_pengajuan_informasi', '03', date('Y'))}}</td>
                            </tr>
                            <tr>
                                <td align="left">MEI</td>
                                <td align="right">{{getStatistik('ppid_pengajuan_informasi', '04', date('Y'))}}</td>
                            </tr>
                            <tr>
                                <td align="left">JUNI</td>
                                <td align="right">{{getStatistik('ppid_pengajuan_informasi', '05', date('Y'))}}</td>
                            </tr>
                            <tr>
                                <td align="left">JULI</td>
                                <td align="right">{{getStatistik('ppid_pengajuan_informasi', '06', date('Y'))}}</td>
                            </tr>
                            <tr>
                                <td align="left">AGUSTUS</td>
                                <td align="right">{{getStatistik('ppid_pengajuan_informasi', '07', date('Y'))}}</td>
                            </tr>
                            <tr>
                                <td align="left">SEPTEMBER</td>
                                <td align="right">{{getStatistik('ppid_pengajuan_informasi', '08', date('Y'))}}</td>
                            </tr>
                            <tr>
                                <td align="left">OKTOBER</td>
                                <td align="right">{{getStatistik('ppid_pengajuan_informasi', '09', date('Y'))}}</td>
                            </tr>
                            <tr>
                                <td align="left">NOVEMBER</td>
                                <td align="right">{{getStatistik('ppid_pengajuan_informasi', '11', date('Y'))}}</td>
                            </tr>
                            <tr>
                                <td align="left">DESEMBER</td>
                                <td align="right">{{getStatistik('ppid_pengajuan_informasi', '12', date('Y'))}}</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td align="left"><b>JUMLAH</b></td>
                                <td align="right"><b></b></td>
                            </tr>
                        </tfoot>

                    </table>


                    <div id="container2" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

                    <table class="table table-striped table-hover table-condensed sortable" id="datatable2" style="display: none;">
                        <thead>
                        <tr>
                            <th align="left">Informasi</th>
                            <th align="right"><div align="right">Perohonan</div></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td align="left">JANUARI</td>
                            <td align="right">{{getStatistik('ppid_pengajuan_keberatan', '01', date('Y'))}}</td>
                        </tr>
                        <tr>
                            <td align="left">FEBRUARI</td>
                            <td align="right">{{getStatistik('ppid_pengajuan_keberatan', '01', date('Y'))}}</td>
                        </tr>
                        <tr>
                            <td align="left">MARET</td>
                            <td align="right">{{getStatistik('ppid_pengajuan_keberatan', '02', date('Y'))}}</td>
                        </tr>
                        <tr>
                            <td align="left">APRIL</td>
                            <td align="right">{{getStatistik('ppid_pengajuan_keberatan', '03', date('Y'))}}</td>
                        </tr>
                        <tr>
                            <td align="left">MEI</td>
                            <td align="right">{{getStatistik('ppid_pengajuan_keberatan', '04', date('Y'))}}</td>
                        </tr>
                        <tr>
                            <td align="left">JUNI</td>
                            <td align="right">{{getStatistik('ppid_pengajuan_keberatan', '05', date('Y'))}}</td>
                        </tr>
                        <tr>
                            <td align="left">JULI</td>
                            <td align="right">{{getStatistik('ppid_pengajuan_keberatan', '06', date('Y'))}}</td>
                        </tr>
                        <tr>
                            <td align="left">AGUSTUS</td>
                            <td align="right">{{getStatistik('ppid_pengajuan_keberatan', '07', date('Y'))}}</td>
                        </tr>
                        <tr>
                            <td align="left">SEPTEMBER</td>
                            <td align="right">{{getStatistik('ppid_pengajuan_keberatan', '08', date('Y'))}}</td>
                        </tr>
                        <tr>
                            <td align="left">OKTOBER</td>
                            <td align="right">{{getStatistik('ppid_pengajuan_keberatan', '09', date('Y'))}}</td>
                        </tr>
                        <tr>
                            <td align="left">NOVEMBER</td>
                            <td align="right">{{getStatistik('ppid_pengajuan_keberatan', '11', date('Y'))}}</td>
                        </tr>
                        <tr>
                            <td align="left">DESEMBER</td>
                            <td align="right">{{getStatistik('ppid_pengajuan_keberatan', '12', date('Y'))}}</td>
                        </tr>
                        </tbody>
                        <tfoot>
                        <tr>
                            <td align="left"><b>JUMLAH</b></td>
                            <td align="right"><b></b></td>
                        </tr>
                        </tfoot>

                    </table>
                </div>
            </div>
        </div>

        <!-- <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <h3 class="panel-title">PPID</h3>
                </div>
                <div class="list-group">                
                    {{showmenu(0)}}
                </div>
            </div>
            <div id="grafik-permohonan">
                Grafik Permohonan
            </div>
        </div> -->
    </div>
</div>

{{View::make('portal.ppid_footer')}}

<script type="text/javascript">
    $(function () {
        $('#container').highcharts({
            data: {
                table: 'datatable',
                endRow: 12
            },
            chart: {
                type: 'line'
            },
            title: {
                text: 'Statistik Permohonan Informasi'
            },
            subtitle: {
                text: 'Informasi'
            },
            yAxis: {
                allowDecimals: false,
                title: {
                    text: 'JUMLAH'
                }
            },
            plotOptions: {
                series: {
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true,
                        format: '{point.y}'
                    }
                }
            },
            tooltip: {
                formatter: function () {
                    return '<b>' + this.series.name + '</b><br/>' +
                        this.point.y + ' ' + this.point.name.toLowerCase();
                }
            }
        });

        $('#container2').highcharts({
            data: {
                table: 'datatable2',
                endRow: 12
            },
            chart: {
                type: 'line'
            },
            title: {
                text: 'Statistik Pengajuan Keberatan'
            },
            subtitle: {
                text: 'Keberatan'
            },
            yAxis: {
                allowDecimals: false,
                title: {
                    text: 'JUMLAH'
                }
            },
            plotOptions: {
                series: {
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true,
                        format: '{point.y}'
                    }
                }
            },
            tooltip: {
                formatter: function () {
                    return '<b>' + this.series.name + '</b><br/>' +
                        this.point.y + ' ' + this.point.name.toLowerCase();
                }
            }
        });
    });
</script>