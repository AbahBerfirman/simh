<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    use HasFactory;

    /**
     * Get the apartement that owns the kamar
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kamarApartement()
    {
        return $this->belongsTo(KotaApartement::class);
    }
}
