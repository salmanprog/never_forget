<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Occasion extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'company_id',
        'type',
        'title',
        'occasion_date',
        'notes',
        'is_recurring'
    ];

    protected $casts = [
        'occasion_date' => 'date',
        'is_recurring' => 'boolean'
    ];

    /**
     * Get the user that owns this occasion
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the company that owns this occasion
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * Scope for personal occasions
     */
    public function scopePersonal($query)
    {
        return $query->where('type', 'personal');
    }

    /**
     * Scope for professional occasions
     */
    public function scopeProfessional($query)
    {
        return $query->where('type', 'professional');
    }
}
