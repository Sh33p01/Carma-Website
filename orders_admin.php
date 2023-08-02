<?php
include ("DBconn.php");
session_start();

$user_id = $_SESSION['id'];

if(!isset($user_id))
{
    header('location:adminLog.php');
}

if(isset($_POST['update_order']))
{
    $order_id = $_POST['order_id'];
    $update_p = $_POST['update_payment'];
    mysqli_query($conn,"UPDATE orders SET payment_status =  '$update_p' WHERE id= '$order_id' ") or die('failed');

    $message[]= 'order payment status has been update';
}

if(isset($_GET['delete']))
{
    $delete_id = $_GET['delete'];
   
    mysqli_query($conn,"DELETE FROM orders WHERE id = '$delete_id' ") or die('failed');

    header('location:orders_admin.php');
}


?>

<!DOCTYPE html>
<html>
    <head>
        <title>Orders</title>
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
    <h1>Orders</h1>
</section>

<!--section for orders-->
<section class="orders_placed">

    <h1>Placed Orders</h1>

    <div class="container">

        <?php
        $select = mysqli_query($conn, "SELECT * FROM orders") or die ('failed');

        if(mysqli_num_rows($select)>0)
        {
            while($fetch_orders = mysqli_fetch_assoc($select))
            {
       
        ?>

        <div class="box">

        <p>user id : <span><?php echo $fetch_orders['user_id']; ?></p>
        <p>Placed on : <span><?php echo $fetch_orders['placed_on']; ?></p>
        <p>Name : <span><?php echo $fetch_orders['name']; ?></p>
        <p>user id : <span><?php echo $fetch_orders['user_id']; ?></p>
        <p>Number: <span><?php echo $fetch_orders['number']; ?></p>
        <p>Products : <span><?php echo $fetch_orders['total_products']; ?></p>
        <p>Price : <span>R<?php echo $fetch_orders['total_price']; ?></p>
        <p>Paymend method : <span><?php echo $fetch_orders['method'] ;?></p>
        <form action="" method="POST">
            <input type="hidden" name="order_id" value="<?php echo $fetch_orders['id']; ?>">
            <select name="update_payment">
                <option value="" selected disabled><?php echo $fetch_orders['payment_status']; ?></option>
                <option value="pending">Pendings</option>
                <option value="complete">Complete</option>
            </select>
            <input type="submit" value="Update" name="update_order" class="optionBtn">
            <a href="orders_admin.php?delete=<?php echo $fetch_orders['id']; ?>" onclick="return confirm('Delete this order?');" >Delete</a>
        </form>

        </div>
        <?php
         }

        }
        else
        {

            echo '<p class="Empty">There are no orders placed yet!</p>';
      
        }?>

    </div>
    
</section>




</body>
</html>