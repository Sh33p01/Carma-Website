<?php include("DBconn.php"); 

session_start();

if(isset($_POST['login'])){

    $email = $_POST['u_Email'];
    $pass = $_POST['u_Pass'];

    $sql = mysqli_query($conn ,"SELECT * FROM regUser WHERE User_Email = '$email' AND User_Password = '$pass'") or die ('failed');


    if(mysqli_num_rows($sql) > 0){
        $fetch = mysqli_fetch_assoc($sql);



        if($fetch['User_Email'] = $email && $fetch['User_Password'] = $pass  )
        {
           

    
             $_SESSION('id') = $fetch['id'];
                header('location:index.php');
    
       
           

        }
     
    }
    else{
        $message[] = 'Incorrect name or student number or password!';
    }
}



?>
