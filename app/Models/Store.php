<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    const HEADQUARTERS = 1;
    const REGION = 2;
    const SERVICE_CENTER = 3;
    const BUSINESS_HUB = 4;

    protected $fillable = [
        'uid',
        'name',
        'super_id',
        'storelevel_id',
        'storelevel_name',
        'status',
        'address',
        'State',
        'city',
        'LGA',
    ];

    /**
     * Get the users associated with the store.
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
