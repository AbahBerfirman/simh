<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;

    //=========RELATIONSHIP=========//

    public function adminRole()
    {
        return $this->belongsTo(UserRole::class, 'user_role_id', 'id');
    }

    public function adminAlamat()
    {
        return $this->belongsTo(Alamat::class, 'alamat_id', 'id');
    }
}
