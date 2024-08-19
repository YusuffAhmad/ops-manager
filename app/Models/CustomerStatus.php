<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerStatus extends Model
{
    use HasFactory;

    protected $fillable = [
        'account_number',
        'bill_is_distributed',
        'last_bill_distributed',
        'last_meter_read',
        'meter_is_read',
        'last_meter_read',
        'customer_is_enumerated',
        
    ];


    public function customer()
    {
        return $this->belongsTo(Customer::class, 'account_number');
    }
}
