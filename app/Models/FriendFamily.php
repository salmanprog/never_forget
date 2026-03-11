<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FriendFamily extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'recipient_first_name',
        'recipient_last_name',
        'relationship_with_client',
        'email',
        'phone',
        'occasion',
        'occasion_date',
        'gift_preferences',
        'favorite_color',
        'dietry_restrictions',
        'budget',
        'address',
        'city',
        'state',
        'zip',
        'delivery_date',
        'delivery_note',
        'message_with_gift',
        'payment_method',
        'tracking_number',
        'delivery_status',
        'notes',
    ];

    protected $casts = [
        'occasion_date' => 'date',
        'delivery_date' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
