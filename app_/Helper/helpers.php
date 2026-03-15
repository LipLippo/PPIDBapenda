<?php
use Illuminate\Http\Request;
use App\Http\Controllers\PostsController;
use App\Models\Album;
use App\Models\Video;
use App\Models\Galeri;
use App\Models\Posts;

use Illuminate\Support\FacadesDB;



/*function menu atas PPID*/
function showmenuatas_ppid($id='0'){

    $rs = DB::table('ppid_main_menu')->where('status', 1)->where('id_parent',$id)->orderBy('order','asc');
    $num = $rs->count();
    $i = 0;
    $j = 0;
    foreach($rs->get() as $item){

        if($i == 0 and $id==0) echo "\n<ul>";
        if($i == 0 and $id>0) echo "\n<ul>";

        $i++;

        if ((strpos($item->url, 'http') !== false) or (strpos($item->url, 'www') !== false)) {
            $link = $item->url;
        }
		else{
            $link = url('').'/'.$item->url;
			dd(var_dump($item) );
        }

        $url = (($item->jenis_konten==3)?$link:((($item->jenis_konten==1) or ($item->jenis_konten==2))?url()."/page/".$item->url:"#"));
        $target = (($item->jenis_konten==3)?" target='". $item->target. "'":"");
        $cek = DB::table('ppid_main_menu')->where('id_parent',$item->id)->count();
        if($item->jenis_konten==0){
            // echo "<li data-sm-reverse='true'  class='dropdown'><a href='#'>".(($rolebahasa == 'en')?$item->title_english:$item->title)." <i class='bi bi-chevron-down'></i></a>";
			echo "<li data-sm-reverse='true'  class='dropdown'><a href='#'>".$item->title." <i class='bi bi-chevron-down'></i></a>";
        }else{
            // echo "<li><a href='$url' $target>".(($rolebahasa == 'en')?$item->title_english:$item->title)."</a>";
			echo "<li><a href='$url' $target>".$item->title."</a>";
        }
        $j++;
        showmenuatas2($item->id);
        echo "</li>";
        echo ((($cek > 0) and ($item->id_parent != 0))?'</li>':'');
        if($i == $num)echo "</ul>";
    }
}

function showmenuatas2_ppid($id='0'){
   $rs = DB::table('ppid_main_menu')->where('status',1)->where('id_parent',$id)->orderBy('order','asc');
    $num = $rs->count();
    $i = 0;
    $j = 0;
    foreach($rs->get() as $item){
        if($i == 0 and $id==0) echo "\n<ul>";
        if($i == 0 and $id>0) echo "\n<ul>";
        $i++;

        if ((strpos($item->url, 'http') !== false) or (strpos($item->url, 'www') !== false)) {
            $link = $item->url;
        }else{
            $link = url('').'/'.$item->url;
        }

        $url = (($item->jenis_konten==3)?$link:((($item->jenis_konten==1) or ($item->jenis_konten==2))?url('')."/ppid/page/".$item->url:"#"));
        $target = (($item->jenis_konten==3)?" target='". $item->target. "'":"");
        $cek = DB::table('ppid_main_menu')->where('id_parent',$item->id)->count();
        // if($item->jenis_konten==0){
        //     echo "<li data-sm-reverse='true' class='dropdown'><a href='#'>".(($rolebahasa == 'en')?$item->title_english:$item->title)." <i class='bi bi-chevron-right'></i></a>";
        // }else{
        //     echo "<li><a href='$url' $target>".(($rolebahasa == 'en')?$item->title_english:$item->title)."</a>";
        // }
		 if($item->jenis_konten==0){
            // echo "<li data-sm-reverse='true'  class='dropdown'><a href='#'>".(($rolebahasa == 'en')?$item->title_english:$item->title)." <i class='bi bi-chevron-down'></i></a>";
			echo "<li data-sm-reverse='true'  class='dropdown'><a href='#'>".$item->title." <i class='bi bi-chevron-right'></i></a>";
        }else{
            // echo "<li><a href='$url' $target>".(($rolebahasa == 'en')?$item->title_english:$item->title)."</a>";
			echo "<li><a href='$url' $target>".$item->title."</a>";
        }
        $j++;
        showmenuatas2_ppid($item->id);
        echo "</li>";
        echo ((($cek > 0) and ($item->id_parent != 0))?'</li>':'');
        if($i == $num)echo "</ul>";
    }
}

/*function menu atas*/
function showmenuatas($id='0'){
   
	 
	// $rolebahasa = Session::get('bahasa');
    // if($rolebahasa == 'en'){
    //     $rs = DB::table('main_menu')->where('status_english',1)->where('id_parent',$id)->orderBy('order','asc');
    // }else{
    //     $rs = DB::table('main_menu')->where('status',1)->where('id_parent',$id)->orderBy('order','asc');
    // }
	$rs = DB::table('main_menu')->where('status', 1)->where('id_parent',$id)->orderBy('order','asc');
    $num = $rs->count();
    $i = 0;
    $j = 0;
    foreach($rs->get() as $item){

        if($i == 0 and $id==0) echo "\n<ul>";
        if($i == 0 and $id>0) echo "\n<ul>";

        $i++;

        if ((strpos($item->url, 'http') !== false) or (strpos($item->url, 'www') !== false)) {
            $link = $item->url;
        }
		else{
            $link = url('').'/'.$item->url;
			dd(var_dump($item) );
        }

        $url = (($item->jenis_konten==3)?$link:((($item->jenis_konten==1) or ($item->jenis_konten==2))?url()."/page/".$item->url:"#"));
        $target = (($item->jenis_konten==3)?" target='". $item->target. "'":"");
        $cek = DB::table('main_menu')->where('id_parent',$item->id)->count();
        if($item->jenis_konten==0){
            // echo "<li data-sm-reverse='true'  class='dropdown'><a href='#'>".(($rolebahasa == 'en')?$item->title_english:$item->title)." <i class='bi bi-chevron-down'></i></a>";
			echo "<li data-sm-reverse='true'  class='dropdown'><a href='#'>".$item->title." <i class='bi bi-chevron-down'></i></a>";
        }else{
            // echo "<li><a href='$url' $target>".(($rolebahasa == 'en')?$item->title_english:$item->title)."</a>";
			echo "<li><a href='$url' $target>".$item->title."</a>";
        }
        $j++;
        showmenuatas2($item->id);
        echo "</li>";
        echo ((($cek > 0) and ($item->id_parent != 0))?'</li>':'');
        if($i == $num)echo "</ul>";
    }
}

function showmenuatas2($id='0'){
    // $rolebahasa = \Session::get('bahasa');
    // if($rolebahasa == 'en'){
    //     $rs = DB::table('main_menu')->where('status_english',1)->where('id_parent',$id)->orderBy('order','asc');
    // }else{
    //     $rs = DB::table('main_menu')->where('status',1)->where('id_parent',$id)->orderBy('order','asc');
    // }
	 $rs = DB::table('main_menu')->where('status',1)->where('id_parent',$id)->orderBy('order','asc');
    $num = $rs->count();
    $i = 0;
    $j = 0;
    foreach($rs->get() as $item){
        if($i == 0 and $id==0) echo "\n<ul>";
        if($i == 0 and $id>0) echo "\n<ul>";
        $i++;

        if ((strpos($item->url, 'http') !== false) or (strpos($item->url, 'www') !== false)) {
            $link = $item->url;
        }else{
            $link = url('').'/'.$item->url;
        }

        $url = (($item->jenis_konten==3)?$link:((($item->jenis_konten==1) or ($item->jenis_konten==2))?url('')."/page/".$item->url:"#"));
        $target = (($item->jenis_konten==3)?" target='". $item->target. "'":"");
        $cek = DB::table('main_menu')->where('id_parent',$item->id)->count();
        // if($item->jenis_konten==0){
        //     echo "<li data-sm-reverse='true' class='dropdown'><a href='#'>".(($rolebahasa == 'en')?$item->title_english:$item->title)." <i class='bi bi-chevron-right'></i></a>";
        // }else{
        //     echo "<li><a href='$url' $target>".(($rolebahasa == 'en')?$item->title_english:$item->title)."</a>";
        // }
		 if($item->jenis_konten==0){
            // echo "<li data-sm-reverse='true'  class='dropdown'><a href='#'>".(($rolebahasa == 'en')?$item->title_english:$item->title)." <i class='bi bi-chevron-down'></i></a>";
			echo "<li data-sm-reverse='true'  class='dropdown'><a href='#'>".$item->title." <i class='bi bi-chevron-right'></i></a>";
        }else{
            // echo "<li><a href='$url' $target>".(($rolebahasa == 'en')?$item->title_english:$item->title)."</a>";
			echo "<li><a href='$url' $target>".$item->title."</a>";
        }
        $j++;
        showmenuatas2($item->id);
        echo "</li>";
        echo ((($cek > 0) and ($item->id_parent != 0))?'</li>':'');
        if($i == $num)echo "</ul>";
    }



    
}

/*function menu atas UPPD*/
function showmenuatas_uppd($role_id, $url_uppd, $id='0'){

    // $url = Request::segment(1);
    // $uppd = strtoupper(str_replace('-', ' ', $url));
    // $roles = DB::table('roles')->where('name', $uppd)->first();
    // dd($roles->id);
    // $rolebahasa = \Session::get('bahasa');
    // if($rolebahasa == 'en'){
    //     $rs = DB::table('uppd_main_menu')->where('role_id', $role_id)->where('status_english',1)->where('id_parent',$id)->orderBy('order','asc');
    // }else{
    //     $rs = DB::table('uppd_main_menu')->where('role_id', $role_id)->where('status',1)->where('id_parent',$id)->orderBy('order','asc');
    // }
    $rs = DB::table('uppd_main_menu')->where('role_id', $role_id)->where('status',1)->where('id_parent',$id)->orderBy('id','asc');

    $num = $rs->count();
    $i = 0;
    $j = 0;
    foreach($rs->get() as $item){
        if($i == 0 and $id==0) echo "\n<ul>";
        if($i == 0 and $id>0) echo "\n<ul>";
        $i++;

        if ((strpos($item->url, 'http') !== false) or (strpos($item->url, 'www') !== false)) {
            $link = $item->url;
        }else{
            $link = url('').'/'.$item->url;
        }

        $url = (($item->jenis_konten==3)?$link:((($item->jenis_konten==1) or ($item->jenis_konten==2))?url('')."/uppd-".$url_uppd."/page/".$item->url:"#"));
        $target = (($item->jenis_konten==3)?" target='". $item->target. "'":"");
        $cek = DB::table('uppd_main_menu')->where('role_id', $role_id)->where('id_parent',$item->id)->count();
        if($item->jenis_konten==0){
            echo "<li data-sm-reverse='true'  class='dropdown'><a href='#'>$item->title <i class='bi bi-chevron-down'></i></a>";
        }else{
            if ($item->id == 1) {
                $url = '/uppd-'.$url;
            }
            echo "<li><a href='$url' $target>$item->title</a>";
        }
        $j++;
        showmenuatas2_uppd($item->id, $role_id, $url_uppd);
        echo "</li>";
        echo ((($cek > 0) and ($item->id_parent != 0))?'</li>':'');
        if($i == $num)echo "</ul>";
    }
}

function showmenuatas2_uppd( $id='0',$role_id, $url_uppd ){
   
//  dd($url_uppd);
    $rolebahasa = Session::get('bahasa');
    if($rolebahasa == 'en'){
        $rs = DB::table('uppd_main_menu')->where('role_id', $role_id)->where('status_english',1)->where('id_parent',$id)->orderBy('order','asc');
    }else{
        $rs = DB::table('uppd_main_menu')->where('role_id', $role_id)->where('status',1)->where('id_parent',$id)->orderBy('order','asc');
    }
    $num = $rs->count();
    $i = 0;
    $j = 0;
    foreach($rs->get() as $item){
        if($i == 0 and $id==0) echo "\n<ul>";
        if($i == 0 and $id>0) echo "\n<ul>";
        $i++;

        if ((strpos($item->url, 'http') !== false) or (strpos($item->url, 'www') !== false)) {
            $link = $item->url;
        }else{
            $link = url('').'/'.$item->url;
        }

        $url = (($item->jenis_konten==3)?$link:((($item->jenis_konten==1) or ($item->jenis_konten==2))?url('')."/uppd-".$url_uppd."/page/".$item->url:"#"));
        $target = (($item->jenis_konten==3)?" target='". $item->target. "'":"");
        $cek = DB::table('uppd_main_menu')->where('role_id', $role_id)->where('id_parent',$item->id)->count();
        if($item->jenis_konten==0){
            echo "<li data-sm-reverse='true' class='dropdown'><a href='#'>".(($rolebahasa == 'en')?$item->title_english:$item->title)." <i class='bi bi-chevron-right'></i></a>";
        }else{
            echo "<li><a href='$url' $target>".(($rolebahasa == 'en')?$item->title_english:$item->title)."</a>";
        }
        $j++;
        showmenuatas2_uppd($item->id, $role_id, $url_uppd);
        echo "</li>";
        echo ((($cek > 0) and ($item->id_parent != 0))?'</li>':'');
        if($i == $num)echo "</ul>";
    }
}
/*end function menu atas UPPD*/
function get_posts_by_cat($cat='',$take=5,$orderBy='id',$asc='asc'){
   
        return DB::table('posts')->where('category.category','=',$cat)
            ->leftjoin('users','users.id','=','posts.user_id')
            ->join('posts_cat','posts_cat.post_id','=','posts.id')
            ->join('category','category.id','=','posts_cat.cat_id')
            ->select('posts.*','users.name','category.category')
            ->where('publish',1)
            // ->groupBy('posts.id')
            ->orderBy($orderBy,$asc)
            ->take($take)->get();
    
    }
    function get_post($id=''){
    
        return DB::table('posts')->where('posts.id','=',$id)
            ->leftjoin('users','users.id','=','posts.user_id')
            ->select('posts.*','users.name')
            ->where('publish',1)
            ->first();
    

    }   
    function get_post_categories($id='',$with_id= false){
    $cat = DB::table('posts_cat as a')
        ->join('category as b','b.id','=','a.cat_id')
        ->where('a.post_id','=',$id)
        ->get();
    $arr_cat = array();
    foreach($cat as $c){
        if($with_id){
            $arr_cat[$c->cat_id] = $c->category;
        }else{
            $arr_cat[] = $c->category;
        }
    }
    return $arr_cat;
}

    function tanggal($date = 1){
    date_default_timezone_set('Asia/Jakarta'); // your reference timezone here
    $date = date('Y-m-d', strtotime($date)); // ubah sesuai format penanggalan standart
    $bulan = array ('01'=>'Januari', // array bulan konversi
        '02'=>'Februari',
        '03'=>'Maret',
        '04'=>'April',
        '05'=>'Mei',
        '06'=>'Juni',
        '07'=>'Juli',
        '08'=>'Agustus',
        '09'=>'September',
        '10'=>'Oktober',
        '11'=>'November',
        '12'=>'Desember'
    );
    $date = explode ('-',$date); // ubah string menjadi array dengan paramere '-'

    return $date[2] . ' ' . $bulan[$date[1]] . ' ' . $date[0]; // hasil yang di kembalikan}
}
function jam($date = 1){
    $dt = new DateTime($date);
    return $dt->format('H:i');
}

function getUtility($table, $where, $id, $field){
    $rs = DB::table($table)->where($where, $id)->first();
    if(count(array($rs)) > 0){
        return $rs->$field;
    }else{
        return "-";
    }
}

function get_album($id=''){
    return Album::where('album.id','=',$id)
        ->leftjoin('users','users.id','=','album.user_id')
        ->select('album.*','users.name')
        ->first();
}

function get_list_album($take=8){
    return Album::
        leftjoin('users','users.id','=','album.user_id')
        ->where('flag',1)
        ->select('album.*','users.name')
        ->groupBy('album.id')
        ->orderBy('album.id', 'DESC')
        ->paginate($take);
}
function get_list_video($take=8){
    return Video::
        leftjoin('users','users.id','=','video.user_id')
        ->select('video.*','users.name')
        ->groupBy('video.id')
        ->orderBy('video.id', 'DESC')
        ->paginate($take);
}

function get_galeri($album='',$take = 8){
    return Galeri::where('album.id','=',$album)
        ->leftjoin('users','users.id','=','galeri.user_id')
        ->join('album','album.id','=','galeri.id_album')
        ->select('galeri.*','users.name','album.album')
        ->groupBy('galeri.id')
        ->paginate($take);
}

function get_posts_paginate_by_cat($cat='',$take=5,$by='created_at',$order='desc'){
    return Posts::where('category.category','=',$cat)
        ->leftjoin('users','users.id','=','posts.user_id')
        ->join('posts_cat','posts_cat.post_id','=','posts.id')
        ->join('category','category.id','=','posts_cat.cat_id')
        ->select('posts.*','users.name','category.category')
        ->where('publish',1)
        // ->groupBy('posts.id')
        ->orderBy($by,$order)
        ->paginate($take);
}
function formatTanggalPanjang($tanggal) {
    $aBulan = array(1=> "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
    list($thn,$bln,$tgl)=explode("-",$tanggal);
    $bln = (($bln >0 ) && ($bln < 10))? substr($bln,1,1): $bln ;
    return $tgl." ".$aBulan[$bln]." ".$thn;
}

function getmodal($orderBy='id',$asc='asc'){
   
        return DB::table('modal')
            ->select('modal.*')
            ->where('publish',1)
            // ->groupBy('posts.id')
            ->orderBy($orderBy,$asc)
            ->get();
    
    }
function getmodalppid($orderBy='id',$asc='asc'){
   
        return DB::table('ppid_modal')
            ->select('ppid_modal.*')
            ->where('publish',1)
            // ->groupBy('posts.id')
            ->orderBy($orderBy,$asc)
            ->get();
    
    }
function getsejarah($orderBy='id',$asc='desc'){
   
        return DB::table('sotk_sejarah')
            ->select('sotk_sejarah.*')
            ->where('flag',1)
            // ->groupBy('posts.id')
            ->orderBy($orderBy,$asc)
            ->get();
    
    }
    
