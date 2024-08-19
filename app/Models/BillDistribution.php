<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillDistribution extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'customer_id',
        'bill_amount',
        'lat',
        'lng',
        'distribution_date',
        'status',
    ];

    /**
     * Get the user associated with the bill distribution.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the customer associated with the bill distribution.
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
