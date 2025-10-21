<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CareerCategory extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded = [];

    public function hasCreatedBy()
    {
        return $this->hasOne(User::class, 'id', 'created_by');
    }

    public function careers()
    {
        return $this->hasMany(Career::class, 'career_category_id', 'id');
    }

}
