<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mainmenuppid extends Model
{
    use HasFactory;
    protected $table = 'ppid_main_menu';
    protected $fillable = [
        'id','title','id_parent','jenis_konten','konten','pdf','konten1','konten2','url','target','status','order','user_id','role_id'
    ];
}
