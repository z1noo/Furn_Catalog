<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Komen;
use App\Models\Produk;

class CommentController extends Controller
{
    public function store(Request $request, $produkId)
    {
        // Validate the incoming request
        $request->validate([
            'komentar' => 'required|string',
        ]);

        // Create a new comment instance
        $comment = new Komen();
        $comment->komentar = $request->komentar;
        $comment->produk_id = $produkId;
        $comment->user_id = auth()->id(); // Assuming the user is authenticated

        // Save the comment
        $comment->save();
        $userName = $comment->user->name; 
        // You can optionally fetch the newly created comment if needed
        // $comment = Komen::find($comment->id);

        return response()->json([
            'success' => true,
            'comment' => $comment, // This should include the user's name if the user relationship is correctly defined
            'user_name' => $userName,
        ]);
    }
}
