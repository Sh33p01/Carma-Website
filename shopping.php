<?php
include ("DBconn.php");
session_start();

$user_id = $_SESSION['id'];

if(!isset($user_id))
{
    header('location:login.php');
}

if(isset($_POST['add_to_cart']))
{
    $products_name = $_POST['product_name'];
    $products_price = $_POST['product_price'];
    $products_image = $_POST['product_image'];
    $products_quatity = $_POST['product_quantity'];

    $check = mysqli_query($conn, "SELECT * FROM cart WHERE name = '$products_name' AND user_id = '$user_id'") or die('failed');
  
    if(mysqli_num_rows($check)> 0)
    {
        $message[]= 'alredy added';

    }
    else
    {

        mysqli_query($conn, "INSERT INTO cart (user_id, name, price, quantity, image) VALUES ('$user_id', '$products_name', '$products_price', '$products_quatity', '$products_image')") or die('Failedk');

        $message[]= ' added';
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
    <h1>Shop</h1>
</section>

<!--section for orders-->
<section class="shop">

<div class="container">
    <?php

    $select_p = mysqli_query($conn, "SELECT * FROM products") or die('failed');

    if(mysqli_num_rows($select_p) > 0 )
    {

        while($fetch_products = mysqli_fetch_assoc($select_p))
        {

       
    ?>
    <div class="box">
        <form action="" method="POST">
        <img src="uploaded_img/<?php echo $fetch_products['image'];?>">
        <div class="name"><?php echo $fetch_products['name'];?></div>
        <div class="price">R<?php echo $fetch_products['price'];?></div>
        <input type="number" min="1" name="product_quantity" value="1" class="qty">
        <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
        <input type="hidden" name="product_image" value="<?php echo $fetch_products['image'];?>">
        <input type="hidden" name="product_price" value="<?php echo $fetch_products['price'];?>">
        <input type="submit" value="Add to cart" name="add_to_cart" class="addBtn">

        </form>

       

    </div>
    <?php
       }
       }
       else
       {
       
           echo '<p class="Empty">There are no products added yet!</p>';
       }
    
    ?>

</div>
    
</section>



<script src="js/script.js"></script>
<?php include 'footer.php'; ?>
</body>
</html>