<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BalloonsEnquiry extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'balloons_enquiry';

    public function items()
    {
        return $this->hasMany(BalloonEnquiryItem::class, 'enquiry_id');
    }
}
