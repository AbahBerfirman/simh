<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KotaApartement extends Model
{
    use HasFactory;

    /**
     * Get the kota that owns the KotaApartement
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function alamatKota()
    {
        return $this->belongsTo(Kota::class);
    }

    /**
     * Get the apartement that owns the KotaApartement
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function alamatApartement()
    {
        return $this->belongsTo(Apartement::class);
    }

    /**
     * Get all of the kamar for the Alamat
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function alamatKamar()
    {
        return $this->hasMany(Kamar::class);
    }
}
