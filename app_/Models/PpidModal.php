<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PpidModal extends Model
{
    use HasFactory;
    protected $table = 'ppid_modal';
    protected $fillable = ['image','id'];
}
