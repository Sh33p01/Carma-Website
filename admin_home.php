
<?php

include ("DBconn.php");
session_start();

$user_id = $_SESSION['id'];

if(!isset($user_id))
{
    header('location:adminLog.php');
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Bookings</title>
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
    <h1>DashBoard</h1>
</section>

<!--section for dash-->
<section class="board">

    <div class="home_container">
        
    <div class= "Box">
           
        <?php

       
        $pendingSelect = mysqli_query($conn, " SELECT total_price FROM orders WHERE payment_status = 'pending'") or die('failed');
                                                                // we fetching the total number of pendings prices from the database and assigning it to pending total to display it
        
            $num_of_pending = mysqli_num_rows($pendingSelect);
        ?>

    <h3>
    <p>
        <?php
         echo $num_of_pending;
         ?>
         </p>
    </h3>

       <a href="orders_admin.php">Total pendings orders</a>
    </div>

    <div class= "Box">
           
           <?php
   
          
           $completeSelect = mysqli_query($conn, " SELECT total_price FROM orders WHERE payment_status = 'complete'") or die('failed');
   
        // we fetching the total number of pendings from the database and assigning it to pending total to display it
           
            $num_of_complete = mysqli_num_rows($completeSelect);
     ?>
       <h3>
           <p><?php
            echo  $num_of_complete;
            ?>
            </P>
       </h3>
 
        
          <a href="orders_admin.php">Complete Orders</a>
       </div>


       <div class = "Box">
           <?php
           $orders_select = mysqli_query($conn, "SELECT * FROM orders") or die('failed'); // fetching all available orders from the database.
           $num_of_orders = mysqli_num_rows($orders_select);
               
           ?>
            <p>
           <p><?php echo $num_of_orders; ?></p>
</P>
           <a href="orders_admin.php">Orders placed</a>


       </div>

       <div class = "Box">
           <?php
           $messages_select = mysqli_query($conn, "SELECT * FROM bookings") or die('failed'); // featching all available orders from the database.
           $num_of_messages = mysqli_num_rows($messages_select);
               
           ?>
           
           <p><?php echo $num_of_messages; ?></p>

           <a href="bookings_admin.php">Bookings</a>


       </div>

        
    </div>

</section>

<script>
    document.querySelector('#close-update').onclick = () =>
{
    document.querySelector('.edit').style.display = 'none';
    window.location.href = 'products_admin.php';
}


document.querySelector('#close').onclick = () =>
{
    document.querySelector('.update_book').style.display = 'none';
    window.location.href = 'checkout.php';
}

let user = document.querySelector('.header .flex .user');

document.querySelector('#user-btn').onclick = () =>{
    user.classList.toggle('active');
}
</script>
</body>
</html>