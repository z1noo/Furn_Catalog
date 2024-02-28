<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <title>Furn</title>
</head>
<body>
    <div class="container">
            <nav>
                <div class="menu-link">
                    <input class="search" type="search" name="" id="" placeholder="Explore Here">
                    <ul>
                        <li><a href="" data-value="> About Us">> About Us</a></li>
                        <li><a href="{{ route('collection') }}" data-value="> Collection">> Collection</a></li>
                        <li><a href="" data-value="> Contact">> Contact</a></li>
                    </ul>
                </div>
                <div class="menu-action">
                    <span class="title-icon">.Fur<span class="yellowText">n</span></span>
                    @include('userMenu')
                </div>
            </nav>
        <div class="main">
          
            <div class="banner">
                <marquee behavior="" direction="">Lorem ipsum <span class="yellowText">dolor</span> sit, amet <span class="yellowText">consectetur</span>adipisicing elit.</marquee>
                <marquee behavior="" direction="right">Lorem ipsum <span class="yellowText">dolor</span> sit, amet <span class="yellowText">consectetur</span>adipisicing elit.</marquee>
                <div class="slider">
                    <div class="slides">
                        <input type="radio" name="radio-btn" id="radio1">
                        <input type="radio" name="radio-btn" id="radio2">
                        <input type="radio" name="radio-btn" id="radio3">
                        <input type="radio" name="radio-btn" id="radio4">
                        <div class="slide first">
                            <img src="{{ asset('image/wlwl.png') }}" alt="">
                        </div>
                        <div class="slide">
                            <img src="{{ asset('image/image2.png') }}" alt="">
                        </div>
                        <div class="slide">
                            <img src="{{ asset('image/image3.png') }}" alt="">
                        </div>
                        <div class="slide">
                            <img src="{{ asset('image/image4.png') }}" alt="" srcset="">
                        </div>
                        <div class="navigation-auto">
                            <div class="auto-btn1"></div>
                            <div class="auto-btn2"></div>
                            <div class="auto-btn3"></div>
                            <div class="auto-btn4"></div>
                        </div>
                    </div>
                    <div class="navigation-manual">
                        <label for="radio1" class="manual-btn"></label>
                        <label for="radio2" class="manual-btn"></label>
                        <label for="radio3" class="manual-btn"></label>
                        <label for="radio4" class="manual-btn"></label>
                    </div>
                </div>
            </div>

            <div class="card-container">

                @foreach($produks as $produk)
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
        <footer id="contact">
            <div class="contact-container">
                <h1>.Fur<span class="yellowText">n</span>iture</h1>
                <div class="contact">
                    <div class="stalk link-contact">
                        <h3>STALK US</h3>
                        <ul>
                            <li><a data-value="Instagram" href="">Instagram</a></li>
                            <li><a data-value="Facebook" href="">Facebook</a></li>
                            <li><a data-value="Linkedin" href="">Linkedin</a></li>
                        </ul>
                    </div>
                    <div class="mail link-contact">
                        <h3>CALL US</h3>
                        <ul>
                            <li><a data-value="johnDoe@Gmail.com" href="">johnDoe@Gmail.com</a></li>
                            <li><a data-value="+881-129-2999" href="">+881-129-2999</a></li>
                            <li><a data-value="+881-129-2109" href="">+881-129-2109</a></li>
                        </ul>
                    </div>
                    <div class="location link-contact">
                        <h3>FIND US</h3>
                        <p>SMKN 2 Bandung, Ciliwung st, 04</p>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    </div>
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @include('ajax')
</body>
</html>
