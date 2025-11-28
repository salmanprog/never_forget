<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'module',
        'module_id',
        'module_slug',
        'reference_module',
        'reference_id',
        'reference_slug',
        'title',
        'description',
        'is_read',
        'is_view',
    ];

    protected $casts = [
        'is_read' => 'boolean',
        'is_view' => 'boolean',
    ];

    /**
     * Get the user that owns the notification
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
