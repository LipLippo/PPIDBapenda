<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['id','category','user_id','role_id'];
     public static function get_select_multi($id = 'asa',$selected=""){
        $h = "<select id='$id' name='$id' style='width:100%' class='multi_kat' data-placeholder='Ketikkan Nama Kategori' multiple required>";
        $prov = DB::table('category')
                ->orderBy('category','asc')->get();
        foreach($prov as $p){
            if(is_array($selected)){
                $s = (in_array($p->id, $selected))?' selected ':'';
            }else{
                $s='';
            }
            $h .= '<option '.$s.' value="'.$p->id.'">'.$p->category.'</option>';
        }
        $h .= '</select>';
        return $h;
    }        
}

