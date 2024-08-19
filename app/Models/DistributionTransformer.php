<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DistributionTransformer extends Model
{
    use HasFactory;

    protected $fillable = [
        'store_id',
        'name',
        'lng',
        'lat',
        'installation_date',
        'capacity',
        'status',
        'rating',
        'maker',
        'feeder_pillar_type',
    ];

    /**
     * Get the store associated with the distribution transformer.
     */
    public function store()
    {
        return $this->belongsTo(Store::class);
    }
}
