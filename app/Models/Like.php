<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;
    public $incrementing = false;
    protected $table = 'like';
    protected $fillable = ['id', 'produk_id', 'user_id'];

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produk_id');
    }

    public static function create(array $attributes = [])
    {
        $attributes['id'] = self::getNextId();

        return parent::create($attributes);
    }

    public static function getNextId()
    {
        $maxId = Like::max('id');
        $gaps = Like::selectRaw('MAX(id) - MIN(id) + 1 AS gap')
                    ->groupBy(Like::raw('(id - 1) DIV 100'))
                    ->get()
                    ->map(fn ($gap) => $gap->gap)
                    ->filter()
                    ->toArray();

        $nextGap = array_shift($gaps);

        return $maxId + ($nextGap ?? 1);
    }
    
}
