<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'registration_number',
        'website',
        'address',
        'industry',
        'year_established',
        'number_of_employees',
        'logo',
        'primary_contact_name',
        'job_title',
        'billing_email',
        'billing_phone',
        'billing_address_line_1',
        'billing_address_line_2',
        'city',
        'state',
        'zip_code',
        'billing_country',
        'plan',
        'options',
        'description',
        'admin_user_id',
        'is_profile_completed'
    ];

    protected $casts = [
        'number_of_employees' => 'integer',
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

    public function user()
    {
        return $this->hasMany(User::class);
    }
}
