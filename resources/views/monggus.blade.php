@extends('layouts.app')

@section('content')
    @foreach($produks as $produk)
        <div class="produk">
            <h2>{{ $produk->nama }}</h2>
            <p>Jumlah Like: <span class="jumlah-like" data-produk-id="{{ $produk->id }}">{{ $produk->likes_count }}</span></p>
            
            @php
                // Check if the user has already liked the product
                $userLiked = $produk->likedBy(auth()->id());
            @endphp
            
            @if($userLiked)
                <button class="btn-unlike" data-produk-id="{{ $produk->id }}">Unlike</button>
            @else
                <button class="btn-like" data-produk-id="{{ $produk->id }}">Like</button>
            @endif
            
            <!-- Tampilkan informasi produk lainnya -->
        </div>
    @endforeach

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
       $(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.btn-like, .btn-unlike').on('click', function () {
        var button = $(this);
        var produkId = button.attr('data-produk-id');
        var action = button.hasClass('btn-like') ? 'like' : 'unlike';

        $.ajax({
            type: 'POST',
            url: `{{ route('like.store', ':produkId') }}`.replace(':produkId', produkId),
            dataType: 'json',
            success: function (data) {
                if (data.success) {
                    var jumlahLikeElement = $('.jumlah-like[data-produk-id="' + produkId + '"]');
                    jumlahLikeElement.text(data.jumlah_like);

                    // Toggle between "Like" and "Unlike" buttons
                    if (action === 'like') {
                        button.removeClass('btn-like').addClass('btn-unlike').text('Unlike');
                    } else {
                        button.removeClass('btn-unlike').addClass('btn-like').text('Like');
                    }
                }
            }
        });
    });
});

    </script>
@endsection
