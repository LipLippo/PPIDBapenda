@extends('layouts.app')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div> --}}
<div class="layout-px-spacing">

    <div class="row layout-top-spacing">

        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-chart-one">
                <div class="widget-heading">
                    <h5 class="">STATISTIK </h5>
                    <div class="task-action">
                        {{-- <div class="dropdown">
                            <a class="dropdown-toggle" href="#" role="button" id="pendingTask" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="pendingTask" style="will-change: transform;">
                                <a class="dropdown-item" href="javascript:void(0);">Weekly</a>
                                <a class="dropdown-item" href="javascript:void(0);">Monthly</a>
                                <a class="dropdown-item" href="javascript:void(0);">Yearly</a>
                            </div>
                        </div> --}}
                    </div>
                </div>

                <div class="widget-content">
                    <div id="charts"></div>
                </div>
            </div>
        </div>
    </div>

</div>
 <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <?php
    // $count = DB::table('posts')
    // ->select('count(id)')
    // ->whereYear('tgl_publish')
    // ->whereMonth('tgl_publish')
    // ->groupBy('tgl_publish')
    // ->get();
   

    // echo $count;
    // select year(tgl_publish),month(tgl_publish),count(id)
    //  from posts
    //       group by year(tgl_publish),month(tgl_publish)
   
    ?>
  <script>
        var options = {
          series: [{
          name: 'POSTS',
          data: [1, 5, 10, 0, 5, 28, 30, 1, 1, 2, 5, 15]
        
        //   data: [{{ $count }} ]
        }],
          chart: {
          height: 350,
          type: 'area'
        },
        dataLabels: {
          enabled: false
        },
        stroke: {
          curve: 'smooth'
        },
        xaxis: {
          type: 'Month',
          categories: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"]
        },
        tooltip: {
          x: {
            format: 'dd/MM/yy '
          },
        },
        };

        var chart = new ApexCharts(document.querySelector("#charts"), options);

        chart.render();
  </script>

@endsection
