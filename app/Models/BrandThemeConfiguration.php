<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BrandThemeConfiguration extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'brand_id ',
        'domain',
        'display_name ',
        'display_logo',
        'theme ',
        'accent_color',
        'button_color',
        'defaul_language',
        'approval_method ',
    ];
    
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
