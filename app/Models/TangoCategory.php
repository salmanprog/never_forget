<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TangoCategory extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function enquiries()
    {
        return $this->hasMany(TangoEnquiry::class, 'tango_category_id');
    }
}
