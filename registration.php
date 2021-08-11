<?php 

$insert=false;
if(isset($_POST['custFirstName'])){
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
     $flag=0;

    $custFirstName=$_POST['custFirstName'];
    $custLastName=$_POST['custLastName'];
    $custUsername=$_POST['custUsername'];
    $custPassword=$_POST['custPassword'];
    $custAddress=$_POST['custAddress'];
    $custEmailID=$_POST['custEmailID'];
    $custContactNum=$_POST['custContactNum'];
    $sqlcheck="SELECT * from `petswaydatabase`.`customernew`";
    $resultcheck=$con->query($sqlcheck);
     while($rows=mysqli_fetch_array($resultcheck,MYSQLI_ASSOC)){
         if($custEmailID==$rows["custEmailID"]){
             echo '<script> alert("An account already exists with the given email ID. Please login to continue!") </script>';
             include "login.php";
             exit();
         }
         else if($custContactNum==$rows["custContactNum"]){
             echo '<script> alert("An account already exists with the given contact number. Please login to continue!") </script>';
             include "login.php";
             exit();
         }
         else if($custUsername==$rows["custUsername"]){
             echo '<script> alert("Username already taken!") </script>';
             $flag=1;
         }
     } 
    
        if($flag!=1){
             $filename = $_FILES["custImage"]["name"]; 
    $tempname = $_FILES["custImage"]["tmp_name"];     
        $folder = "custImage/".$filename; 
          
                // Now let's move the uploaded image into the folder: image 
        if (move_uploaded_file($tempname, $folder))  { 
            echo '<script> alert("Image uploaded successfully") </script>';
             
        
    $sql = "INSERT INTO `petswaydatabase`.`customerNew`(`custFirstName`, `custLastName`, `custUsername`, `custPassword`, `custAddress`, `custEmailID`, `custContactNum`,`custImage`) VALUES ('$custFirstName', '$custLastName', '$custUsername', '$custPassword', '$custAddress', '$custEmailID', '$custContactNum','$filename');"; // backtick and NOT SINGLE QUOTE!!!
        }

    if($con->query($sql) == true){
        $insert=true;
        echo '<script> alert("Registration Successful!") </script>';
        
        
    }
    else{
        echo "ERROR: $sql <br> $con->error";
        
    }
$con->close();
        }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Registration</title>
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
        <div class="dropdown" style="margin-right:13px; ">
       
            <button type="menu" class="dropbtn"><span class="material-icons">
login </span> Login</button>
            <div class="dropdown-content" style="text-align: left; word-spacing:4px;">
                <a href="login.php">Customer</a>
                <a href="adminlogin.php">Admin</a>
            </div>
        </div>
    </div>
    <img src="petswayheaderblack.png" alt="Pet's Way Header">
    
    <div class="container" style="align-items: center; text-align: center; align-content: center;">
    
    <h1 style="text-align: center; opacity: 50%;">Customer Registration</h1>
    <form action="registration.php" class="Registration Form" method="post" id="form" enctype="multipart/form-data">
        <label for="custFirstName">First Name: </label>
        <input type="text" name="custFirstName" id="custFirstName" placeholder="Enter your first name here" pattern="[A-Za-z]+" title="Please enter a valid name" required> <br>
        <label for="custLastName">Last Name: </label>
        <label for="petImage">Upload your image: </label> <br>
            <input type="file" name="custImage" value="" required> 
            <br>
        <input type="text" name="custLastName" id="custLastName" placeholder="Enter your last name here" pattern="[A-Za-z]+" title="Please enter a valid" required> <br>
        <label for="custUsername">Username: </label>
        <input type="text" label= "username" name="custUsername" id="custUsername" placeholder="Set your username" pattern="[a-z][a-z0-9_]*$" title="Please enter a username starting with a letter and having a combination of letters, digits or underscore (_) WITHOUT special characters. Ex: varshashree17, harshavardhan210, varsha, varsha_1 " required> <br>
        <label for="custPassword">Password: </label>
        <input type="password" name="custPassword" id="custPassword" placeholder="Set your password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
        title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" required> <br>
        <label for="custAddress">Address: </label>
        <input type="text" name="custAddress" id="custAddress" placeholder="Enter your address here" required> <br>
        <label for="custEmailID">Email ID: </label>
        <input type="email" name="custEmailID" id="custEmailID" placeholder="Enter valid email-id" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Please enter a valid email-id of the form abc@abc.in" required> <br>
        <label for="custContactNum">Contact Number: </label>
        <input type="text" name="custContactNum" id="custContactNum" placeholder="Enter your 10-digit phone number here" pattern="(6|7|8|9)\d{9}" title="Please enter a valid phone number" required> <br>
        
        <button type="submit" class = "register" style="margin-left: 74px; margin-top: 9px;"> Register Now </button>
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
