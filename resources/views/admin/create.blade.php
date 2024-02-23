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
    <title>Add Product</title>
</head>
    <body>
        <main>
            <div class="container-w-screen h-screen">
            <div class="flex justify-center">
                <div class=" w-[450px] h-screen p-2">  
                    <h1 class="text-creedt text-center mb-2 h-16">Add New Product</h1>

                    <form class="w-[450px] h-fit" action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="flex-col text-uspas">
                            <label for="nama">Product Name</label>
                            
                            <div class="flex-col mb-1">
                                <input  type="text" name="nama" id="nama" class="border-2 border-[#FFC93E] rounded-md w-[450px] h-[30px] p-4" value="{{ @old('nama') }}" required autocomplete="off">
                            </div>
                        </div>

                        <div class="flex-col text-uspas">
                            <label for="link">Product Link</label>

                            <div class="flex-col mb-1">
                                <input  type="text" name="link" id="link" class="border-2 border-[#FFC93E] rounded-md w-[450px] h-[30px] p-4" value="{{ @old('link') }}" required autocomplete="off">
                            </div>
                        </div>

                        <div class="flex-col text-uspas">
                            <label for="gambar">Product Image</label>

                            <div class="flex mb-3">
                                <input type="file" accept="image/*" name="gambar" id="gambar" class=" border-2 border-[#FFC93E] rounded-md w-[450px] h-[250px] p-4 
                                                                                                        file:border-2 file:border-[#FFC93E] file:rounded-[12px]
                                                                                                        file:mx-auto file:my-20 file:w-[150px] file:ml-8 file:mr-8 file:bg-white " required>
                            </div>
                        </div>

                        <div class="flex justify-stretch gap-8 ">
                                <a href="/" class="butlog flex-col text-butlog  bg-[#D9D9D9] rounded-[12px] w-[210px] h-[40px] text-center p-[5px]">Cancel</a>
                            <div class="flex text-butlog ">
                                <button type="submit" class="butlog bg-[#D9D9D9] rounded-[12px] w-[210px] h-[40px]">Confirm</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </main>
    </body>
</html>



