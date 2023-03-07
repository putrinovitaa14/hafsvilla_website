<?php

namespace App\Models;

use App\Models\User;
use App\Models\Villa;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function villa()
    {
        return $this->belongsTo(Villa::class);
    }
}
