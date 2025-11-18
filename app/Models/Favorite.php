<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Favorite extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];
    
    public function hasImage(){
        return $this->hasOne(Product::class, 'slug', 'product_slug');
    }

    
}
