<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UploadOption extends Model
{
    use HasFactory;

    protected $fillable =  [
        'title',
        'upload_type'
    ];
}
