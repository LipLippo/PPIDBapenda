<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imagesliderppid extends Model
{
    use HasFactory;
    protected $table = 'ppid_image_slider';
    protected $fillable =['img','caption','flag','flag_portal','order','user_id','role_id'];
}
