<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BusinessCardTemplate extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'category',
        'preview_image',
        'background_image',
        'background_color',
        'template_data',
        'available_colors',
        'available_fonts',
        'is_premium',
        'is_active',
        'sort_order'
    ];

    protected $casts = [
        'template_data' => 'array',
        'available_colors' => 'array',
        'available_fonts' => 'array',
        'is_premium' => 'boolean',
        'is_active' => 'boolean',
    ];

    /**
     * Get the elements for the template.
     */
    public function elements(): HasMany
    {
        return $this->hasMany(BusinessCardElement::class, 'template_id');
    }

    /**
     * Get the business cards using this template.
     */
    public function businessCards(): HasMany
    {
        return $this->hasMany(BusinessCard::class);
    }

    /**
     * Scope a query to only include active templates.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope a query to only include free templates.
     */
    public function scopeFree($query)
    {
        return $query->where('is_premium', false);
    }

    /**
     * Scope a query to only include premium templates.
     */
    public function scopePremium($query)
    {
        return $query->where('is_premium', true);
    }

    /**
     * Scope a query to filter by category.
     */
    public function scopeCategory($query, $category)
    {
        return $query->where('category', $category);
    }
}