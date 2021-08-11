<?php 

$insert=false;
if(isset($_POST['adminUsername'])){
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

    //Successful connection
    
    
    $adminUsername=$_POST['adminUsername'];
    $adminPassword=$_POST['adminPassword'];
    // $sql = " `petswaydatabase`.`customerNew`(`custFirstName`, `custLastName`, `custUsername`, `custPassword`, `custAddress`, `custEmailID`, `custContactNum`) VALUES ('$custFirstName', '$custLastName', '$custUsername', '$custPassword', '$custAddress', '$custEmailID', '$custContactNum');"; // backtick and NOT SINGLE QUOTE!!!
    $sql = "SELECT * FROM `petswaydatabase`.`admin` WHERE `adminUsername` = '$adminUsername' and `adminPassword` = '$adminPassword';";
    session_start();
    

    if(mysqli_num_rows($con->query($sql))==1){
        $insert=true;
        
         $_SESSION['login_user']=$adminUsername;
        // echo '<script> alert("You are now logged in.") </script>';
        header("Location: adminhomepage.html");
        exit();

        
    }
    else{
        echo '<script> alert("Invalid username or password.")</script>';
        
        
            }
$con->close();
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="reg.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="menunew.css">
</head>
<body style="background-color: #0d0d0d;">
    <div style="background-color:#000000;
    text-align: right;
    word-spacing: 429px;
    margin-top: -7px;">
      <marquee style="font-family: auto;
    opacity: 0.7;
    color: darkgrey;
    text-align: center;
    word-spacing: 4px; width:100% "> <span class="material-icons">
local_offer </span>   upto 50% off on all products. <a href="myaccounthomepage.html" style ="color:white;font-family: auto; "> shop now.</a></marquee>
        <div class="dropdown" style="margin-right: 3px; ">
       
            <button type="menu" class="dropbtn"><span class="material-icons">
login </span> Login</button>
            <div class="dropdown-content" style="text-align: left; word-spacing:4px; margin-left:-12px;">
                <a href="login.php">Customer</a>
                <a href="adminlogin.php">Admin</a>
            </div>
        </div>
    </div>
    <img src="petswayheaderblack.png" alt="Pet's Way Header">
    
    <div class = "container">
        <div style="text-align: center;">
        <span class="material-icons" style="font-size: -webkit-xxx-large;margin-bottom: 32px;">admin_panel_settings</span>
</div>
        <form action="adminlogin.php" method="post">
            
            <label for="adminUsername">Username: </label>
            <input type="text" name="adminUsername" id="adminUsername" placeholder="Enter your username here" required> <br>
            <label for="adminPassword">Password: </label>
            <input type="password" name="adminPassword" id="adminPassword" placeholder="Enter your password here" required> <br>
            <button type="submit"  style="margin-left: 100px;
    margin-top: 17px"> Login </button> <br>

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