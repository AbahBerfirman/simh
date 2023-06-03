<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    use HasFactory;

    //=========RELATIONSHIP=========//

    public function kamarAlamat()
    {
        return $this->belongsTo(Alamat::class, 'alamat_id', 'id');
    }
    public function durations()
    {
        return $this->belongsToMany(Duration::class, 'kamar_durations', 'kamar_id', 'duration_id')
                    ->withPivot('harga');
    }
    public function kamarTransaction()
    {
        return $this->hasMany(Transaction::class);
    }
}
