<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tautan extends Model
{
    use HasFactory;
    protected $table = 'tautan';
    protected $fillable=['title','url','foto','order'];
}
