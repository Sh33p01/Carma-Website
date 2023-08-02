<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    

<header class="header">

<div class="headertwo">
<div class="flex" id="myTopnav">
<a href="index.html" class="logo">Carma & Effect</a>

    <nav class="navbar">
        <a href="index.html">Home</a>
        <a href="#">about us</a>
        <a href="#">Bookings</a>
        <a href="#">price list</a>
        <a href="#">shop</a>

    </nav>

    <div class="icons">

    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
    <a href="#" class="fas fa-search"></a>
    <div id="user-btn" class="fas fa-user"></div>
    <a href="#"><i class="fas fa-shopping-cart"></i><span>(00)</a>
</div>
<div class="userBox">
    <p></P>
</div>

    </div>

</div>

</header>
<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "flex") {
    x.className += " responsive";
  } else {
    x.className = "flex";
  }
}
</script>s
</body>
</html>