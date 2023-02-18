<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $table = 'companies';
    protected $guarded = false;

    public function labels()
    {
        return $this->belongsToMany(Label::class, 'company_labels', 'company_id', 'label_id');
    }
}
