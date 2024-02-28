<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Like;
use App\Models\Komen;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil semua produk beserta jumlah like
        $produks = Produk::withCount('likes')->with('comments')->get();

        return view('home', compact('produks'));
    }

    public function home()
    {
        $produks = Produk::withCount('likes')->with('comments')->get();
        return view( 'monggus', compact('produks') );
    }

    public function collection()
    {
        // Get the currently authenticated user
        $user = auth()->user();
    
        if ($user) {
            // Retrieve the liked products for the user
            $likedProducts = $user->likedProducts()->get();
            
            // Pass the liked products to the view
            return view('collection', compact('likedProducts'));
        } else {
            // Handle the case where the user is not authenticated
            // Redirect to login or handle as per your application logic
            return redirect()->route('login');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
