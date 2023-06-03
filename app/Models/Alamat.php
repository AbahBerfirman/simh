<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alamat extends Model
{
    use HasFactory;

    //=========RELATIONSHIP=========//

    public function alamatKota()
    {
        return $this->belongsTo(Kota::class, 'kota_id', 'id');
    }
    public function alamatApartement()
    {
        return $this->belongsTo(Apartement::class, 'apartement_id', 'id');
    }
    public function alamatKamar()
    {
        return $this->hasMany(Kamar::class);
    }
}
