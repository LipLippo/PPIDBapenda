{{View::make('portal.ppid_header')}}

<br>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <ul class="breadcrumb">
                <li><a href="{{url('ppid_bapenda')}}">Beranda</a></li>
                <li class="active">PPID Bapenda Prov. Jateng</li>
            </ul>
        </div>
        <?php $rssliders = DB::table('ppid_image_slider')->where('flag_portal', 1)->orderBy('order', 'asc')->get(); ?>
        @if(count($rssliders) > 0)
        <div class="col-md-12">
            <div class="camera_wrap camera_orange_skin" id="slider1">
                @foreach($rssliders as $rsslider)
                <div data-src="{{asset('/packages/upload/slider/'.$rsslider->img)}}">
                    <div class="camera_caption fadeIn">
                        {{$rsslider->caption}}
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif
        
        @if(request()->dev != 1)
        <div class="col-xs-12">
        <video autoplay muted loop id="video-bg-ppid" style="width:100%" controls>
            <source src="{{ asset('portal/video/ppid-video.mp4') }}" type="video/mp4" />
        </video>
        </div>
        @endif

        {{-- ===== BUTTON KATEGORI INFORMASI ===== --}}
        <div class="col-xs-12" style="margin: 30px 0;">
            <style>
                .ppid-card-grid {
                    display: flex;
                    flex-wrap: wrap;
                    gap: 16px;
                    justify-content: center;
                }
                .ppid-card {
                    background: #ffffff;
                    border-radius: 12px;
                    border: 1.5px solid #c8dff5;
                    box-shadow: 0 4px 16px rgba(71,140,207,0.15);
                    padding: 30px 20px;
                    text-align: center;
                    flex: 1 1 160px;
                    max-width: 200px;
                    cursor: pointer;
                    text-decoration: none;
                    color: inherit;
                    transition: transform 0.2s, box-shadow 0.2s, border-color 0.2s;
                    display: block;
                }
                .ppid-card:hover {
                    transform: translateY(-4px);
                    box-shadow: 0 8px 24px rgba(71,140,207,0.30);
                    border-color: #478ccf;
                    text-decoration: none;
                    color: inherit;
                }
                .ppid-card-icon {
                    width: 70px;
                    height: 70px;
                    background-color: #478ccf;
                    border-radius: 50%;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    margin: 0 auto 18px auto;
                }
                .ppid-card-icon i {
                    font-size: 28px;
                    color: #fff;
                    line-height: 1;
                }
                .ppid-card-title {
                    font-weight: 700;
                    font-size: 14px;
                    color: #222;
                    margin-bottom: 8px;
                }
                .ppid-card-desc {
                    font-size: 12px;
                    color: #888;
                    line-height: 1.5;
                }
            </style>

            <div class="ppid-card-grid">
                <a href="{{ url('ppid_bapenda/informasi-berkala') }}" class="ppid-card">
                    <div class="ppid-card-icon">
                        <i class="fa fa-list-alt"></i>
                    </div>
                    <div class="ppid-card-title">Informasi Berkala</div>
                    <div class="ppid-card-desc">Informasi publik yang diumumkan secara berkala</div>
                </a>

                <a href="{{ url('ppid_bapenda/informasi-setiap-saat') }}" class="ppid-card">
                    <div class="ppid-card-icon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <div class="ppid-card-title">Informasi Setiap Saat</div>
                    <div class="ppid-card-desc">Informasi publik yang tersedia setiap saat</div>
                </a>

                <a href="{{ url('ppid_bapenda/informasi-serta-merta') }}" class="ppid-card">
                    <div class="ppid-card-icon">
                        <i class="fa fa-check-circle"></i>
                    </div>
                    <div class="ppid-card-title">Informasi Serta Merta</div>
                    <div class="ppid-card-desc">Informasi penting yang diumumkan segera</div>
                </a>

                <a href="{{ url('ppid_bapenda/informasi-dikecualikan') }}" class="ppid-card">
                    <div class="ppid-card-icon">
                        <i class="fa fa-lock"></i>
                    </div>
                    <div class="ppid-card-title">Informasi Dikecualikan</div>
                    <div class="ppid-card-desc">Informasi yang tidak dapat dipublikasikan</div>
                </a>

                <!--<a href="{{ url('ppid_bapenda/pengadaan-barang-jasa') }}" class="ppid-card">
                     <div class="ppid-card-icon"> 
                        <i class="fa fa-bullhorn"></i>
                    </div>
                    <div class="ppid-card-title">Pengadaan Barang/Jasa</div>
                    <div class="ppid-card-desc">Informasi pengadaan barang dan jasa</div>
                </a>
            </div>-->
        </div>
        {{-- ===== END BUTTON KATEGORI ===== --}}
        
        <div class="col-xs-12">
            <div class="artikel-items detail">
                <h1 class="artikel-judul detail">Sambutan PPID Bapenda Prov. Jateng</h1>
                <div class="artikel-isi">
                    <?php
                    $row = DB::table('ppid_main_menu')->where('id', 1)->first();
                        echo $row->konten;
                    ?>
                </div>
            </div>
        </div>
      
    </div>
</div>
<script>
    if (window.location.href.includes('/bapenda2025/public/ppid_bapenda')) {
        window.location.href = 'https://ppid.bapenda.jatengprov.go.id/ppid_bapenda';
    }
</script>

{{View::make('portal.ppid_footer')}}