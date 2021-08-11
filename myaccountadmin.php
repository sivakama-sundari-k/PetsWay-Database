<?php
 include('adminsession.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
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
    
<!-- end of header and menubar -->
<div style =" word-spacing: 7px;
    text-align: center;
    background-color: #000000;
    color: white;
    font-size: xx-large;
    margin-top: 95px;"> 
    
            <span class="material-icons" style="font-size:x-large;">
account_box
</span>
         Profile
    </div>

    <div class="container" style="align-items: center; text-align: left; align-content: center;">
 
    <?php
    
    $sql="SELECT * FROM `petswaydatabase`.`admin` WHERE adminID=$loggedin_id;";
    
    
    $result1=mysqli_query($con,$sql) or die(mysqli_error($con));
    
    ?>
    <?php
    while($rows=mysqli_fetch_array($result1,MYSQLI_ASSOC)){
    ?>
    <div style="text-align:center;">
    <img src="adminImage\<?php echo $rows["adminImage"];  ?>" style="width:250px;height:300px;" alt="image">
    </div>
    <h3> ID: <?php echo $rows["adminID"]; ?> </h3>
    <h3> Username: <?php echo $rows["adminUsername"]; ?></h3>
    <h3> Name: <?php echo $rows["adminFirstName"]; ?> <?php echo $rows["adminLastName"]; ?> </h3>
    <h3> Address <span class="material-icons">
home
</span> : <?php echo $rows["adminAddress"]; ?> </h3>
    <h3> Email-ID <span class="material-icons">
email
</span> : <?php echo $rows["adminEmailID"]; ?></h3>
    <h3> Contact Number <span class="material-icons">
call
</span> : <?php echo $rows["adminContactNum"]; ?></h3>
    <?php
    // close while loop 
    }
    ?>
    </div> 
    <!-- end of container --> 

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
