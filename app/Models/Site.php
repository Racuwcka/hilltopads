<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    use HasFactory;
    protected $table = 'sites';
    protected $guarded = false;

    public function labels()
    {
        return $this->belongsToMany(Label::class, 'site_labels', 'site_id', 'label_id');
    }
}
