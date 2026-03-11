<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class CompanyEmployee extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'type',
        'client_status',
        'client_since',
        'department',
        'employee_id',
        'job_title',
        'hire_date',
        'employment_status',
        'first_name',
        'last_name',
        'email',
        'phone',
        'shipping_address',
        'city',
        'state',
        'zip',
        'date_of_birth',
        'work_anniversary_date',
        'favorite_color',
        'hobbies',
        'dietry_restriction',
        'budget_range',
        'gift_preferences',
        'occasion',
        'gift_send_date',
        'payment_method',
        'tracking_number',
        'delivery_notes',
        'delivery_status',
        'notes',
        'invite_token',
        'is_active',
        'invited_at',
        'joined_at'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'date_of_birth' => 'date',
        'hire_date' => 'date',
        'gift_send_date' => 'date',
        'work_anniversary_date' => 'date',
        'invited_at' => 'datetime',
        'joined_at' => 'datetime'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public static function generateInviteToken()
    {
        do {
            $token = Str::random(32);
        } while (static::where('invite_token', $token)->exists());

        return $token;
    }
}
