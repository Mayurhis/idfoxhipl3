<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BrandMedia extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'brand_id ',
        'upload_path',
        'file ',
        'type',
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
