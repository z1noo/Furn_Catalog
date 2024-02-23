<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/styleApp.css') }}" rel="stylesheet">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @vite('resources/css/app.css')
    <title>Edit Product</title>
</head>
    <body>
        <main>
            <div class="container-w-screen h-screen">
                <div class="flex justify-center">
                    <div class=" w-[450px] h-screen p-2">
                    <h1 class="text-creedt text-center mb-2 h-16">Edit Product</h1>
                    <form class="w-[450px] h-fit" method="POST" action="{{ route('produk.update', $produk->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="flex-col text-uspas">
                            <label for="nama">Product Name</label>

                            <div class="flex-col mb-1">                           
                                <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama', $produk->nama) }}" required>
                            </div>
                        </div>    

                        <div class="flex-col text-uspas">
                            <label for="link">Product Link</label>

                            <div class="flex-col mb-1"> 
                                <input type="text" name="link" id="link" class="form-control" value="{{ old('link', $produk->link) }}" required>
                            </div>
                        </div>    

                        <div class="flex-col text-uspas">
                            <label for="gambar">Product Image</label>
                                
                            <div class="flex mb-3">
                                <input type="file" name="gambar" id="gambar"  accept="image/*" class=" border-2 border-[#FFC93E] rounded-md w-[450px] h-[250px] p-4 
                                                                                                file:border-2 file:border-[#FFC93E] file:rounded-[12px]
                                                                                                file:mx-auto file:my-20 file:w-[150px] file:ml-8 file:mr-8 file:bg-white " >
                                @if ($produk->gambar)
                                    <img src="{{ Storage::url($produk->gambar) }}" alt="{{ $produk->nama }}" class="img-thumbnail mt-2" width="100">
                                @endif
                            </div>
                        </div>    

                        <div class="flex justify-stretch gap-8 ">
                            <a href="/" class="butlog flex-col text-butlog  bg-[#D9D9D9] rounded-[12px] w-[210px] h-[40px] text-center p-[5px]">Cancel</a>
                        <div class="flex text-butlog ">
                            <button type="submit" class="butlog bg-[#D9D9D9] rounded-[12px] w-[210px] h-[40px]">Update</button>
                        </div>
                    </div>
                    </form>
                    </div>
                </div>
            </div>
        </main>
    </body>
</html>


