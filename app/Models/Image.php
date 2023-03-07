<?php

namespace App\Models;

use App\Models\Villa;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    public function villa()
    {
        return $this->belongsTo(Villa::class);
    }

    public function image()
    {
        if ($this->foto && file_exists(public_path($this->foto))) {
            return asset($this->foto);
        } else {
            return asset('images/no_image.jpg');
        }
    }

    public function deleteImage()
    {
        if ($this->foto && file_exists(public_path($this->foto))) {
            return unlink(public_path($this->foto));
        }
    }
}
