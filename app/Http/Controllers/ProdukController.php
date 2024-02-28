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
        // Validate the incoming request data
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif', // Maximum 2MB
            'link' => 'required|url|max:255',
        ]);

        // Handle the file upload and compression
        $image = $request->file('gambar');
        $gambarName = $image->getClientOriginalName();

        // Compress image if it's larger than 2MB
        if ($image->getSize() > 2048000) {
            $compressedImage = Image::make($image)->resize(800, null, function ($constraint) {
                $constraint->aspectRatio();
            })->encode('jpg', 75); // Change quality as needed
            $gambarName = 'compressed_' . $gambarName;
            $compressedImage->save(public_path('storage/images/' . $gambarName));
        } else {
            $image->storeAs('public/images', $gambarName);
        }

        // Create a new product instance
        $product = new Produk();
        $product->nama = $validatedData['nama'];
        $product->gambar = $gambarName;
        $product->link = $validatedData['link'];
        $product->save();

        // Redirect the user back with a success message
        return redirect()->route('index')->with('success', 'Product created successfully!');
    }

    public function update(Request $request, Produk $produk)
    {
        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'link' => ['required', 'string', 'max:255'],
            'gambar' => ['nullable', 'image', 'max:20480'], // Add validation for image uploads
        ]);

        if (!auth()->check()) {
        // Redirect the user to the form page with a flash message and JavaScript alert
            session()->flash('error', 'You must be logged in to update a produk.');
            return redirect()->back()->with('unauthorized', 'You must be logged in to update a produk.');
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

        // Delete the existing image
            if ($produk->gambar && file_exists(storage_path('app/public/produk/' . $produk->gambar))) {
                unlink(storage_path('app/public/produk/' . $produk->gambar));
            }

        // Store the compressed image
            $imageName = time() . '-' . $image->getClientOriginalName();
            $image->storeAs('public/produk', $imageName);

        // Set the gambar column to the stored image name
            $produk->gambar = $imageName;
        }

        $produk->nama = $request->input('nama');
        $produk->link = $request->input('link');
        $produk->save();

        return view('monggus')->with('success', 'Produk berhasil diupdate!');
    }

}
