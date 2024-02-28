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
            // User has already liked the product, so "unlike" it
            $existingLike->delete();

            $jumlahLike = Like::where('produk_id', $produkId)->count();

            return response()->json(['success' => true, 'action' => 'unlike', 'jumlah_like' => $jumlahLike]);
        }

        // Get the next available id
        $nextId = Like::getNextId();

        // Continue with the creation of a new like record
        $like = new Like();
        $like->id = $nextId;
        $like->produk_id = $produkId;
        $like->user_id = auth()->id();
        $like->save();

        $jumlahLike = Like::where('produk_id', $produkId)->count();

        return response()->json(['success' => true, 'jumlah_like' => $jumlahLike]);
    }

    public function hasUserLikedProduct(Request $request, $id)
    {
        $like = Like::where('user_id', $request->user()->id)
                ->where('produk_id', $id)
                ->first();

        return response()->json(['liked' => $like !== null]);
    }
    
}
