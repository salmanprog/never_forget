<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GreetingsAppreciation extends Model
{
    use HasFactory;

    protected $table = 'greetings_appreciation';

    protected $guarded = ['id'];

    public function items()
    {
        return $this->hasMany(GreetingsAppreciationEnquiryItem::class, 'enquiry_id');
    }
}
