
  // Tambah class untuk top nav agar lebih kecil saat scroll ke bawah
  // $(window).scroll(function(){
  //   if($(this).scrollTop()>55){
  //     $('nav.navbar.navbar-fixed-top').addClass('kecil');
  //   } else {
  //     $('nav.navbar.navbar-fixed-top').removeClass('kecil');
  //   }
  // });

  $(document).ready(function(){
    // Ajax menu
    //$('#utama').load('contoh.php');
    // Sidebar navigation
    $('aside nav ul li a').click(function(){
        var str = laravel_base +  $(this).attr('href');
        var n = str.search("dashboard");
        if(n > 0){
            
        }
        else{
            $.ajax({
                url: $(this).attr('href'),
                type: "GET",
                dataType: "html",
                beforeSend: function(){
                    $('#utama').fadeOut(300);
                    $("#utama").html("<br><br><br><h3>Memuat Halaman...</h3>");
                },
                success: function(html){
                    $('#utama').fadeIn(10);
                    $("#utama").html(html);
                    $('select').select2({
                        width: 250
                    });                    
                }
            });
            $("aside nav ul li a").removeClass("aktif");
            $(this).addClass("aktif");
            return false;            
        }
    });

    // Show sidebar
    function showSidebar(){
        $('#bungkus').removeClass('sidebarHide');
        $('#bungkus').addClass('sidebarShow');
    }

    // Hide sidebar
    function hideSidebar(){
        $('#bungkus').removeClass('sidebarShow');
        $('#bungkus').addClass('sidebarHide');
    }

    // Button Show/Hide
    $('#tombol-menu').click(function(e){
        e.preventDefault();
        if ( $('#bungkus').hasClass('sidebarShow') ){
            hideSidebar();
        }
        else {
            showSidebar();
        }
    });

    // Sidebar Submenu
    $("#accordion h3").click(function(){
      // slide up all the link lists
      $("#accordion ul ul").slideUp(700,'easeInOutElastic');

      // slide down the link list below the h3 clicked - only if its closed
      if($(this).next("ul").is(":visible") == false){
        $("#accordion h3").removeClass("aktif");
        $(this).next("ul").slideDown(1000,'easeInOutElastic');
        $(this).addClass("aktif");
      }
    });
    
    // Sidebar Scroller
    $('.nano').nanoScroller({
      preventPageScrolling: true
    });
    $("#main").find('.description').load("readme.html", function(){
      $(".nano").nanoScroller();
    });


    
  });

$(".dataTables_wrapper .dataTables_filter label input").addClass("form-control");
$(".dataTables_wrapper .dataTables_filter label select").addClass("form-control");


