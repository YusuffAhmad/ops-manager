<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DTMeterReading extends Model
{
    use HasFactory;

    protected $fillable = [
        'dt_id',
        'user_id',
        'previous_reading',
        'present_reading',
        'reading_date',
        'image',
        'description',
        'status',
    ];

    /**
     * Get the distribution transformer associated with the meter reading.
     */
    public function distributionTransformer()
    {
        return $this->belongsTo(DistributionTransformer::class, 'dt_id');
    }

    /**
     * Get the user who recorded the meter reading.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Calculate consumption attribute as a virtual attribute.
     */
    public function getConsumptionAttribute()
    {
        return $this->present_reading - $this->previous_reading;
    }
}
