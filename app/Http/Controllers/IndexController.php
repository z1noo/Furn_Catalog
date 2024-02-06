<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Like;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil semua produk beserta jumlah like
        $produks = Produk::withCount('likes')->get();

        return view('monggus', compact('produks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'link' => ['required', 'string', 'max:255'],
        ]);

        $produks = new Produk();

        if (!auth()->check()) {
            // Redirect the user to the form page with a flash message and JavaScript alert
            session()->flash('error', 'You must be logged in to create a siswa.');
            return redirect()->back()->with('unauthorized', 'You must be logged in to create a siswa.');
        }

        $produks->nama = $request->input('nama');
        $produks->link = $request->input('link');
        $produks->save();

        return redirect('/homo')->with('success', 'Siswa berhasil ditambahkan!');
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
