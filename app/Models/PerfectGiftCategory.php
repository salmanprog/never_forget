<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerfectGiftCategory extends Model
{
    use HasFactory;
    protected $table = 'perfect_gift_category';
    protected $guarded = ['id'];
}
