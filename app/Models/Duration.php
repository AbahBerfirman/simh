<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Duration extends Model
{
    use HasFactory;

    //=========RELATIONSHIP=========//

    public function kamars()
    {
        return $this->belongsToMany(Kamar::class, 'kamar_durations', 'duration_id', 'kamar_id');
    }
    public function durationTransaction()
    {
        return $this->hasMany(Transaction::class);
    }
}
