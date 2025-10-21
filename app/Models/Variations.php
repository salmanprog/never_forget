<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Variations extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];

    public function hasCreatedBy()
    {
        return $this->hasOne(User::class, 'id', 'created_by');
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function hasCategory()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
}


