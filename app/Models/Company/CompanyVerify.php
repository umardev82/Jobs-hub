<?php

namespace App\Models\Company;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyVerify extends Model
{
    use HasFactory;

    public $table = "companies_verify";


    protected $fillable = [
        'company_id',
        'token',
    ];


    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
