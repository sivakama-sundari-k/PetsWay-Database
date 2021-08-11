<?php 
session_start();
if(!isset($_SESSION['login_user']))
{
	header("location:login.php");
}

if(isset($_POST['petID'])){

    //set connection variables
    $server="localhost:3307";
    $username="root";//by default it is root
    $password="Si7122000%"; 
    

    //create a database connection
    $con=mysqli_connect($server,$username,$password); // it takes 3 parameters

    //check for connection success
    if(!$con){
        die("connection to this  database failed due to " . mysqli_connect_error());

    }
    
    $petID=$_POST['petID'];

    $sql="SELECT `petswaydatabase`.`pets`.petImage,`petswaydatabase`.`pets`.petName,`petswaydatabase`.`pets`.petBreed,`petswaydatabase`.`pets`.petGender,`petswaydatabase`.`pets`.petAge,`petswaydatabase`.`pets`.petDesc, `petswaydatabase`.`pets`.petPrice FROM `petswaydatabase`.`pets` WHERE `petswaydatabase`.`pets`.petID='$petID';";
    
    $result=mysqli_query($con,$sql) or die(mysqli_error($con));
     
   $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Details</title>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="reg.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="menunew.css">
    <style>
       p,h1{
            color:#0d0d0d;
           font-family: 'Tajawal', sans-serif;
        }
        </style>

</head>
<body style="background-color: #0d0d0d;">
  <marquee style="font-family: auto;
    opacity: 0.7;
    color: darkgrey;
    text-align: center;
    word-spacing: 4px; width:100% "> <span class="material-icons">
local_offer </span>   upto 50% off on all products. <a href="myaccounthomepage.html" style ="color:white;font-family: auto; "> shop now.</a></marquee>
</div>
<div class="adminbuttons" style="background-color:#000000;    text-align: end;
        word-spacing: 23px;
    background-color: #000000;
    margin-right: 43px;">
        
        <div class="dropdown" style="margin-right: 3px; ">
       
            <button type="menu" class="dropbtn" style="width: -webkit-fill-available;"><span class="material-icons">
account_circle
</span> My Account </button>
            <div class="dropdown-content" style="text-align: left; word-spacing:4px;">
                <a href="myaccount.php">View Profile</a>
                <a href="logout.php">Logout</a>
            </div>
        </div>
</div>
    <img src="petswayheaderblack.png" alt="Pet's Way Header">
    <div style="text-align: -webkit-center; word-spacing: 429px;margin-top: -5px;
    background-image:url(menubarblack.png);
    opacity: 0.9;">
        <div class="dropdown">
            <button type="menu" class="dropbtn"> DOGS </button>
            <div class="dropdown-content" style="text-align: left; word-spacing:4px;">
                <a href="dogresults.php">Pups</a>
                <a href="dogproductresults.php">Products</a>
                
            </div>
        </div>
        <div class="dropdown">
            <button type="menu" class="dropbtn"> CATS </button>
            <div class="dropdown-content" style="text-align: left;word-spacing:4px;">
                <a href="catresults.php" style="white-space:pre-line;">Kittens</a>
                <a href="catProductResults.php">Products</a>
                
            </div>
        </div>
    
    </div>

<div style =" word-spacing: 7px;
    text-align: center;
    background-color: #000000;
    color: white;
    font-size: xx-large;
    margin-top: 95px;"> 
         View Pet Details 
   
    </div>

    <!-- <div class="container" style="align-items: center; text-align: center; align-content: center;"> -->
    
    
    <div class="grid-container" style="display: grid;
    grid-gap: 70px;
    grid-template-columns: auto auto;
    background-color: #0d0d0d;
    margin-top: 30px;
    padding:90px;opacity:1;">
  <div class="grid-item" style="background-color: #0d0d0d;
    text-align: center;">
    <img style="width:250px; height:300px;" src="petImage\<?php echo $row["petImage"]; ?>" alt="image">
</div>
<form action="buyPet.php" method="post">
  <div class="grid-item" style="background-color: whitesmoke;
    padding-left: 58px;
    padding-top: 40px; padding-bottom: 40px;padding-right: 58px;">
      <h1 style="text-align: center; opacity: 50%;"><?php echo $row["petName"]; ?></h1>
    <p> Breed: <?php echo $row["petBreed"]; ?> </p>
    <p> Gender: <?php echo $row["petGender"]; ?> </p>
    <p> Age (in months): <?php echo $row["petAge"]; ?> </p>
    <p> Description: <?php echo $row["petDesc"]; ?>  </p>
    <p style="-webkit-text-stroke: thin;
    font-size: larger;"> Price: Rs. <?php echo $row["petPrice"]; ?> </p>
    <input style="width:0%;" type="hidden" name="petID" value= <?php echo $petID; ?>>
            <div class="middle" style="text-align: center;">
            
            <button class="text" type ="submit" style="word-spacing: normal;"> Buy </button>
            </div> 
</div>
    </form>
</div>
    <div class="grid-container">
  <div class="grid-item"> <span class="material-icons">
storefront
</span>About <br> <br> Founded in 2017 in Bangalore, Pet's Way, created on the mindset of curating a selection of excellent products for cats and dogs, aims to be the most trusted and convenient online pet shop. <a href="about.html">Read more.</a></div>
  <div class="grid-item"> <span class="material-icons">
store
</span> Address <br> <br> 40, St Mark's Road <br> Ashok Nagar <br> Bengaluru <br> Karnataka <br> 560001 </div>
  <div class="grid-item">Contact <br> <br>
            <a href="mailto:sivakamasundarik7@gmail.com"> <span class="material-icons">
mail
</span> Email</a> <br> <span class="material-icons">
smartphone
</span>
            Message us on WhatsApp <br> +91 9981839527</div>  
    <div class="grid-item">Follow us <br> <br> <i class="fa fa-instagram"></i>  <a href="#">Instagram</a> <br> <span class="material-icons">
facebook
</span> <a href="#"> Facebook</a>
</div>
</div>



    </body>
</html>