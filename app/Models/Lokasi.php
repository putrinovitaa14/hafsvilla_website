<?php

namespace App\Models;

use App\Models\Villa;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lokasi extends Model
{
    use HasFactory;
    public function villa(){
        return $this->hasMany(Villa::class);
    }
}
