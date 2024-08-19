<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'account_number',
        'meter_number',
        'customer_type',
        'account_type',
        'first_name',
        'middle_name',
        'last_name',
        'phone',
        'email',
        'address',
        'city',
        'state',
        'lga',
        'lng',
        'lat',
        'dt_id',
        'tariff_id',
    ];

    protected $hidden = ['created_at', 'updated_at'];

    public static function validationRules()
    {
        return [
            'account_number' => 'required|unique:customers',
            'meter_number' => 'required|unique:customers',
            // Add more validation rules as needed
        ];
    }

    public function distributionTransformer()
    {
        return $this->belongsTo(DistributionTransformer::class, 'dt_id');
    }

    public function tariff()
    {
        return $this->belongsTo(Tariff::class);
    }

    // Example of accessor
    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->middle_name} {$this->last_name}";
    }

    // Example of mutator
    public function setPhoneAttribute($value)
    {
        $this->attributes['phone'] = preg_replace('/[^0-9]/', '', $value);
    }

    // Example of helper method
    public function isActive()
    {
        // Define your logic to determine if the customer is active
        // For example, check if they have made any recent transactions
        return true;
    }

    public function status()
    {
        return $this->hasOne(CustomerStatus::class);
    }
}
