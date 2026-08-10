<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContactUs extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded = [];

    protected $casts = [
        'selected_services' => 'array',
    ];

    public function getSelectedServicesListAttribute(): array
    {
        $services = $this->selected_services;
        if (is_string($services)) {
            $decoded = json_decode($services, true);
            return is_array($decoded) ? $decoded : [];
        }
        return is_array($services) ? $services : [];
    }
}
