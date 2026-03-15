{{View::make('portal.header')}}
<section id="page-heading" style="background-image:url({{asset('/assets/images/simpanglima.jpg')}})">
    
    <br>
    <br>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <ul class="breadcrumb">
                    <li><a href="{{url()}}">Beranda</a></li>
                    <li><a href="{{url()}}/investasi">investasi</a></li>
                    <li class="active">Sektoral</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section id="isi-data">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="section-heading">Investasi - Sektoral</div>
            </div>
            <div class="col-xs-6 col-sm-2 featured-container wow fadeInDown" data-wow-offset="270">
                <a href="{{url()}}/investasi/sektoral/agriculture" class="featured-item">
                    <i class="fa fa-fw fa-pagelines fa-4x featured-item-icon"></i>
                    <span class="label featured-item-label">Agriculture</span>
                </a>
            </div>
            <div class="col-xs-6 col-sm-2 featured-container wow fadeInDown" data-wow-delay=".5s" data-wow-offset="270">
                <a href="#" class="featured-item">
                    <i class="fa fa-fw fa-bolt fa-4x featured-item-icon"></i>
                    <span class="label featured-item-label">Mining and<br>Energy</span>
                </a>
            </div>
            <div class="col-xs-6 col-sm-2 featured-container wow fadeInDown" data-wow-delay="1s" data-wow-offset="270">
                <a href="#" class="featured-item">
                    <i class="fa fa-fw fa-bank fa-4x featured-item-icon"></i>
                    <span class="label featured-item-label">Infrastructure</span>
                </a>
            </div>
            <div class="col-xs-6 col-sm-2 featured-container wow fadeInDown" data-wow-delay="1.5s" data-wow-offset="270">
                <a href="investasi-kabkota.php" class="featured-item">
                    <i class="fa fa-fw fa-cogs fa-4x featured-item-icon"></i>
                    <span class="label featured-item-label">Manufacture</span>
                </a>
            </div>
            <div class="col-xs-6 col-sm-2 featured-container wow fadeInDown" data-wow-delay="2s" data-wow-offset="270">
                <a href="investasi-kabkota.php" class="featured-item">
                    <i class="fa fa-fw fa-building-o fa-4x featured-item-icon"></i>
                    <span class="label featured-item-label">Property</span>
                </a>
            </div>
            <div class="col-xs-6 col-sm-2 featured-container wow fadeInDown" data-wow-delay="2.5s" data-wow-offset="270">
                <a href="investasi-kabkota.php" class="featured-item">
                    <i class="fa fa-fw fa-plane fa-4x featured-item-icon"></i>
                    <span class="label featured-item-label">Tourism</span>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <hr>
                <a href="investasi.php" class="btn btn-warning"><i class="glyphicon glyphicon-th-list"></i> Show all investment</a>
                <hr>
            </div>
        </div>
    </div>
</section>

{{View::make('portal.footer')}}