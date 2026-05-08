<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Enquires extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'enquires';
    protected $guarded = [];

    /**
     * Boot the model.
     */
    protected static function boot()
    {
        parent::boot();
    
        static::creating(function ($model) {
            if (!empty($model->name) && empty($model->slug)) {
                $model->slug = Str::slug($model->name);
            }
        });
    
        static::updating(function ($model) {
            if ($model->isDirty('name')) {
                $model->slug = Str::slug($model->name);
            }
        });
    }
    
}
