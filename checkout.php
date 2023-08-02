<?php
include ("DBconn.php");
session_start();
$user_id = $_SESSION['id'];

if(!isset($user_id))
{
    header('location:login.php');
}

if(isset($_POST['orderbtn']))
{
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $number = mysqli_real_escape_string ($conn, $_POST['number']);
    $method = mysqli_real_escape_string($conn, $_POST['method']);
    $placedOn = date('d-M-Y');

    $totalCart = 0 ;
    $cartproducts[] = '';

    $query = mysqli_query($conn, "SELECT * FROM cart WHERE  user_id = '$user_id'") or die('failed');
  
    if(mysqli_num_rows($query)> 0)
    {
        while($cart_item = mysqli_fetch_assoc($query))
        {
            $cartproducts[] = $cart_item['name'].'('.$cart_item['quantity'].')';
            $sub_total = $cart_item['price'] * $cart_item['quantity'];
            $totalCart += $sub_total;

        }


    }

    $total_products = implode(', ', $cartproducts);
    $orderQ = mysqli_query($conn, "SELECT * FROM orders WHERE name = '$name' AND number = '$number' AND email= '$email' AND  method = '$method' AND total_products ='$total_products' AND total_price = '$totalCart' ") or die('failed');



    if($totalCart == 0) 
    {
        $message[] = 'Your cart is empty';
    }

    else
    {
        
        mysqli_query($conn, "INSERT INTO orders (name, email, user_id, method, number, total_price, placed_on, total_products) 
        VALUES('$name', '$email', '$user_id', '$method', '$number', '$totalCart' ,'$placedOn', '$total_products')")or die('failed');
       
       
        mysqli_query($conn, "DELETE FROM cart WHERE user_id = '$user_id'") or die('failed');

    }
 
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Shop</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
        
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>

<body >

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



        <?php
include ('userNav.php');
?>
    
<section class="titlePage">
    <h1>checkout</h1>
</section>

<!--section for orders-->
<section class="checkout">


<form action="" method="POST">
<div class="flex">
<div class="inputBox">
    <span>Name: </span>
    <input type="text" class="f" name="name" required placeholder="enter your name">
</div>
<div class="inputBox">
    <span>Email: </span>
    <input type="text"  class="f" name="email" required placeholder="enter your email">
</div>
<div class="inputBox">
    <span>number: </span>
    <input type="text"  class="f" name="number" required placeholder="enter your number">
</div>
<div class="inputBox">
    <span>Paymend method: </span>
    <select name="method">
    <option value="Cash on pickup">Cash on pickup</option>
    <option value="Credit Card">Paypal</option>
    </select>
</div>

<input type="submit" value="Order now" class="btn" name="orderbtn">

</div>
</form>




    
</section>


<section class="update_book">

<?php
if(isset($_POST['orderbtn']))
{

          
    $sql = mysqli_query($conn, "SELECT * FROM orders WHERE id = (select max(id) from orders) and user_id = '$user_id'") or die ('failed');
    if( mysqli_num_rows($sql) > 0)
    {
        
        while($fetch = mysqli_fetch_assoc($sql)){
?>

<div class="reference">

<p>Order success!</p>

<p> Order Reference number : <?php echo $fetch['id']?><?php echo $user_id?></p>
<form action="shopping.php" method="POST">
    <input type="submit" name="close" value="Close">
</form>

</div>

<?php
        }
    } 

}else
{

    echo '<script > document.querySelector(".update_book").style.display = "none"; </script>';

}
?>


</section>
<script src="js/script.js"></script>
<?php include 'footer.php'; ?>
</body>
</html>