<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tariff extends Model
{
    use HasFactory;

    protected $primaryKey = 'tariff_id';

    protected $fillable = [
        'tariff_class',
        'band',
        'hours_of_supply',
        'tariff_rate',
        'tariff_category',
        'name',
    ];
}
