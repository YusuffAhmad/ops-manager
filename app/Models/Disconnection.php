<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disconnection extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'amount_owed',
        'amount_to_pay',
        'date_logged',
        'reason',
        'reported_by',
        'approved_by',
        'status',
        'date_disconnected',
        'date_approved',
        'disconnected_by',
        'disconnection_image',
    ];

    /**
     * Get the customer associated with the disconnection.
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * Get the user who approved the disconnection.
     */
    public function approvedBy()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }

    /**
     * Get the user who performed the disconnection.
     */
    public function disconnectedBy()
    {
        return $this->belongsTo(User::class, 'disconnected_by');
    }
}
