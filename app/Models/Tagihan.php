<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tagihan extends Model
{
    protected $fillable = [
        'customer_id',
        'tanggal_masuk',
        'berat',
        'harga_per_kg',
        'total',
        'status_bayar',
    ];
    
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

}
