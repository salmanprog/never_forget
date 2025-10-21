<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CareerApplication extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function career()
    {
        return $this->belongsTo(Career::class, 'career_id', 'id');
    }
}
