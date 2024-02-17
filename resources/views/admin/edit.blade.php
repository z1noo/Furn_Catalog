@extends('layouts.app')

@section('content')
    <h1>Edit Produk</h1>

    <form method="POST" action="{{ route('produk.update', $produk->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama', $produk->nama) }}" required>
        </div>

        <div class="form-group">
            <label for="link">Link</label>
            <input type="text" name="link" id="link" class="form-control" value="{{ old('link', $produk->link) }}" required>
        </div>

        <div class="form-group">
            <label for="gambar">Gambar</label>
            <input type="file" name="gambar" id="gambar" class="form-control" accept="image/*">
            @if ($produk->gambar)
                <img src="{{ Storage::url($produk->gambar) }}" alt="{{ $produk->nama }}" class="img-thumbnail mt-2" width="100">
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection