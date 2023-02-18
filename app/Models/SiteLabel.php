<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteLabel extends Model
{
    use HasFactory;
    protected $table = 'site_labels';
    protected $guarded = false;
}
