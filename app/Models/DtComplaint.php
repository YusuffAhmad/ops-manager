<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DTComplaint extends Model
{
    use HasFactory;

    protected $fillable = [
        'dt_id',
        'title',
        'sub_title',
        'description',
        'image',
        'region',
        'hub',
        'service_center',
        'address',
        'reported_by',
        'status',
    ];

    /**
     * Get the distribution transformer associated with the complaint.
     */
    
    public function distributionTransformer()
    {
        return $this->belongsTo(DistributionTransformer::class, 'dt_id');
    }
}
