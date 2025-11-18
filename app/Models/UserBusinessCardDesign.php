<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserBusinessCardDesign extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'business_card_id',
        'design_name',
        'front_design_data',
        'back_design_data',
        'preview_image',
        'is_favorite',
        'last_modified'
    ];

    protected $casts = [
        'front_design_data' => 'array',
        'back_design_data' => 'array',
        'is_favorite' => 'boolean',
        'last_modified' => 'datetime',
    ];

    /**
     * Get the user that owns the design.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the business card for the design.
     */
    public function businessCard(): BelongsTo
    {
        return $this->belongsTo(BusinessCard::class);
    }

    /**
     * Scope a query to only include favorite designs.
     */
    public function scopeFavorites($query)
    {
        return $query->where('is_favorite', true);
    }
}