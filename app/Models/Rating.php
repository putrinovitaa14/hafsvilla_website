<?php

namespace App\Models;

use App\Models\Pemesanan;
use App\Models\Rating;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;
    public function pemesanan()
    {
        return $this->belongsTo(Pemesanan::class);
    }

    public function rating()
    {
        return $this->hasMany(Rating::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function villa()
    {
        return $this->belongsTo(Villa::class);
    }
}
