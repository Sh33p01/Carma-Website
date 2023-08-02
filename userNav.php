
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <link rel="stylesheet" href="sa.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
</head>
<body>

    <header class="header">


        <section class="flex">

            <a href="index.php" class="logo">Carma & Effect</a>
            
            <nav class="navbar">
                <a href="index.php">Home</a>
                <a href="about.php">about us</a>
                <a href="Bookings.php">Bookings</a>
                <a href="priceList.php">price list</a>
                <a href="shopping.php">shop</a>
        
            </nav>

            <div class="icons">

              
                <a href="search.php"><i class="fas fa-search"></i></a>
                <?php
                $select_cart = mysqli_query($conn, "SELECT * FROM cart WHERE user_id = '$user_id'") or die('failed');
                
                $cart_rows = mysqli_num_rows($select_cart);
                ?>
                <a href="cart.php"><i class="fas fa-shopping-cart"></i><span>(<?php echo $cart_rows; ?>)</a>
                <div id="user-btn" class="fas fa-user"></div>
             
                
                <div id="menu-btn" class="fas fa-bars"></div>

            </div>

            <div class="user">
                <p>Username : <span><?php echo  $_SESSION['namee']; ?></span></p>
                <a href="logout.php" class="close">Logout</a>
               
            </div>
        </section>
        
    </header>
    




    <script>
        navbar = document.querySelector('.header .flex .navbar');

document.querySelector('#menu-btn').onclick = () =>{
    navbar.classList.toggle('active');
}


let user = document.querySelector('.header .flex .user');

document.querySelector('#user-btn').onclick = () =>{
    user.classList.toggle('active');
}
    </script>
</body>
</html>