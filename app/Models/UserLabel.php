<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLabel extends Model
{
    use HasFactory;
    protected $table = 'user_labels';
    protected $guarded = false;
}
