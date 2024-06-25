<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komen extends Model
{
    use HasFactory;
    protected $table = 'comment';
    protected $fillable = ['komentar','produk_id','user_id'];

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produk_id')->cascadeOnDelete();;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
