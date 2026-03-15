{{View::make('portal.header')}}
<section id="page-heading" style="background-image:url({{asset('/assets/investasi/simpanglima.jpg')}})">

    <br>
    <br>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <ul class="breadcrumb">
                    <li><a href="{{ url() }}">Beranda</a></li>
                    <li class="active"><a href="{{ url() }}/sarpras">Sarpras Pendukung</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>

<?php
    $parent  = $id;
    $sarpra  = \DB::table('ms_sarpras')->where('id', $parent)->first();
	$sarpras = \DB::table('ms_sarpras')->where('parent', $parent)->get();
?>

<section id="isi-data">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="section-heading">Sarana dan Prasarana Pendukung</div>
                <h3>{{$sarpra->jenis_sarpras}}</h3>
            </div>

            <?php 
            	foreach($sarpras as $sp){ 
            		$label = str_replace(' ', '<br/>', $sp->jenis_sarpras);
            ?>
		            <div class="col-xs-6 col-sm-2 featured-container wow fadeInDown" data-wow-offset="270">
		                <a href="{{url().'/sarpras/'.$sarpra->id.'/'.$sp->id}}" class="featured-item">
		                    <i class="{{ $sp->icon }}"></i>
		                    <span class="label featured-item-label">{{ $label }}</span>
		                </a>
		            </div>
		    <?php 
		    	}
		    ?>
            
        </div>
        <div class="row">
            <div class="col-md-12">
                <hr>
            </div>
        </div>
    </div>
</section>

{{View::make('portal.footer')}}