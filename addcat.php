<?php 

$insert=false;
if(isset($_POST['petName'])){
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
    

    
    $petName=$_POST['petName'];
    $petBreed=$_POST['petBreed'];
    $petPrice=$_POST['petPrice'];
    $petAge=$_POST['petAge'];
    $petDesc=$_POST['petDesc'];
    $petGender=$_POST['petGender'];
    $filename = $_FILES["petImage"]["name"]; 
    $tempname = $_FILES["petImage"]["tmp_name"];     
        $folder = "petImage/".$filename; 
        
          
                // Now let's move the uploaded image into the folder: image 
        if (move_uploaded_file($tempname, $folder))  { 
            echo '<script> alert("Image uploaded successfully") </script>';
    $sql = "INSERT INTO `petswaydatabase`.`pets`(`petType`, `petName`, `petBreed`, `petPrice`, `petAge`, `petCategoryID`, `petGender`,  `petImage`,`petStatus`,`petDesc`) VALUES ('Cat', '$petName', '$petBreed', '$petPrice', '$petAge','3', '$petGender', '$filename','available','$petDesc');"; // backtick and NOT SINGLE QUOTE!!!


    if($con->query($sql) == true){
        $insert=true;
        echo '<script> alert("Addition Successful!") </script>';
        include 'inventorycat.php';
        exit();
    }
    else{
        echo "ERROR: $sql <br> $con->error";
        
    }
$con->close();
}
    else{
        echo '<script> alert("Image not uploaded. Please try uploading again :-(") </script>';
          exit();
        include 'addcat.php';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add a Cat</title>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="reg.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="menunew.css">

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
       
            <button type="menu" class="dropbtn" style="width: -webkit-fill-available;"> <span class="material-icons">
pets
</span>Inventory</button>
            <div class="dropdown-content" style="text-align: left; word-spacing:4px;">
                <a href="inventorydog.php">Dogs</a>
                <a href="inventorycat.php">Cats</a>
                <a href="dogproducts.php">Dog Products</a>
                <a href="catproducts.php">Cat Products</a>
            </div>
        </div>
        <div class="dropdown" style="margin-right: 3px; ">
       
            <button type="menu" class="dropbtn"> <span class="material-icons">
shopping_basket
</span>Orders</button>
            <div class="dropdown-content" style="text-align: left; word-spacing:4px;">
                <a href="ordersdog.php">Dogs</a>
                <a href="orderscat.php">Cats</a>
                <a href="ordersdogproduct.php">Dog Products</a>
                <a href="orderscatproduct.php">Cat Products</a>
            </div>
        </div>
        <div class="dropdown" style="margin-right: 3px; ">
       
            <button type="menu" class="dropbtn" style="width: -webkit-fill-available;"><span class="material-icons">
account_circle
</span> My Account </button>
            <div class="dropdown-content" style="text-align: left; word-spacing:4px;">
                <a href="myaccountadmin.php">View Profile</a>
                <a href="adminlogout.php">Logout</a>
            </div>
        </div>
</div>
    <img src="petswayheaderblack.png" alt="Pet's Way Header">
    
    <div style =" word-spacing: 7px;
    text-align: center;
    background-color: #000000;
    color: white;
    font-size: xx-large;
    margin-top: 95px;"> 
         Add a Cat 
   
    </div>
<div class="container" style="align-items: center; text-align: center; align-content: center;">
    
    <!-- <h1 style="text-align: center; opacity: 50%;">Add a Cat</h1> -->
    <form action="addcat.php" method="post" id="form" enctype="multipart/form-data">
        <label for="petName">Name: </label>
        <input type="text" name="petName" id="petName" placeholder="Enter pet's name here"  required> <br>
        <label for="petImage">Upload Pet Image: </label> <br>
            <input type="file" name="petImage" value="" required> 
            <br>
        <label for="petGender">Gender: </label>
        <select name="petGender" id="petGender" style="width: -webkit-fill-available; color:black; padding: 12px;background-color:white;
    margin-top: 11px;
    font-size: inherit;
    margin-bottom: 18px;"> <option disabled value="" selected hidden style ="color:black;">Select Gender</option>
                <option value="M" style ="color:black;">Male</option>
            <option value="F" style ="color:black;">Female</option>          </select>    
         <br> 
        <label for="petBreed">Breed: </label>
        <input type="text" name="petBreed" id="petBreed" placeholder="Enter pet breed here" 
         required> <br>
        <label for="petAge">Age: </label>
        <input type="number" name="petAge" id="petAge" placeholder="Enter pet's age in months" required> <br>
        <label for="petBreed">Description: </label>
        <input type="text" name="petDesc" id="petDesc" placeholder="Enter pet description here" 
         required> <br>
        <label for="petPrice">Price: </label>
        <input type="number" name="petPrice" id="petPrice" placeholder="Enter price" required> <br>
        
     <button type="submit" class = "register" style="    margin-top: 13px;
    padding: 5px;
    width: 79px;margin-left: 85px;"> Add <span class="material-icons">
add</span></button>
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