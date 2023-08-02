<?php
include ("DBconn.php");
session_start();

$user_id = $_SESSION['id'];

if(!isset($user_id))
{
    header('location:adminLog.php');
}

if(isset($_POST['add_product']))
{
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $price =  $_POST['price'];
    $image = $_FILES['image']['name'];
    $image_size = $_FILES['image']['size'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder = 'uploaded_img/'.$image;

    $select_product = mysqli_query($conn, "SELECT name FROM products WHERE name = '$name'") or die('failed');

    if(mysqli_num_rows($select_product) > 0 )
    {
        $message[] = 'Product name already added';
    }
    else
    {
        $add_product = mysqli_query($conn, "INSERT INTO products (name,price,image) VALUES ('$name', '$price', '$image')") or die('failed');

        if($add_product)
        {
            if($image_size > 2000000)
            {
                $message[] = 'image size is too large';
            }
            else
            {
                move_uploaded_file($image_tmp_name, $image_folder);
                $message[] = 'Product added!';
            }
        
        }
        else
        {
            $message[] = 'failed to add';

        }

      
    }
    
    
}

if(isset($_GET['delete']))
{
    $delete = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM products WHERE id = '$delete' ") or die('failed');
    header('location:products_admin.php');
}

if(isset($_POST['updateBtn']))
{
    $update_i = $_POST['update_p_id'];
    $update_n = $_POST['update_name'];
    $update_p = $_POST['update_price'];

    mysqli_query($conn, "UPDATE products SET  name = '$update_n', price = '$update_p' WHERE id = '$update_i'") or die ('failed');


    $update_imag = $_FILES['update_image']['name'];
    $update_imag_tmp_name = $_FILES['update_image']['tmp_name'];
    $update_imag_size = $_FILES['update_image']['size'];
    $update_folder = 'uploaded_img/'.$update_imag;
    $update_old = $_POST['update_old_image'];

    if(!empty($update_imag))
    {
        if($update_imag_size > 2000000)
        {
   $message[]='The image size is too large';
        }
        else
        {
            mysqli_query($conn, "UPDATE products SET  image = '$update_imag' WHERE id = '$update_i'") or die ('failed');

            move_uploaded_file($update_imag_tmp_name,$update_folder);
            unlink('uploaded_img/'.$update_old);

       
        }

    }
    header('location:products_admin.php');

}

if(isset($_POST['updateBtn']))
{

    header('location:products_admin.php');

}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Product</title>
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
include ('adminNav.php');
?>
<section class="titlePage">
    <h1>Products</h1>
</section>

<section class="products_add">
<form action="" method="POST"  enctype="multipart/form-data">
    <h2>Add a product</h2>
    <input type="text" name="name" class="box" placeholder="Enter products name" required>
    <input type="number" name="price" min="0" class="box" placeholder="Enter products price" required>
    <input type="file"  name="image"  accept="image/jpg, image/jpeg, image/png" class="box" required>
    <input type="submit" name="add_product" value="Add product" class="add_btn">
    
    
    

</form>
</section>
<!--$_COOKIE
section to show added products on the admin side 
-->
<section class="products_show">
<div class="container">
    <?php

    $select_p = mysqli_query($conn, "SELECT * FROM products") or die('failed');

    if(mysqli_num_rows($select_p) > 0 )
    {

        while($fetch_products = mysqli_fetch_assoc($select_p))
        {

       
    ?>
    <div class="box">
        <img src="uploaded_img/<?php echo $fetch_products['image'];?>">
        <div class="name" style="color: white"><?php echo $fetch_products['name'];?></div>
        <div class="price" style="color: white">R<?php echo $fetch_products['price'];?></div>
        <a href="products_admin.php?update=<?php echo $fetch_products['id'];?>" class="option-btn">update</a>
        <a href="products_admin.php?delete=<?php echo $fetch_products['id'];?>" class="delete-btn" onclick="return confirm('Remove this product?')">Delete</a>


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
    

<section class="edit">

<?php
if(isset($_GET['update']))
{
    $update_id = $_GET['update'];
    $update = mysqli_query($conn, "SELECT * FROM products WHERE id = '$update_id'") or die('failed');
    if(mysqli_num_rows($update) > 0 )
    {
        while($fetch_update = mysqli_fetch_assoc($update))
        {
?>

<form action="" method="POST" enctype="multipart/form-data">

<input type="hidden" name="update_p_id" value="<?php echo $fetch_update['id']?>">
<input type="hidden" name="update_old_image" value="<?php echo $fetch_update['image']?>">



<img src="uploaded_img/<?php echo $fetch_update['image']?>">
<input type="text" name="update_name" value="<?php echo $fetch_update['name']?>" class="box" required placeholder="Enter product name">
<input type="number" name="update_price" value="<?php echo $fetch_update['price']?>" class="box" required placeholder="Enter product price" min="0">
<input type="file" name="update_image" accept="image/jpg, image/jpeg, image/png"class="box" >
<input type="submit" value="update/close" name="updateBtn" class="add_btn">


</form>

<?php

}
}

}
else
{
    echo '<script > document.querySelector(".edit").style.display = "none"; </script>';

}
?>


</section>
   
<script src="admin_script.js"></script>

</body>
</html>