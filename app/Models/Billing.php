<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Billing extends Model
{
    use HasFactory;

    protected $primaryKey = 'bill_id';

    protected $fillable = [
        'customer_id',
        'bill_date',
        'due_date',
        'consumption',
        'arrears',
        'vat',
        'current_charge',
        'total_charge',
        'total_due',
    ];

    /**
     * Get the customer associated with the billing.
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
