<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reconnection extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'date_logged',
        'reason',
        'reported_by',
        'approved_by',
        'status',
        'date_reconnected',
        'date_approved',
        'reconnected_by',
        'reconnection_image',
    ];

    /**
     * Get the customer associated with the reconnection.
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * Get the user who approved the reconnection.
     */
    public function approvedBy()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }

    /**
     * Get the user who performed the reconnection.
     */
    public function reconnectedBy()
    {
        return $this->belongsTo(User::class, 'reconnected_by');
    }
}
