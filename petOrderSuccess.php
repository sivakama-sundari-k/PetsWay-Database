<?php 

session_start();
if(!isset($_SESSION['login_user']))
{
	header("location:login.php");
}

if(isset($_POST['CardNumber'])){

    //set connection variables
    $server="localhost:3307";
    $username="root";//by default it is root
    $password="Si7122000%"; 
    
    $custID=$_POST['custID'];
    $petID=$_POST['petID'];
    //create a database connection
    $con=mysqli_connect($server,$username,$password); // it takes 3 parameters

    //check for connection success
    if(!$con){
        die("connection to this  database failed due to " . mysqli_connect_error());

    }
    
     
    $sqlinsert="INSERT INTO `petswaydatabase`.`petorders` (`petID`,`custID`) VALUES ('$petID', '$custID');";

    $resultinsert=$con->query($sqlinsert);
    if($resultinsert){
    $sqlupdate="UPDATE `petswaydatabase`.`pets` SET `petswaydatabase`.`pets`.petStatus ='sold' WHERE `petswaydatabase`.`pets`.petID=$petID;";
    $resultupdate=$con->query($sqlupdate);
}
}
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Order Status</title>
        <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="reg.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="menunew.css">
    <style>
       p,h1,label{
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
                <a href="catProductResults.php">Product</a>
                
            </div>
        </div>
    
    </div>

<div style =" word-spacing: 7px;
    text-align: center;
    background-color: #000000;
    color: white;
    font-size: xx-large;
    margin-top: 95px;"> 
         Order Status
   
    </div>
     <div style =" word-spacing: 7px;
    text-align: center;
    background-color: #000000;
    color: white;
    font-size: xx-large;
    margin-top: 95px;"> 
<?php
        if($resultinsert){
        
?>
        <h6> Order placed successfully! Thank you for shopping with us. We hope the pet will bring your home all the love and warmth.</h6>
    <?php } ?>
   
        </div>
    </body>
    </html>
    