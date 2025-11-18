<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    

    public function billingAddress(){
        return $this->hasOne(BillingAddress::class, 'id', 'billing_address_id');
    }

    /**
     * Get the company that this user belongs to (if any)
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * Get the company that this user administers (if any)
     */
    public function administeredCompany()
    {
        return $this->hasOne(Company::class, 'admin_user_id');
    }

    /**
     * Get all occasions for this user
     */
    public function occasions()
    {
        return $this->hasMany(Occasion::class);
    }

    /**
     * Check if user has Admin role
     */
    public function isAdmin()
    {
        return $this->hasRole('Admin');
    }

    /**
     * Check if user has Individual role
     */
    public function isIndividual()
    {
        return $this->hasRole('Individual');
    }

    /**
     * Check if user has Company role
     */
    public function isCompany()
    {
        return $this->hasRole('Company');
    }

    /**
     * Check if user is a company admin (administers a company)
     */
    public function isCompanyAdmin()
    {
        return $this->administeredCompany()->exists();
    }

    /**
     * Check if user account type is individual
     */
    public function isIndividualAccountType()
    {
        return $this->account_type === 'Individual';
    }

    /**
     * Check if user account type is company
     */
    public function isCompanyAccountType()
    {
        return $this->account_type === 'Company';
    }
}
