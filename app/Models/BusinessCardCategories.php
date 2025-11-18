<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BusinessCardCategories extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];

    public function hasCreatedBy()
    {
        return $this->hasOne(User::class, 'id', 'created_by');
    }

    public function hasParent()
    {
        return $this->hasOne(BusinessCardCategories::class, 'id', 'parent_id');
    }

    public function businessCards()
    {
        return $this->hasMany(BusinessCard::class, 'category_id', 'id');
    }
}
