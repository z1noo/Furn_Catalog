<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;
    protected $table = 'like';
    protected $fillable = ['produk_id', 'user_id'];

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produk_id');
    }
}
