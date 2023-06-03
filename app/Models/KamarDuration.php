<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KamarDuration extends Model
{
    use HasFactory;

    //=========RELATIONSHIP=========//

    public function hargaKamar()
    {
        return $this->belongsTo(Kamar::class, 'kamar_id', 'id');
    }
    public function hargaDuration()
    {
        return $this->belongsTo(Duration::class, 'duration_id', 'id');
    }
}
