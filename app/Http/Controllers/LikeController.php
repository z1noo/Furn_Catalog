<?php
// app/Http/Controllers/LikeController.php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function like(Request $request, $produkId)
    {
        $existingLike = Like::where('produk_id', $produkId)
                            ->where('user_id', auth()->id())
                            ->first();
    
        if ($existingLike) {
            return response()->json(['success' => false, 'message' => 'User already liked the product']);
        }
    
        // Continue with the creation of a new like record
        $like = new Like();
        $like->produk_id = $produkId;
        $like->user_id = auth()->id();
        $like->save();
    
        $jumlahLike = Like::where('produk_id', $produkId)->count();
    
        return response()->json(['success' => true, 'jumlah_like' => $jumlahLike]);
    }
    
}
