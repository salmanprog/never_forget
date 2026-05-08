<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ECardCategory extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function enquiries()
    {
        return $this->hasMany(ECardEnquiry::class, 'e_card_category_id');
    }
}
