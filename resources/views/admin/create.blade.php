@extends('layouts.app')

@section('content')
    <h1>Create a New Product</h1>

    <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label for="nama">Product Name:</label>
        <input type="text" name="nama" id="nama" required>

        <label for="gambar">Product Image:</label>
        <input type="file" accept="image/*" name="gambar" id="gambar" required>

        <label for="link">Product Link:</label>
        <input type="text" name="link" id="link" required>

        <button type="submit">Create Product</button>
    </form>
@endsection