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
        // Anda bisa menambahkan validasi atau logika lainnya di sini

        $like = new Like();
        $like->produk_id = $produkId;
        // Juga, set user_id sesuai dengan pengguna yang melakukan like
        $like->user_id = auth()->id(); // Menggunakan Auth untuk mendapatkan ID pengguna yang sedang login
        $like->save();

        $jumlahLike = Like::where('produk_id', $produkId)->count();

        return response()->json(['success' => true, 'jumlah_like' => $jumlahLike]);
    }
}
