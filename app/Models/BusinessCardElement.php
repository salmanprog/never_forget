<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BusinessCardElement extends Model
{
    use HasFactory;

    protected $fillable = [
        'template_id',
        'element_type',
        'element_name',
        'position',
        'size',
        'style',
        'default_text',
        'is_editable',
        'is_required',
        'z_index'
    ];

    protected $casts = [
        'position' => 'array',
        'size' => 'array',
        'style' => 'array',
        'is_editable' => 'boolean',
        'is_required' => 'boolean',
    ];

    /**
     * Get the template that owns the element.
     */
    public function template(): BelongsTo
    {
        return $this->belongsTo(BusinessCardTemplate::class, 'template_id');
    }

    /**
     * Scope a query to only include editable elements.
     */
    public function scopeEditable($query)
    {
        return $query->where('is_editable', true);
    }

    /**
     * Scope a query to only include required elements.
     */
    public function scopeRequired($query)
    {
        return $query->where('is_required', true);
    }

    /**
     * Scope a query to filter by element type.
     */
    public function scopeType($query, $type)
    {
        return $query->where('element_type', $type);
    }
}