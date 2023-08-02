<?php
include ("DBconn.php");
session_start();
$user_name = $_SESSION['namee'];
if(isset($user_name))
{
  

    $message[] = ''.$user_name.' has logged in. Welcome!';
}

?>
<!DOCTYPE html>
<html>
<head>
<title>Home page</title>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head> 
<body>
   
<?php 
  
if(isset($message))
{
    foreach($message as $message)
    {
        echo '<div class="message" id="message">
        <span>'.$message.'</span>
        <i class="fas fa-times"  onclick="this.parentElement.remove();" id="x"></i>
    
    </div>';
        
    }

}
?>

 
    <div class="topimg">
            
        <header></header>

    </div>


    <header class="head">
        <H1>Carma & Effect</H1>

    </header>
<section class="top">
    <div class="left">
        <img src="images/hair.jpg" class="img">
        <p class="texttwo">Perfect hair might be your dream...</p>
    </div>
    <div class="middle">
        <nav>
            <ul>
               
                <li><a href="about.php">About us</a></li>
                <li><a href="bookings.php">Bookings</a></li>
                <li><a href="priceList.php">Price list</a></li>
                <li><a href="shopping.php">Shop</a></li>
                <li><a href="cart.php">Cart</a></li>
            </ul>
        </nav>
    </div>
    <div class="right">
        <img src="images/nails.jpg" class="img">
        <p class="text">Perfect nails might be your dream...</p>
       
    </div>

</section>
<section class="mid">
    <div class="text">
        <p>But it's our promise.<br>book now!</p>

    </div>

</section>
<section class="bottom">
    <div class="ryt">

        <div class="icons">
            <a href="https://www.instagram.com/carmaandeffect/" class="insta"><i class="fa-brands fa-square-instagram"></i></a>
            <a href="" class="twitter"><i class="fa-brands fa-square-twitter"></i></a>
            <a href="https://www.facebook.com/profile.php?id=100085540336167" class="face"><i class="fa-brands fa-square-facebook"></i></a>
        
        </div>
      
  </div>
    <div class="cent">
        <p class="hours">Trading hours:</p>
        <div class="h"></div>
        <section class="in">
            <div class="q">
                <p>MONDAY  : closed</p>
                <p> TUESDAY : 9AM - 5PM </p>
       
                <p> WEDNESDAY : 9AM - 5PM </p>
       
                <p> THURSDAY : 9AM - 5PM</p>
       
            </div>
            <div class="w">
               <div class="me">

               </div>
            </div>
            <div class="e">
                <p> FRIDAY : 9AM - 5PM </p>
       
                <p> SATURDAY : 9AM - 3PM </p>
       
                <p> SUNDAY : Closed</p>
            </div>


        </section>

    </div>
    <div class="lft">
        <img src="images/logo.jpg" class="logo">
    </div>
    

</section>

<?php include 'footer.php'; ?>

</body>   
</html>