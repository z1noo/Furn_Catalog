<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styleCollection.css') }}">
    <title>Your Collection</title>
</head>
<body>
    <div class="container">
        <li data-value=">Back"><a data-value=">Back" href="{{ route('index') }}" class="turnBack"> >Back </a></li>
        <h1>Your Collections</h1>
        <div class="card-container">
            @foreach($likedProducts as $produk)
            <div class="card" onclick="openModal('modal-{{ $produk->id }}', '{{ $produk->nama }}', '{{ asset('image/image1.png') }}')">
                <img src="{{ asset('storage/images/' . $produk->gambar) }}" alt="" width="fit-content"> 
                <h2>{{ $produk->nama }}</h2>
                <div class="like">
                    <i class='bx bxs-heart'></i>
                    <span class="jumlah-like" data-produk-id="{{ $produk->id }}">{{ $produk->likes_count }}</span>
                </div>
            </div>

            <div class="modal" id="modal-{{ $produk->id }}">
                <div class="modal-content">
                    <div class="photo-section">
                        <img src="{{ asset('storage/images/' . $produk->gambar) }}" alt="" width="fit-content">
                        <h2 id="modalTitle">{{ $produk->nama }}</h2>
                    </div>
                    <div class="actions">
                        <button class="close" onclick="closeModal('modal-{{ $produk->id }}')"><i class='bx bx-x'></i></button>
                        <div class="comment-section">
                            <h2>comment</h2>
                            <div class="comment">
                                @foreach($produk->comments as $komentar)
                                <div class="comment-bubble">    
                                    <h1>{{ $komentar->user->name }}</h1>
                                    <p>{{ $komentar->komentar }}</p>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="buttons">
                            <div class="input-comment">
                                <form class="add-comment-form" data-produk-id="{{ $produk->id }}">
                                    @csrf
                                    <textarea name="komentar" id="komentar" required placeholder="comment here dude"></textarea>
                                    <button type="submit" class="btn-add-comment" data-produk-id="{{ $produk->id }}"><i class='bx bx-paper-plane'></i></button>
                                </form>
                            </div>
                            <div class="action-buttons">
                                <button href="{{ $produk->link }}">Go to Link</button>
                                @php
                                // Check if the user has already liked the product
                                    $userLiked = $produk->likedBy(auth()->id());
                                @endphp
                            
                                @if($userLiked)
                                    <button class="btn-unlike" data-produk-id="{{ $produk->id }}"><i class='bx bxs-heart' ></i></button>
                                @else
                                   <button class="btn-like" data-produk-id="{{ $produk->id }}"><i class='bx bx-heart'></i></button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <script src="script.js">
        
    </script>
    <script>
        function openModal(title, imagePath) {
            document.getElementById('modalTitle').innerHTML = title;
            document.getElementById('modal').classList.add('active');
        }
        function closeModal() {
            document.getElementById('modal').classList.remove('active');
        }
    </script>
</body>
</html>