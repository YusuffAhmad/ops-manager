<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'owner_id',
        'vat_number',
        'company_address',
        'account_number',
        'account_name',
        'bank_name',
    ]; 
    
    /**
     * Define Relation with User Model
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany('\App\Models\User', 'company_user', 'company_id', 'user_id')->where("user_status", "<>", "deleted")->withTimestamps();
    }

    /**
     * Define Relation with Addressable Model
     * This indicates the owner of the company
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Helper function to determine if a user is part
     * of this company
     *
     * @param User $user
     * 
     * @return bool
     */
    public function hasUser(User $user)
    {
        return $this->users()->where($user->getKeyName(), $user->getKey())->first() ? true : false;
    }
}
