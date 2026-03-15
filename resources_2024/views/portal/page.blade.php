<script type="text/javascript">
	 $(".datablejs.nosorting").DataTable({ "ordering":false });
</script>

<?php
    $rolebahasa = Session::get('bahasa');
    // $url = request()->segment(2);
    $page = DB::table('main_menu')->where('url', '=', $url)->where('status', '=', 1)->first();
    
    if(count(array($page)) == 0){
        header("Location: ".url(''));
        exit();
    }
    // echo $page;
 
    // if($rolebahasa == 'en'){
    //     $menu = \DB::table('main_menu')->where('id_parent', '=', $page->id_parent)->where('status_english', '=', 1)->orderBy('order')->get();
    // }else{
    //     $menu = \DB::table('main_menu')->where('id_parent', '=', $page->id_parent)->where('status', '=', 1)->orderBy('order')->get();
    // }
    // echo 
    $id_parent= $page->id_parent;
    $menu = DB::table('main_menu')->where('id_parent', '=',$id_parent )->where('status', '=', 1)->orderBy('order')->get();
    $nmamenu = getUtility('main_menu', 'id', $id_parent, ($rolebahasa == 'en')?'title_english':'title');
?>

{{View::make('portal.header',array('judul'=> $page->title,'type' => 'pages'))}}
<br>
<div class="container">
    <div class="row">
        <div class="col-xs-12">                        
            <ul vocab="http://schema.org/" typeof="BreadcrumbList" class="breadcrumb" id="bc1">
                <li property="itemListElement" typeof="ListItem" >
                    <a property="item" typeof="WebPage" href="{{url('')}}">
                        <span property="name">Beranda </span></a>
                    <span property="position" content="1"></span>
                </li>
                <li property="itemListElement" typeof="ListItem">
                    <a property="item" typeof="WebPage" href="{{url('')}}/page/{{$url}}">
                        <span property="name">{{($rolebahasa == 'en')?$page->title_english:$page->title}}</span></a>
                    <span property="position" content="2"></span>
                </li>
            </ul>
        </div>
        
        @if($id_parent != 0)
        <div class="col-xs-12">
        @else
        <div class="col-xs-12">
        @endif
            <div class="artikel-items detail">
                <!-- <div class="artikel-waktu">
                    Diposkan &nbsp; 23 September 2016 &nbsp; 09.10 WIB &nbsp; oleh Sekretariat
                </div> -->
                <h1 class="artikel-judul detail">{{($rolebahasa == 'en')?$page->title_english:$page->title}}</h1>
                <!--<figure>
                    <img src="assets/images/headline03.jpg" alt="Bupati Kudus Sebut Kudus Trade Show untuk Akselerasi Produktivitas UMKM " width="100%">
                    <figcaption>
                        <p>keterangan gambar</p>
                    </figcaption>
                </figure>-->
                <div class="artikel-isi">
                   
                    @if($page->jenis_konten == 1)
                        <?php
                            $arrsearch = array("search","[struktur organisasi]","[sejarah bapenda]");
                            $arrreplace = array("replace",View::make('portal.sotk'),View::make('portal.sejarah'));
                            echo str_replace($arrsearch,$arrreplace,($rolebahasa == 'en')?$page->konten_english:$page->konten);
                            // echo str_replace($page->konten);
                        ?>
                         
                    @elseif($page->jenis_konten == 2)
                        {{($rolebahasa == 'en')?$page->konten1_english:$page->konten1}}
                        <?php $filetype = substr($page->pdf, -3); ?>
                        @if(($filetype == 'pdf') or ($filetype == 'doc'))
                           
                            <object type="application/pdf" data="{{url('')}}/packages/upload/file/{{$page->pdf}}" width="100%" height="760px" id="preview-pdf"></object>
                        @elseif(($filetype == 'jpg') or ($filetype == 'png')){
                            
                            <img src="{{url('')}}/packages/upload/file/{{$page->pdf}}">
                        @else
                            File lampiran tidak tesedia
                        @endif
                        {{($rolebahasa == 'en')?$page->konten2_english:$page->konten2}}
                    @else
                        {{($rolebahasa == 'en')?$page->konten_english:$page->konten}}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

{{View::make('portal.footer')}}