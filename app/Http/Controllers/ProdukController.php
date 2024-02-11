<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Like;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Laravel\Facades\Image;

class ProdukController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'link' => ['required', 'string', 'max:255'],
            'gambar' => ['nullable', 'image', 'max:2048'], // Add validation for image uploads
        ]);

        $produks = new Produk();

        if (!auth()->check()) {
            // Redirect the user to the form page with a flash message and JavaScript alert
            session()->flash('error', 'You must be logged in to create a siswa.');
            return redirect()->back()->with('unauthorized', 'You must be logged in to create a siswa.');
        }

        if ($request->hasFile('gambar')) {
            // Store the uploaded image
            $image = $request->file('gambar');
        
            // Check image size
            $size = $image->getSize(); // in bytes
            $maxSize = 2048 * 1024; // 2MB in bytes
        
            if ($size > $maxSize) {
                // Compress the image
                $compressedImage = Image::make($image)->encode('jpg', 75); // Adjust compression quality as needed
                $compressedImage->save(); // Overwrite the original image with the compressed version
            }
        
            // Store the compressed image
            $imageName = time() . '-' . $image->getClientOriginalName();
            $image->storeAs('public/produk', $imageName);

            // Set the gambar column to the stored image name
            $produks->gambar = $imageName;
        }

        $produks->nama = $request->input('nama');
        $produks->link = $request->input('link');
        $produks->save();

    return view('monggus')->with('success', 'Siswa berhasil ditambahkan!');
}

}
