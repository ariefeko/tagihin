<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ['name', 'phone', 'address'];
    
    public function tagihans()
    {
        return $this->hasMany(Tagihan::class);
    }
}
