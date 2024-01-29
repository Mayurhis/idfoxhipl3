<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'media';
    protected $fillable =  [
        'uuid',
        'brand_id',
        'first_name',
        'last_name',
        'dob',
        'mobile_number',
        'email',
        'term_condition',
        'verification_status',
        'status'
    ];
    protected $dates = ['deleted_at'];

    public function address()
    {
        return $this->hasMany(Address::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function media()
    {
        return $this->hasMany(Media::class);
    }
    
}
