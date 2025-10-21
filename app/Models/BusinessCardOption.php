<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessCardOption extends Model
{
    use HasFactory;

    protected $fillable = [
        'option_type',
        'option_key',
        'name',
        'description',
        'price_modifier',
        'is_active',
        'sort_order'
    ];

    protected $casts = [
        'price_modifier' => 'decimal:2',
        'is_active' => 'boolean',
    ];

    /**
     * Scope a query to only include active options.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope a query to filter by option type.
     */
    public function scopeType($query, $type)
    {
        return $query->where('option_type', $type);
    }

    /**
     * Get options by type
     */
    public static function getByType($type)
    {
        return self::active()->type($type)->orderBy('sort_order')->get();
    }
}