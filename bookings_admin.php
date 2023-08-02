<?php
include ("DBconn.php");


session_start();

$user_id = $_SESSION['id'];

if(!isset($user_id))
{
    header('location:adminLog.php');
}


if(isset($_GET['delete']))
{
    $delete_id = $_GET['delete'];
   
    mysqli_query($conn,"DELETE FROM bookings WHERE id = '$delete_id' ") or die('failed');

    header('location:bookings_admin.php');
}


?>

<!DOCTYPE html>
<html>
    <head>
        <title>Bookings</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="s.css">
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
    <h1>Bookings</h1>
</section>

<!--section for bookings-->
<section class="bookings">

 

    <div class="container">

        <?php
        $select = mysqli_query($conn, "SELECT * FROM bookings") or die ('failed');

        if(mysqli_num_rows($select)>0)
        {
            while($fetch_bookings = mysqli_fetch_assoc($select))
            {
       
        ?>

        <div class="box">
            <p>Name : <span><?php echo $fetch_bookings['name'] ?></span></p>
            <p>Email : <span><?php echo $fetch_bookings['email'] ?></span></p>
            <p>Number : <span><?php echo $fetch_bookings['number'] ?></span></p>
            <p>Date : <span><?php echo $fetch_bookings['date'] ?></span></p>
            <p>Time : <span><?php echo $fetch_bookings['time'] ?></span></p>
            <p>Message : <span><?php echo $fetch_bookings['message'] ?></span></p>
            <a href="bookings_admin.php?delete=<?php echo $fetch_bookings['id']; ?>" onclick="return confirm('Delete this booking?');" >Delete</a>
       


        </div>
        <?php
         };

        }
        else
        {

            echo '<p class="Empty">There are no bookings placed yet!</p>';
      
        }?>

    </div>
    
</section>


<script src="js/script.js"></script>

</body>
</html>