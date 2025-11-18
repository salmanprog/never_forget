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
        'first_name',
        'last_name',
        'email',
        'phone',
        'type',
        'invite_token',
        'is_active',
        'invited_at',
        'joined_at'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'invited_at' => 'datetime',
        'joined_at' => 'datetime'
    ];

    /**
     * Get the company that owns this employee/client
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * Generate a unique invite token
     */
    public static function generateInviteToken()
    {
        do {
            $token = Str::random(32);
        } while (static::where('invite_token', $token)->exists());
        
        return $token;
    }
}
