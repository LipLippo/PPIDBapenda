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
                    <li><a href="{{url()}}/investasi">Investasi</a></li>
                    <li><a href="{{url()}}/investasi/sektoral">Sektoral</a></li>
                    <li class="active">Agriculture</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section id="isi-data">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="section-heading">Investasi - Sektoral Agriculture</div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3">
                <a href="{{url()}}/investasi/sektoral/agriculture/1" class="clearfix well well-sm featured-list-item">
                  <div class="col-xs-4">
                    <img src="{{asset('/assets/investasi/logo-kabupaten-tegal.png')}}" alt="" width="100%">
                  </div>
                  <div class="col-xs-8">
                    <h1>Cattle Farming in Tegal Regency</h1>
                  </div>
                </a>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3">
                <a href="{{url()}}/investasi/sektoral/agriculture/2" class="clearfix well well-sm featured-list-item">
                  <div class="col-xs-4">
                    <img src="{{asset('/assets/investasi/logo-kota-semarang.png')}}" alt="" width="100%">
                  </div>
                  <div class="col-xs-8">
                    <h1>Cattle Farming in Semarang Regency</h1>
                  </div>
                </a>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3">
                <a href="{{url()}}/investasi/sektoral/agriculture/3" class="clearfix well well-sm featured-list-item">
                  <div class="col-xs-4">
                    <img src="{{asset('/assets/investasi/logo-kota-salatiga.png')}}" alt="" width="100%">
                  </div>
                  <div class="col-xs-8">
                    <h1>Cattle Farming in Salatiga Regency</h1>
                  </div>
                </a>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3">
                <a href="{{url()}}/investasi/sektoral/agriculture/4" class="clearfix well well-sm featured-list-item">
                  <div class="col-xs-4">
                    <img src="{{asset('/assets/investasi/logo-kendal.png')}}" alt="" width="100%">
                  </div>
                  <div class="col-xs-8">
                    <h1>Cattle Farming in Kendal Regency</h1>
                  </div>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <hr>
                <a href="{{url()}}/investasi/sektoral" class="btn btn-primary"><i class="glyphicon glyphicon-chevron-left"></i> Back to List</a> &nbsp; 
                <a href="{{url()}}/investasi" class="btn btn-warning"><i class="glyphicon glyphicon-th-list"></i> Show all investment</a>
                <hr>
            </div>
        </div>
    </div>
</section>

{{View::make('portal.footer')}}