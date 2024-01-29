<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Media extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
    'customer_id',
    'path',
    'type',
    'upload_type',
    'upload_option_id',
    ];

     protected $dates = ['deleted_at'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    // public function mediable()
    // {
    //     return $this->morphTo();
    // }
}
