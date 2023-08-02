<?php 

include ("DBConn.php");

if(isset($_POST['StudentLogbtn']))
{
$theName = $_POST['StudName'];
$thepass = $_POST['StudPass'];
$hash = md5($thepass);

$name = mysqli_real_escape_string($conn, $theName);
$pass = mysqli_real_escape_string ($conn, $hash);

$sql = "INSERT INTO reguser (User_Email, User_Password) VALUES ('$name','$pass');";

$sq = " SELECT * FROM reguser WHERE User_Email = '$name' AND User_Password = '$pass'";


$user = mysqli_query($conn,  $sq);

if(mysqli_num_rows($user) > 0) 
{
 $message[]= 'user already exist!';


}else
{

 mysqli_query($conn, $sql) ;
 $message[]= 'register success';
 
} 

}



?>


<!DOCTYPE html>
<html>
<head>
<title>register</title>
<link rel="stylesheet" href="logins.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
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

 
   
   <section class="clas">
    <div class="container">


   <form action="" method="POST" >

        <h2>Register</h2>
        <p> Please provide credentials</p>

        <img src="images/thelogo.png">
      <input type="text" name="StudName" placeholder="email" required>
    

      <input type="password" name="StudPass" placeholder="password" required>

  
             <input class="btn" type="submit" name="StudentLogbtn" value="Register">
      

    

     

  <div class="reg">
      <p> Already registered?  <a href="login.php" style="color:dodgerblue">  Login here</a></p> 
  </div>

</form>
</div>
   </section>

              
</body>   
</html>