<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KycConfiguration extends Model
{
    use HasFactory;

    protected $fillable =  [
        'configuration'
        'status'
    ];
}
