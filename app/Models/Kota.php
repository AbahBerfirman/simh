<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kota extends Model
{
    use HasFactory;

    //=========RELATIONSHIP=========//

    public function kotaAlamat()
    {
        return $this->hasMany(Alamat::class);
    }
}
