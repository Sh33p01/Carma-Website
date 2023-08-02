<?php
include ("DBconn.php");
session_start();
$user_id = $_SESSION['id'];

if(!isset($user_id))
{
    header('location:login.php');
}

if(isset($_POST['add']))
{
    $products_quatity = $_POST['quatity'];
    $products_name = $_POST['book_name'];
    $products_price = $_POST['book_price'];
    $products_image = $_POST['book_image'];

  

    $check = mysqli_query($conn, "SELECT * FROM cart WHERE name = '$products_name' and user_id = '$user_id'  ") or die('failed');

    if(mysqli_num_rows($check)>0) {
        $message[] = 'alredy added';
    }else{
        mysqli_query($conn, "INSERT INTO cart (user_id, name, price, quantity, image) VALUES ('$user_id', '$products_name', '$products_price', '$products_quatity', '$products_image')") or die('Failedk');
 $message[] = 'added';
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
    <h1>Search</h1>
</section>

<section class="search">
  

    <div class="container">
    
    <form action="" method="POST" >
  
        <input type="text" name="search" class="box" placeholder="search product...." >
      
        <input type="submit" name="searchProduct" value="Search" class="searchBtn">

    </form>

    </div>


</section>
<section class="shop">
    <div class="container">
        <?php
        
        if(isset($_POST['searchProduct']))
        {
            $searchProduct = $_POST['search'];
            $select_products = mysqli_query($conn,"SELECT * FROM products Where name like '%{$searchProduct}%'") or die('failed');
            if(mysqli_num_rows($select_products) > 0)
            {
                while($get_product = mysqli_fetch_assoc($select_products))
                {

        ?>
        <div class="box">

<form action="" method="POST">
<img src="uploaded_img/<?php echo $get_product['image'];?>">
<div class="name"><?php echo $get_product['name'];?></div>
<div class="price">R<?php echo $get_product['price'];?></div>
<input type="number" class="qty" min="1" name="quatity" value ="1">
<input type="hidden" name="book_name" value="<?php echo $get_product['name']; ?>">
<input type="hidden" name="book_price" value="<?php echo $get_product['price']; ?>">
<input type="hidden"name="book_image"  value="<?php echo $get_product['image']; ?>" >

<input type="submit" value= "add to cart" name="add" class="addBtn">


</form>


</div>
<?php
                }

            }else{
    
                echo '<p class="Empty">Product not found</p>';
    
            }

        }
        else
        {
            echo '<p class="Empty">Search a product</p>';
        }

?>
    </div>

</section>


<script src="js/script.js"></script>
<?php include 'footer.php'; ?>
</body>
</html>