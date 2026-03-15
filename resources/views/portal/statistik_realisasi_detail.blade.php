
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
                <li property="itemListElement" typeof="ListItem" >
                    <a property="item" typeof="WebPage" href="{{url()}}/statistik_perizinan">
                        <span property="name">Statistik</span></a>
                    <span property="position" content="2"></span>
                </li>
                <li property="itemListElement" typeof="ListItem">
                    <a property="item" typeof="WebPage" href="#">
                        <span property="name">Detail Statistik Realisasi</span></a>
                    <span property="position" content="3"></span>
                </li>
            </ul>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-12">
            <?php
                $rschart = \DB::table('statistik_realisasi as a')->leftJoin('users as b', 'a.user_id', '=', 'b.id')->select('a.*', 'b.name')->where('a.id', $cat)->first();
                $label = explode(";",$rschart->label);
                $value = explode(";",$rschart->value);
                $n  =  count($label);
            ?>
            <div class="artikel-items detail">
                <div class="artikel-waktu">                    
                    Diposkan &nbsp; {{@tanggal($rschart->created_at)}} &nbsp; {{@jam(substr($rschart->created_at,11,5))}} WIB &nbsp; Oleh : {{@$rschart->name}} &nbsp; <a href="{{url()}}/statistik_realisasi"><i class="fa fa-fw fa-tag"></i> Statistik</a>
                </div>
                <h1 class="artikel-judul detail">Statistik Realisasi</h1>
                <div class="artikel-isi">
                    <div id="containers" style="min-width: 450px; height: 400px; margin: 0 auto"></div>
                    <table class="table table-hover" id='datatable' style="display: nones">
                        <thead>
                            <tr class="bg-primary">
                                <th width="90%">TAHUN</th>
                                <th class="text-right" width="10%">TOTAL PENDAPATAN</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php for($i = 0; $i < $n; $i++){?>
                            <tr>
                                <td class="text-left">{{$label[$i]}}</td>
                                <td class="text-right">{{$value[$i]}}</td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                
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
        $(function () {
            $('#containers').highcharts({
                data: {
                    table: 'datatable',
                    endRow: 19
                },
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie',
                    options3d: {
                        enabled: true,
                        alpha: 45,
                        beta: 0
                    }
                },
                title: {
                    text: '{{$rschart->title}}'
                },
                yAxis: {
                    allowDecimals: false,
                    title: {
                        text: ''
                    }
                },
                xAxis: {
                    labels:
                    {
                        enabled: false
                    }
                },
                exporting: {
                    enabled: false
                },
                tooltip: {
                    formatter: function () {
                        return '<b>' + this.point.name + '</b><br/> JUMLAH : ' +
                            this.point.y;
                    }
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        size: 200,
                        depth: 35,
                        //center: [150, 100],
                        dataLabels: {
                            enabled: true,
                            format: '<b>{point.name}</b>: {point.y} ',
                            style: {
                                color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                            }
                        }
                    }
                }
            });
        });
    })
</script>