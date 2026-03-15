<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imageslider extends Model
{
    use HasFactory;
    protected $table= 'image_slider';
    protected $fillable = ['id','img','flag','flag_portal','order','caption','user_id','role_id'];
}
