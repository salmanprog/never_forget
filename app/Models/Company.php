<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'website',
        'address',
        'industry',
        'billing_email',
        'billing_phone',
        'plan',
        'options',
        'description',
        'admin_user_id'
    ];

    /**
     * Get the admin user for this company
     */
    public function adminUser()
    {
        return $this->belongsTo(User::class, 'admin_user_id');
    }

    /**
     * Get all employees/clients for this company
     */
    public function employees()
    {
        return $this->hasMany(CompanyEmployee::class);
    }

    /**
     * Get all occasions for this company
     */
    public function occasions()
    {
        return $this->hasMany(Occasion::class);
    }
}
