<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends \Spatie\Permission\Models\Role
{
    use HasFactory;
 
    const ROLE_SUPER_ADMINISTRATOR = 1;
    const ROLE_ADMINISTRATOR = 2;
    const ROLE_STAFF = 3;
}
