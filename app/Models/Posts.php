<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;
    protected $table = 'posts';
    protected $fillable = [
        'isadmin', 'titel','titel_english','desc','desc_english','url', 'content','content_english','fav','headline','publish','publish_english','tgl_publish','view','response','hits','user_id','role_id',
    ];
}

