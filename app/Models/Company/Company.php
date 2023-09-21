<?php

namespace App\Models\Company;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Authenticatable
{

    use HasFactory;
    protected $guard = "company";

    protected $fillable = [
        'name',
        'email',
        'password',

    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function getStatusAttribute($value)
    {
        return ucfirst($value); // Capitalize the first letter
    }
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



}
