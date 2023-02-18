<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyLabel extends Model
{
    use HasFactory;
    protected $table = 'company_labels';
    protected $guarded = false;
}
