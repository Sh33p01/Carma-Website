<?php
include ("DBconn.php");
session_start();



$stickyName = "";

$stickyPass = "";
if(isset($_POST['login']))
{
    $name = $_POST['u_Email'];
    $pass = $_POST['u_Pass'];
   

    $email = mysqli_real_escape_string($conn, $name);
    $password = mysqli_real_escape_string($conn, $pass);

    $select_student = mysqli_query($conn, "SELECT * FROM adminlog WHERE email = '$email' AND password = '$password' ;") or die('failed');
    if(mysqli_num_rows ($select_student) > 0 )
    {
        $fetch = mysqli_fetch_assoc($select_student);
        $_SESSION['namee'] = $fetch['email'] ;
  


        if($fetch['email'] == $email && $fetch['password'] == $password )
        {
        
     
            $_SESSION['id'] = $fetch['id'];
            $_SESSION['namee'] = $fetch['email'];
                header('location:admin_home.php');
            
        }
     
    }
    else{
      
        $message[] = 'Incorrect email or password!';
        $stickyName =  $name;
    }



}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="login.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
        
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
<div class="header">
<header></header>
</div>


<section class="clas">
<div class="container">
<form action="" method="POST">
<h2>Admin's Login</h2>
    <p class="please">Authorised users only!</p>
  <!--<div class="imgcontainer">
  <img src="images/logo.jpg">
  </div>
  -->
  <img src="images/thelogo.png">

 


    <input type="text" placeholder="Enter admin Email" name="u_Email" required  value="<?= $stickyName?>">
    <input type="password" placeholder="Enter admin Password" name="u_Pass" required>      
    <button type="submit" name="login"  >Login</button>

  <p class="text">Not an admin?<a href="login.php" style="color:blue">Go to Client page</a></p>
  

 
</form>
</div>
</section>

</body>
</html>