<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'customer_id',
        'first_name',
        'middle_name',
        'last_name',
        'region',
        'hub',
        'service_center',
        'account_number',
        'meter_number',
        'customer_type',
        'estimated_lor',
        'penalty',
        'admin_charge',
    ];

    /**
     * Get the user associated with the evaluation.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the customer associated with the evaluation.
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
