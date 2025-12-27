<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class BalloonEnquiryItem extends Model
{
    use HasFactory;

    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'balloon_enquiry_items';

    public function balloon()
    {
        return $this->belongsTo(BalloonsCategory::class, 'balloon_id');
    }

    public function enquiry()
{
    return $this->belongsTo(BalloonsEnquiry::class, 'enquiry_id');
}
}
