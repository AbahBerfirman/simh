<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    //=========RELATIONSHIP=========//

    public function transactionKamar()
    {
        return $this->belongsTo(Kamar::class, 'kamar_id', 'id');
    }
    public function transactionDuration()
    {
        return $this->belongsTo(Duration::class, 'duration_id', 'id');
    }
    public function transactionCustomer()
    {
        return $this->belongsTo(Pelanggan::class, 'pelanggan_id', 'id');
    }
    public function transactionBroker()
    {
        return $this->belongsTo(Broker::class, 'broker_id', 'id');
    }



}
