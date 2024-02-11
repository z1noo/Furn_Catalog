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

    public function likedBy($userId)
    {
        return $this->likes()->where('user_id', $userId)->exists();
    }

    public function comments()
    {
        return $this->hasMany(Komen::class, 'produk_id');
    }

}
