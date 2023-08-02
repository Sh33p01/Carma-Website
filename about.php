<!DOCTYPE html>
<html>
<head>
<title>About us</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
        
      
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>


.column {
  float: left;
  max-width: 500px;
 
  padding: 0 8px;

  margin: 0 auto;
  justify-content: center;
  text-align: center;
  align-content: center;
}
.row
{
  background-color: #2e2e2e;
  max-width: 500px;
  margin:0 auto;
  text-align: center;
  border-radius: 8px;
  margin-bottom:10px;
  
}
.card {
 /*  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);*/

  margin: 0 auto;
  background-color: red;
  max-width: 200px;
  
  justify-content: center;
  text-align: center;
  align-content: center;

}

.about-section {
  padding: 50px;
  text-align: center;

  color: white;
  border-bottom: 2px solid #C6A55C;
}

.container {
  padding: 0 16px;
}

.container::after, .row::after {
  content: "";
  clear: both;
  display: table;
}

.title {
  color: grey;
}

.button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #C6A55C;
  text-align: center;
  cursor: pointer;
  width: 100%;
}

.button:hover {
  background-color: #555;
}

@media screen and (max-width: 650px) {
  .column {
    width: 100%;
    display: block;
    margin: 0 auto;
  }
}

.mom
{


  margin-top:10px;
  height:22rem;
  width:24rem;
}
</style>
</head>
<body style="background-color:#1B1B1B;">
<?php include 'userNav3.php'?>

<div class="about-section">
  
<img src="images/thelogo.png" style="height:25rem">
  <h1 style="color:#C6A55C">About Us</h1>
  <p style="color:#C6A55C">Carma & Effect is a full service hair salon located in Garsfontein. 
    All of our stylists have completed extensive training through our advanced signature coloring and cutting 
    courses as well as having completed more than one Certifications.</p>
  <p style="color:#C6A55C">Carma & Effect is a group of passionate hair artists dedicated in creating hair styles and 
    amazing looking hair that will fit you best. We will make it our first choice of beauty.
    Taking style to the next level.</p>
</div>

<h2 style="text-align:center; color:#C6A55C">Our Team</h2>
<div class="row">
 
<img class="mom" src="images/AboutusPic.jpg">
      <div class="container">
        <h2 style="color:#C6A55C">  Natasha Retief</h2>
        <p class="title" style="color:#C6A55C">CEO & Founder</p>
        <p style="color:#C6A55C">carmaandeffect@gmail.com</p>

      </div>
   

</div>
<?php include 'footer.php'; ?>
</body>
</html>