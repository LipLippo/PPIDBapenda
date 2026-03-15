<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Mainmenu extends Model
{
    use HasFactory;
    protected $table = 'main_menu';
    protected $fillable = [
        'id','title','title_english','id_parent','jenis_konten','konten','konten_english','pdf','konten1','konten1_english','konten2','konten2_english','url','target','status','status_english','order','user_id','role_id'
    ];

    
}

 
