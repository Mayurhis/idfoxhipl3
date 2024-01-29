<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'status',
    ];
    
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function brandDetail()
    {
        return $this->hasOne(BrandThemeConfiguration::class);
    }
}
