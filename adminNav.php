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

            <a href="admin_home.php" class="logo">Carma & Effect</a>
            
            <nav class="navbar">
                <a href="admin_home.php">Home</a>
                <a href="bookings_admin.php" >Bookings</a>
                <a href="products_admin.php" >Products</a>
                <a href="orders_admin.php" >Orders</a>
        
            </nav>

            <div class="icons">

              
         
                <div id="userr-btn" class="fas fa-user"></div>
                <div id="menu-btn" class="fas fa-bars"></div>

            </div>

            <div class="user">
                <p>Username : <span><?php echo  $_SESSION['namee']; ?></span></p>
                <a href="adminLog.php" class="close">Logout</a>
               
            </div>
        </section>
        
    </header>
    



    <script>
        navbar = document.querySelector('.header .flex .navbar');

document.querySelector('#menu-btn').onclick = () =>{
    navbar.classList.toggle('active');
}


let user = document.querySelector('.header .flex .user');

document.querySelector('#userr-btn').onclick = () =>{
    user.classList.toggle('active');
}
    </script>
</body>
</html>