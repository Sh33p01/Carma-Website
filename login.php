<?php
include ("DBconn.php");
session_start();



$stickyName = "";

$stickyPass = "";
if(isset($_POST['login']))
{
    $name = $_POST['u_Email'];
    $pass = $_POST['u_Pass'];
    $hashed_pass = md5($pass);

    $student_name = mysqli_real_escape_string($conn, $name);
    $password = mysqli_real_escape_string($conn, $hashed_pass);

    $select_student = mysqli_query($conn, "SELECT * FROM reguser WHERE User_Email = '$student_name' AND User_Password = '$password' ;") or die('failed');
    if(mysqli_num_rows ($select_student) > 0 )
    {
        $fetch = mysqli_fetch_assoc($select_student);
        $_SESSION['namee'] = $fetch['User_Email'] ;
  


        if($fetch['User_Email'] == $student_name && $fetch['User_Password'] == $password )
        {
        
     
            
                $_SESSION['id'] = $fetch['id'];
                $_SESSION['namee'] = $fetch['User_Email'];
                header('location:home1.php');
            
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
    <link rel="stylesheet" href="logins.css">
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
<h2>Login</h2>
    <p class="please">Please login first before using website</p>

  <img src="images/thelogo.png">


 


    <input type="text" placeholder="Enter User Email" name="u_Email" required  value="<?= $stickyName?>">
    <input type="password" placeholder="Enter Password" name="u_Pass" required>      
    <button type="submit" name="login"  >Login</button>

  <p class="text">Not registered yet?<a href="reg.php" style="color:dodgerblue">Register Now!</a></p>
  <a href="adminLog.php" style="color:dodgerblue">admin</a></p>

 
</form>
</div>
</section>

</body>
</html>