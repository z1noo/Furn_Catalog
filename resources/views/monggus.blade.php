<!-- resources/views/index.blade.php -->

@extends('layouts.app')

@section('content')
    @foreach($produks as $produk)
        <div class="produk">
            <h2>{{ $produk->nama }}</h2>
            <p>Jumlah Like: <span class="jumlah-like" data-produk-id="{{ $produk->id }}">{{ $produk->likes_count }}</span></p>
            <button class="btn-like" data-produk-id="{{ $produk->id }}">Like</button>
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

            $('.btn-like').on('click', function () {
                var produkId = $(this).attr('data-produk-id');

                $.ajax({
                    type: 'POST',
                    url: `{{ route('like.store', ':produkId') }}`.replace(':produkId', produkId),
                    dataType: 'json',
                    success: function (data) {
                        if (data.success) {
                            var jumlahLikeElement = $('.jumlah-like[data-produk-id="' + produkId + '"]');
                            jumlahLikeElement.text(data.jumlah_like);
                        }
                    }
                });
            });
        });
    </script>
@endsection