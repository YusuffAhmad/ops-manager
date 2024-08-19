<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreLevel extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'uid',
        'is_active',
    ];
}
