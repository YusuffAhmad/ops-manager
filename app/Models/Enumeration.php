<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enumeration extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'first_name',
        'middle_name',
        'last_name',
        'city',
        'lga',
        'state',
        'address',
        'account_number',
        'property_use',
        'title',
        'gender',
        'phone',
        'email',
        'tariff_id',
        'dt_id',
    ];

    /**
     * Get the user associated with the enumeration.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the tariff associated with the enumeration.
     */
    public function tariff()
    {
        return $this->belongsTo(Tariff::class);
    }

    /**
     * Get the distribution transformer associated with the enumeration.
     */
    public function distributionTransformer()
    {
        return $this->belongsTo(DistributionTransformer::class, 'dt_id');
    }
}
