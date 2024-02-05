@extends('layouts.app')

@section('content')
        <!-- resources/views/index.blade.php -->

@foreach ($produks as $produk)
<div class="produk">
    <h2>{{ $produk->nama }}</h2>
    <p>Jumlah Like: <span class="jumlah-like">{{ $produk->likes_count }}</span></p>
    <button class="btn-like">Like</button>
    <!-- Tampilkan informasi produk lainnya -->
</div>

@endforeach

<script>
    $(document).ready(function() {
        $('.btn-like').(function(e) {
            e.preventDefault(); // Prevent the button from submitting the form
    
            // Get the ID of the product that was clicked
            var productId = $(this).closest('.produk').data('id');
    
            // Send an AJAX request to the server to add a like to the product
            $.ajax({
                url: '/products/' + productId + '/like',
                method: 'POST',
                success: function(data) {
                    // Update the number of likes on the page
                    var likesCount = $(this).closest('.produk').find('.jumlah-like');
                    likesCount.text(data.likesCount);
                }
            });
        });
    });
    </script>

@endsection