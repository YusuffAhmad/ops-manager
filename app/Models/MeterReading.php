<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeterReading extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'customer_id',
        'previous_reading',
        'present_reading',
        'reading_date',
        'image',
        'description',
        'status',
    ];

    /**
     * Get the user associated with the meter reading.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the customer associated with the meter reading.
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * Calculate consumption attribute as a virtual attribute.
     */
    public function getConsumptionAttribute()
    {
        return $this->present_reading - $this->previous_reading;
    }
}
