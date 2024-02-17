<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="{{ asset('css/styleAdmin.css') }">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <nav>
            <h1>.Fur<span class="yellowText">n</span></h1>
            <div class="menu">
                <ul>
                    <li><a href="">Product</a></li>
                    <li><a href="">User</a></li>
                </ul>
                
                <a href="">Logout</a>
                </div>
        </nav>
        <div class="product-container">
            <div class="addButton"><a href="">Add Product</a></div>
            <div class="card-container">
                <div class="card" onclick="openModal('Modal 1', 'path/to/images/image1.png')"> 
                    <img src="../images/image1.png" alt="" width="fit-content"> 
                    <h2>Card 1</h2>
                    <div class="like">
                        <i class='bx bxs-heart'></i>
                            <span>209209</span>
                            
                        
                    
                    </div>  
            </div>
            <div class="modal" id="modal">
                    <div class="modal-content">
                        <div class="photo-section">
                            <img src="../images/image1.png" alt="" width="fit-content">
                            <h2 id="modalTitle"></h2>
                        </div>
                        <div class="actions">
                            <button class="close" onclick="closeModal()"><i class='bx bx-x'></i></button>
                            <div class="comment-section">
                                <h2>comment</h2>
                                <div class="comment">
                                    <div class="comment-bubble">
                                        <div class="textComment">     
                                            <h1>User 1</h1>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus, consequatur.</p>
                                        </div>
                                        <a href=""><i class="bx bx-trash"></i></a>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="buttons">
                                <a href=""><i class="bx bx-edit"></i></a>
                                <a href=""><i class="bx bx-trash"></i></a>
                            </div>
                        </div>
                        
                    </div>
            </div>
        </div>
    </div>
    <script src="../scriptAdmin.js"></script>
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
