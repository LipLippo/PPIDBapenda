<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statistikperizinan extends Model
{
    use HasFactory;
    protected $table = 'statistik_perizinan';
    protected $fillable = ['id','title','xaxis','yaxis','label','value','flag','tanggal','user_id','role_id'];

}
