</main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col text-center footer-contact">
            <!-- <h3>Medilab</h3> -->
            <img src="{{url('portal/img/logo.png')}}" width="88" />
            <p class="mt-2">
              BAPENDA Prov. Jateng<br>
              Badan Pengelolaan Pendapatan Daerah<br>
              Provinsi Jawa Tengah
            </p>
          </div>

        </div>
      </div>
    </div>

      <div class="container py-4">
        <div class="text-center">
          Copyright © 2022. Badan Pengelola Pendapatan Daerah Provinsi Jawa Tengah.
        </div>
      </div>
    </div>
  </footer><!-- End Footer -->

  <!-- <div id="preloader">
    <img src="{{url('portal/img/logo.png')}}" width="88" />
  </div> -->
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <!-- <script src="urls/vendor/purecounter/purecounter.js"></script> -->
  <script src="{{url('portal/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <!-- <script src="urls/vendor/glightbox/js/glightbox.min.js"></script> -->
  <!-- <script src="urls/vendor/swiper/swiper-bundle.min.js"></script> -->
  <!-- <script src="urls/vendor/php-email-form/validate.js"></script> -->

  <!-- Template Main JS File -->
  <script src="{{url('portal/js/main.js')}}"></script>

  <script type="text/javascript" src="{{url('portal/js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{url('portal/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{url('portal/plugin/camera/scripts/jquery.easing.1.3.js')}}"></script>
    <script type="text/javascript" src="{{url('portal/plugin/camera/scripts/jquery.mobile.customized.min.js')}}"></script>
    <script type="text/javascript" src="{{url('portal/plugin/camera/scripts/camera.min.js')}}"></script>
    <script type="text/javascript" src="{{url('portal/plugin/wow/wow.min.js')}}"></script>
    <script type="text/javascript" src="{{url('portal/js/jquery.share.js')}}"></script>
    <script type="text/javascript" src="{{url('portal/plugin/metismenu/metisMenu.min.js')}}"></script>
    <script type="text/javascript" src="{{url('portal/plugin/smartmenu/jquery.smartmenus.min.js')}}"></script>
    <script type="text/javascript" src="{{url('portal/plugin/smartmenu/jquery.smartmenus.bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{url('portal/plugin/timelinr/jquery.timelinr-0.9.6.js')}}"></script>
    <!-- <script type="text/javascript" src="{{url('packages/tugumuda/claravelportal/js/jquery.dataTables.min.js')}}"></script> -->
    <script type="text/javascript" src="{{url('portal/js/datatables.min.js')}}"></script>
    <!--<script type="text/javascript" src="{{url('packages/tugumuda/claravelportal/js/main.js')}}"></script>-->
    <!--CHART-->
    <script type="text/javascript" src="{{ url('packages/tugumuda/claravelportal/js/chart/highcharts.js') }}"></script>
    <script type="text/javascript" src="{{ url('packages/tugumuda/claravelportal/js/chart/highcharts-3d.js') }}"></script>
    <script type="text/javascript" src="{{ url('packages/tugumuda/claravelportal/js/chart/data.js') }}"></script>
    <script type="text/javascript" src="{{ url('packages/tugumuda/claravelportal/js/chart/exporting.js') }}"></script>
    <!--<script type="text/javascript" src="{{ url('packages/tugumuda/claravelportal/js/jquery.gdocsviewer.js') }}"></script>-->
    <!--CHART-->
    <script src="https://code.responsivevoice.org/responsivevoice.js?key=nulYJYgA"></script>
    <script>(function(d){var s = d.createElement("script");s.setAttribute("data-account", "2AoQe2qVIk");s.setAttribute("src", "https://cdn.userway.org/widget.js");(d.body || d.head).appendChild(s);})(document)</script><noscript>Please ensure Javascript is enabled for purposes of <a href="https://userway.org">website accessibility</a></noscript>
    <script>
      wow = new WOW(
        {
          boxClass:     'wow',      // default
          animateClass: 'animated', // default
          offset:       0,          // default
          mobile:       false,       // default
          live:         false        // default
        }
      )
      wow.init();
    </script>

    <!-- Camera Slider -->
    <script>
      jQuery(function(){
        jQuery('#slider1').camera({
          height: '515px',
          loader: 'bar',
          pagination: true,
          thumbnails: false
        });
      });
    </script>

    <!-- Slick Slider -->
    <script type="text/javascript" src="{{url('portal/js/slick.min.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.datatablejs').dataTable();
       
        // Tambah class untuk top nav agar lebih kecil saat scroll ke bawah
          $(window).scroll(function(){
            if($(this).scrollTop()>55){
              $('#navigasi-utama').addClass('kecil');
            } else {
              $('#navigasi-utama').removeClass('kecil');
            }
          });    

        // Slick Carousel Global    
          $('.slick-carousel').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            dots: false,
            arrows: true,
            autoplay: true,
            autoplaySpeed: 3000,
            // appendArrows: $(".panah"),
            // prevArrow: '<i class="fa fa-fw fa-chevron-circle-left"></i>',
            // nextArrow: '<i class="fa fa-fw fa-chevron-circle-right"></i>',
            responsive: [
                {
                  breakpoint: 1024,
                  settings: {
                    arrows: false,
                    slidesToShow: 3,
                    slidesToScroll: 1
                  }
                },
                {
                  breakpoint: 768,
                  settings: {
                    arrows: false,
                    slidesToShow: 2,
                    slidesToScroll: 1
                  }
                },
                {
                  breakpoint: 480,
                  settings: {
                    arrows: false,
                    slidesToShow: 1,
                    slidesToScroll: 1
                  }
                }
            ]
          });
        
        // Headline Carousel
          $('.slick-carousel-1').slick({
            slidesToShow: 3,
            slidesToScroll: 3,
            dots: false,
            arrows: true,
            autoplay: true,
            autoplaySpeed: 10000,
            responsive: [
                {
                  breakpoint: 1024,
                  settings: {
                    arrows: false,
                    slidesToShow: 2,
                    slidesToScroll: 1
                  }
                },
                {
                  breakpoint: 480,
                  settings: {
                    arrows: false,
                    slidesToShow: 1,
                    slidesToScroll: 1
                  }
                }
            ]
          });

            $(function () {
                $('#container').highcharts({
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
                        <?php $rschart = DB::table('statistik_perizinan')->orderBy('tanggal', 'desc')->first();?>
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
                                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black',
                                    width: '160px'
                                }
                            }
                        }
                    }
                });

                <?php $kat = DB::table('statistik_realisasi')->orderBy('id')->first();
                $rschart2 = DB::table('statistik_realisasi')->where('kategori', @$kat->kategori)->orderBy('tanggal', 'desc')->first(); ?>
                chart2('{{$rschart2->title}}');
            });

            function chart2(judul=''){
                  $('#container2').highcharts({
                      data: {
                          table: 'datatable2',
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
                          <?php //$rschart2 = \DB::table('statistik_realisasi')->first();?>
                          text: judul
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
                                      color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black',
                                      width: '150px'
                                  }
                              }
                          }
                      }
                  });
                }

            $('#jenisrealisasi').on('change', function(){
              val = $(this).val();
              $.ajax({
                type: 'post',
                url:  '{{url('')}}/changechart',
                data: {'idchart' : val },
                success: function(res){
                  ret = JSON.parse(res);
                  $('#realisasi').html(ret.chart);
                  chart2(ret.title);
                }
              })
            });

            $('.bahasa').on('click', function(e){
                e.preventDefault();
                e.stopPropagation();
                var bahasa = $(this).attr('lang');
                $.ajax({
                    type: 'post',
                    url: '{{url('')}}/bahasa',
                    data: {'bahasa':bahasa, '_token': '{{csrf_token()}}'},
                    success:function(){
                        window.location.reload();
                    }
                });
            });

            <?php
                $cek = DB::table('pengumuman')->where('flag', 1)->orderBy('order', 'asc')->count();
                if($cek > 0){
                    if(Request::segment(1) == ''){
                        echo "getPengumuman(1);";
                    }
                }
            ?>

            /*$(document).ready(function() {
                $('a#embed').gdocsViewer({width: 700, height: 800});
            });*/
        });

        function claravel_modal_close(elemen){
            $('#' + elemen + '').modal('hide');
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove();
        }

        function claravel_modal(judul,isi,elemen){
            elemen = (elemen == '')?'modal2':elemen;
            $('#' + elemen + '').modal({ keyboard: true });
            $('#' + elemen + ' .modal-title').html(judul);
            $('#' + elemen + ' .modal-body').html(isi);
        }

        function getPengumuman(id){
            claravel_modal('Pengumuman','Loading...','main_modal');
            $.ajax({
                type:'post',
                url : '{{url('')}}/pengumuman',
                data: {'id': id, '_token' : '{{csrf_token()}}'},
                success:function(html){
                    $('#main_modal .modal-body').html(html);
                }
            });
        };
    </script>
     <script>
        // Metis Menu Folder
        $(function() {
            $('.metisFolder').metisMenu({
                toggle: false
            });
        });
    </script>

    <script>
        $(function(){
            $('#timeline').timelinr({
                arrowKeys: 'true'
            })
        });
    </script>

    // <!-- PrettyPhoto -->
    <script type="text/javascript" src="{{url('portal/js/jquery.prettyPhoto.js')}}" charset="utf-8"></script>
    <script type="text/javascript" charset="utf-8">
      $(document).ready(function(){
        $("a[rel^='prettyPhoto']").prettyPhoto();                
        $('#sharesocial').share({
            networks: ['email', 'pinterest', 'tumblr', 'googleplus', 'digg', 'in1', 'facebook', 'twitter', 'linkedin', 'stumbleupon'],
            theme: 'square'
        });    
      });
    </script>

</body>

</html>