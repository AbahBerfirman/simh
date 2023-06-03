<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartement extends Model
{
    use HasFactory;

    //=========RELATIONSHIP=========//

    public function apartementAlamat()
    {
        return $this->hasOne(Alamat::class);
    }
}
