<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BalloonsCategory extends Model
{
    use HasFactory;
    protected $table = 'balloons_category';
    protected $guarded = ['id'];

    public function quantity()
    {
        return $this->hasMany(BalloonsEnquiry::class, 'balloon_id');
    }
}
