<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerfectGiftEnquiry extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'perfect_gift_enquiry';

    public function items()
    {
        return $this->hasMany(PerfectGiftEnquiryItem::class, 'enquiry_id');
    }
}
