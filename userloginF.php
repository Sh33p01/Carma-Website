<?php 
include ("DBconn.php");
session_start();

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
                header('location:index.php');
            
        }
     
    }
    else{
      
        $message[] = 'Incorrect name or student number or password!';
        $stickyName =  $name;
       
        $stickyPass = $pass;
    }



}

?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">


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



<form action="" method="POST">
  <div class="imgcontainer">
  <img src="images/logo.jpg">
  </div>
  <div class="container">

    <input type="text" placeholder="Enter User Email" name="u_Email" required>

    <input type="password" placeholder="Enter Password" name="u_Pass" required>
        
    <button type="submit" name="login" >Login</button>

  </div>

  <p>Not registered yet? 

  <a href="registrationFE.php" style="color:dodgerblue">Register Now!</a></p>
  <a href="#" style="color:dodgerblue">admin</a></p>

  <div class="clearfix">
      <button type="reset" class="cancelbtn">Clear</button>
    </div>
</form>

</body>
</html>