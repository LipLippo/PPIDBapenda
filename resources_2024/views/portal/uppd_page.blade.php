<?php
    $page = DB::table('uppd_main_menu')->where('role_id', $uppd_id)->where('url', '=', $page_id)->where('status', '=', 1)->first();
    if(count(array($page) ) == 0){
        header("Location: ".url('')."/uppd-".$url);
        exit();
    }
?>

{{View::make('portal.uppd_header',array(
                'judul'=> $page->title,'type' => 'pages',
                'url' => $url,
                'uppd' => $uppd,
                'uppd_id' => $uppd_id,
            ))}}
<br>
<div class="container">
    <div class="row">
        <div class="col-xs-12">                        
            <ul vocab="http://schema.org/" typeof="BreadcrumbList" class="breadcrumb" id="bc1">
                <li property="itemListElement" typeof="ListItem" >
                    <a property="item" typeof="WebPage" href="{{url('')}}/uppd-{{$url}}">
                        <span property="name">{{$uppd}}</span></a>
                    <span property="position" content="1"></span>
                </li>
                <li property="itemListElement" typeof="ListItem">
                    <a property="item" typeof="WebPage" href="{{url('')}}/uppd-{{$url}}/page/{{$page_id}}">
                        <span property="name">{{$page->title}}</span></a>
                    <span property="position" content="2"></span>
                </li>
            </ul>
        </div>

        <!-- <div class="col-xs-12 col-sm-8 col-md-8 col-lg-9"> -->
        <div class="col-xs-12">
            <div class="artikel-items detail">
                <!-- <div class="artikel-waktu">
                    Diposkan &nbsp; 23 September 2016 &nbsp; 09.10 WIB &nbsp; oleh Sekretariat
                </div> -->
                <h1 class="artikel-judul detail">{{($page->id!=1)?$page->title:'Sambutan PPID Bapenda Prov. Jateng'}}</h1>
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
                            $arrreplace = array("replace",View::make('portal.ppid_sotk'),View::make('portal.sejarah'));
                            echo str_replace($arrsearch,$arrreplace,$page->konten);
                            // echo $page->konten;
                        ?>
                    @elseif($page->jenis_konten == 2)
                        <?php echo $page->konten1 ?>
                        <?php $filetype = substr($page->pdf, -3); ?>
                        @if(($filetype == 'pdf') or ($filetype == 'doc'))
                           
                            <object type="application/pdf" data="{{url('')}}/packages/upload/file/{{$page->pdf}}" width="100%" height="760px" id="preview-pdf"></object>
                        @elseif(($filetype == 'jpg') or ($filetype == 'png')){
                            
                            <img src="{{url('')}}/packages/upload/file/{{$page->pdf}}">
                        @else
                            File lampiran tidak tesedia
                        @endif
                       <?php echo $page->konten2 ?>
                    @else
                       <?php echo $page->konten ?>
                    @endif
                </div>
            </div>
        </div>

      
    </div>
</div>

{{View::make('portal.ppid_footer')}}