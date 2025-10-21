<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BusinessCard extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'template_id',
        'name',
        'job_title',
        'company',
        'phone',
        'email',
        'website',
        'address',
        'logo_path',
        'design_data',
        'text_font',
        'corner_style',
        'text_color',
        'card_shape',
        'card_orientation',
        'card_weight',
        'text_alignment',
        'background_color',
        'background_front_image',
        'background_back_image',
        'is_front_design',
        'card_front_image',
        'is_back_design',
        'card_back_image',
        'status'
    ];

    protected $casts = [
        'design_data' => 'array',
        'is_front_design' => 'boolean',
        'is_back_design' => 'boolean',
    ];

    /**
     * Get the user that owns the business card.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the template for the business card.
     */
    public function template(): BelongsTo
    {
        return $this->belongsTo(BusinessCardTemplate::class, 'template_id');
    }

    /**
     * Get the user designs for the business card.
     */
    public function userDesigns(): HasMany
    {
        return $this->hasMany(UserBusinessCardDesign::class);
    }

    /**
     * Get the elements for the template.
     */
    public function elements()
    {
        return $this->template->elements();
    }
}
