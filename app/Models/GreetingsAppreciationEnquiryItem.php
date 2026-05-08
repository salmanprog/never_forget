<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GreetingsAppreciationEnquiryItem extends Model
{
    use HasFactory;

    protected $table = 'greetings_appreciation_enquiry_items';

    protected $guarded = ['id'];

    public function category()
    {
        return $this->belongsTo(GreetingsAppreciationCategory::class, 'greetings_appreciation_category_id');
    }

    public function enquiry()
    {
        return $this->belongsTo(GreetingsAppreciation::class, 'enquiry_id');
    }
}
