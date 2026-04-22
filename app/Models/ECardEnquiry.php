<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ECardEnquiry extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'e_card_enquiries';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function eCardCategory()
    {
        return $this->belongsTo(ECardCategory::class, 'e_card_category_id');
    }
}
