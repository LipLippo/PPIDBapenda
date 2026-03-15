{{View::make('portal.uppd_header',array(
                'url' => $url,
                'uppd' => $uppd,
                'uppd_id' => $uppd_id,
            ))}}

<br>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <ul class="breadcrumb">
                <li><a href="{{url('')}}">Beranda</a></li>
                <li class="active">{{ $uppd }} </li>
            </ul>
        </div>
        <!-- <div class="col-xs-12 col-sm-8 col-md-8 col-lg-9"> -->
        <div class="col-xs-12">
            <div class="artikel-items detail">
                <h1 class="artikel-judul detail">Beranda {{ $uppd }}</h1>
                <div class="artikel-isi">
                    <?php
                    $row = DB::table('uppd_main_menu')->where('title', 'like', '%beranda%')->where('role_id', $uppd_id)->first();
                        if (!empty($row)) {
                            echo $row->konten;
                        }
                    ?>
                </div>
            </div>
        </div>
       
    </div>
</div>

{{View::make('portal.uppd_footer')}}