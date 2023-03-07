<?php

namespace App\Models;

use App\Models\Image;
use App\Models\Kecamatan;
use App\Models\Kota;
use App\Models\Lokasi;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Villa extends Model
{
    use HasFactory;
    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class);
    }

    public function image()
    {
        return $this->hasMany(Image::class);
    }

    public function kota()
    {
        return $this->belongsTo(Kota::class);
    }

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }
    public function rating()
    {
        return $this->hasMany(Rating::class);
    }
}
