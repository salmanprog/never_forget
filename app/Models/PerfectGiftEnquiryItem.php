<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerfectGiftEnquiryItem extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'perfect_gift_enquiry_items';

    public function perfectGift()
    {
        return $this->belongsTo(PerfectGiftCategory::class, 'perfect_gift_id');
    }

    public function enquiry()
    {
        return $this->belongsTo(PerfectGiftEnquiry::class, 'enquiry_id');
    }
}
