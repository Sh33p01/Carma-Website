
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <link rel="stylesheet" href="sa.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
</head>
<body>

    <header class="header">


        <section class="flex">

            <a href="index.php" class="logo">Carma & Effect</a>
            
           

            <div class="icons">

              
            
                <a href="index.php"><i class="fa fa-chevron-left"></i></a>
             
  
            </div>

           
        </section>
        
    </header>
    




    <script>
        navbar = document.querySelector('.header .flex .navbar');

document.querySelector('#menu-btn').onclick = () =>{
    navbar.classList.toggle('active');
}


let user = document.querySelector('.header .flex .user');

document.querySelector('#user-btn').onclick = () =>{
    user.classList.toggle('active');
}
    </script>
</body>
</html>