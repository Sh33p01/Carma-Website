<?php
include ("DBconn.php");
session_start();
$user_id = $_SESSION['id'];

if(!isset($user_id))
{
    header('location:login.php');
}

if(isset($_POST['update_cart'])) /*update one from cart*/
{
    $cartid = $_POST['cart_id'];
    $cartQ = $_POST['qty'];

    mysqli_query($conn, "UPDATE cart SET quantity = '$cartQ' WHERE id = '$cartid'") or die('failed');

    $message[] = 'Cart quantity is updated';
}

if(isset($_GET['deleteAll'])) /*delete all from cart*/
{
    $deleteAll = $_GET['deleteAll'];

    mysqli_query($conn, "DELETE FROM cart WHERE user_id = '$user_id';") or die('failed');
    header("location:cart.php");

}

if(isset($_GET['delete'])) /*delete one from cart*/
{
    $removeItem = $_GET['delete'];
    
    mysqli_query($conn, "DELETE FROM cart  WHERE id = '$removeItem' ") or die('failed');
    header("location:cart.php");
}


?>

<!DOCTYPE html>
<html>
    <head>
        <title>Cart</title>
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
    <h1>Shopping Cart</h1>
</section>

<!--section for orders-->
<section class="cart">



<div class="container">
    <?php
 $grandTotal = 0;
    $select_p = mysqli_query($conn, "SELECT * FROM cart WHERE user_id = '$user_id'") or die('failed');

    if(mysqli_num_rows($select_p) > 0 )
    {

        while($fetch_cart = mysqli_fetch_assoc($select_p))
        {

       
    ?>
    <div class="box">
      
   


        <img src="uploaded_img/<?php echo $fetch_cart['image'];?>">
        <div class="name"><?php echo $fetch_cart['name']; ?></div>
        <div class="price">R<?php echo $fetch_cart['price']; ?></div>
        <form action=""method="POST">
            <input type="hidden" name="cart_id" value="<?php echo $fetch_cart['id'];?>">
            <input type="number" name = "qty"class ="qty"min="1" value="<?php echo $fetch_cart['quantity'];?>">
            <div class="price2"> sub total : R<span><?php echo $sub_total = ($fetch_cart['quantity'] * $fetch_cart['price']);?></span>  </div><!-- calculating the sub total of book-->
            <input type="submit" name="update_cart" value="update"
            class="btn">
        </form>
        <a href="cart.php?delete=<?php echo $fetch_cart['id'];?>" onclick="return confirm('Remove this product?');" >Remove</a>
     
       
    </div>
    <?php
    $grandTotal += $sub_total;

       }

       }
       else
       {
       
           echo '<p class="Empty">Cart is empty</p>';
       }
    
    ?>

</div>
    
</section>

<section class="bh">
<div class="total">
    <p>Grand total: R<span><?php echo $grandTotal?></span></p>
    <div class="bottom">
        <a href="shopping.php" class="shopBtn">continue shopping</a>
        <a href="cart.php? deleteAll" class="shopClear" onclick="return confirm('clear your cart?')">Delete All</a>
        <a href="checkout.php" class="checkoutBtn <?php echo ($grandTotal>1)?'':'disabled';?>">Proceed to checkout</a>
    </div>

</div>
</section>



<script src="js/script.js"></script>
<?php include 'footer.php'; ?>
</body>
</html>