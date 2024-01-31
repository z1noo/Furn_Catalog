<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $table='produk';

    protected $fillable = [
        'nama',
        'gambar',
        'link',
    ];


    public function likes()
    {
        return $this->hasMany(Like::class, 'produk_id');
    }
}
