<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
    <title>Furn</title>
</head>
<body>
    <div class="container">
        <form action="">
            <nav>
                <div class="menu-link">
                    <input class="search" type="search" name="" id="" placeholder="Explore Here">
                    <ul>
                        <li><a href="" data-value="> About Us">> About Us</a></li>
                        <li><a href="" data-value="> Collection">> Collection</a></li>
                        <li><a href="" data-value="> Contact">> Contact</a></li>
                    </ul>
                </div>
                <div class="menu-action">
                    <span class="title-icon">.Fur<span class="yellowText">n</span></span>
                    <a href=""><i class='bx bx-user'></i></a>
                </div>
            </nav>
        </form>
        <div class="main">
            <!-- <div class="banner">
                <div class="scrollText">
                    <div class="scroll">
                        <div class="RightToLeft">
                            <p>Lorem ipsum dolor sit <span class="yellowText"> consectetur</span> amet</p>
                            <p>Lorem ipsum dolor sit amet consectetur</p>
                        </div>
                        </div>
                </div>
                <div class="slider">
                    <div class="slides">
                        <input type="radio" name="radio-btn" id="radio1">
                        <input type="radio" name="radio-btn" id="radio2">
                        <input type="radio" name="radio-btn" id="radio3">
                        <input type="radio" name="radio-btn" id="radio4">
                        <div class="slide first">
                            <img src="images/Image - 1.png" alt="">
                        </div>
                        <div class="slide">
                            <img src="images/Image - 2.png" alt="">
                        </div>
                        <div class="slide">
                            <img src="images/Image - 3.png" alt="">
                        </div>
                        <div class="slide">
                            <img src="images/Image - 4 .png"alt="" srcset="">
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
            </div> -->
            <div class="card-container">
                <div class="card" onclick="openModal('Modal 1', 'path/to/images/image1.png')"> 
                    <img src="images/image1.png" alt="" width="fit-content"> 
                    <h2>Card 1</h2>
                    <div class="like">
                        <i class='bx bxs-heart'></i>
                        <span>209209</span>
                    </div>
                </div>
                
            </div>
            <div class="modal" id="modal">
                <div class="modal-content">
                    <div class="photo-section">
                        <img src="images/image1.png" alt="" width="fit-content">
                        <h2 id="modalTitle"></h2>
                    </div>
                    <div class="actions">
                        <button class="close" onclick="closeModal()"><i class='bx bx-x'></i></button>
                        <div class="comment-section">
                            <h2>comment</h2>
                            <div class="comment">
                                <div class="comment-bubble">    
                                    <h1>User 1</h1>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus, consequatur.</p>
                                </div>
                                
                            </div>
                        </div>
                        <div class="buttons">
                            <div class="input-comment">
                                <input type="text" name="" id="" placeholder="comment here dude">
                                <button type="submit"><i class='bx bx-paper-plane'></i></button>
                            </div>
                            
                            <div class="action-buttons">
                                <button>Go to Link</button>
                                <button href=""><i class='bx bx-heart'></i></button>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <script>
        function openModal(title, imagePath) {
            document.getElementById('modalTitle').innerHTML = title;
            document.getElementById('modal').classList.add('active');
        }

        function closeModal() {
            document.getElementById('modal').classList.remove('active');
        }
    </script>

    <script src="script.js"></script>
</body>
</html>