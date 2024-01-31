<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
        <!-- resources/views/index.blade.php -->

@foreach ($produks as $produk)
<div class="produk">
    <h2>{{ $produk->nama }}</h2>
    <p>Jumlah Like: <span class="jumlah-like">{{ $produk->likes_count }}</span></p>
    <button class="btn-like" data-produk-id="{{ $produk->id }}">Like</button>
    <!-- Tampilkan informasi produk lainnya -->
</div>

@endforeach

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('.btn-like').on('click', function () {
            var produkId = $(this).data('produk-id');
            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                type: 'POST',
                url: '/like/' + produkId,
                data: {
                    _token: csrfToken
                },
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
    </body>
</html>