<?php
include ("DBconn.php");
session_start();
$user_id = $_SESSION['id'];

if(!isset($user_id))
{
    header('location:login.php');
}

if(isset($_POST['send']))
{
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $number = mysqli_real_escape_string($conn, $_POST['number']);
    $messages = mysqli_real_escape_string($conn, $_POST['message']);
    $Email = mysqli_real_escape_string($conn, $_POST['email']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $time = mysqli_real_escape_string($conn, $_POST['time']);
   

    $sendMessage = mysqli_query($conn, "INSERT INTO bookings (name, email, number, message, date, user_id, time) 
    VALUES('$name','$Email', '$number', '$messages', '$date', '$user_id', '$time')") or die('failed');

  
     $message[]='Bookings has been sent! We will get back to you in 30 min to an hour!';
     


}


?>

<style>
input[type="time"]::-webkit-calendar-picker-indicator{
background-color:white;
border-radius:15px;
}

input[type="date"]::-webkit-calendar-picker-indicator{
background-color:white;
border-radius:15px;
}

textarea
{
    margin-bottom:20px;
}
</style>

<!DOCTYPE html>
<html>
    <head>
        <title>Book</title>
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
    <h1>Book an appointment</h1>
</section>

<!--section for bookings-->

<section class="contact">
  

    <div class="container">
        
    <form action="" method="POST" >

        <input type="text" name="name" class="box" placeholder="enter your name" required>
        <input type="text" name="email" class="box" placeholder="enter your email" required>
        <input type="text" name="number" class="box" placeholder="your phone number" required>
        <input type="date" name="date" class="box" placeholder="date for bookings" required>
        <input type="time" name="time" class="box" placeholder="time for bookings" required>
        
        <textarea name="message"  rows="5" cols="20" placeholder="enter your message" required></textarea>
        <input type="submit" name="send" value="Send message" class="sendBtn">

    </form>

    </div>


</section>


<script src="js/script.js"></script>
<?php include 'footer.php'; ?>
</body>
</html>