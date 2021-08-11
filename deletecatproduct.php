
<?php

    $insert=false;
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

    $sql = "SELECT * FROM `petswaydatabase`.`products`, `petswaydatabase`.`productcategories` WHERE (`petswaydatabase`.`products`.productCategoryID = `petswaydatabase`.`productcategories`.productCategoryID AND `petswaydatabase`.`productcategories`.petType='Cat');";
    if(mysqli_num_rows($con->query($sql))>0){
        $insert=true;
       
    }
    else{    
        echo '<script> alert("Nothing left to delete!") </script>';
            include 'catproducts.php';
        exit();
    }
    
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete a Dog Product</title>
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
         Delete a Cat Product from the Inventory 
   
    </div>
<div class="container" style="align-items: center; text-align: center; align-content: center;">
    
    
    <form action = "deletecatproductcode.php " method = "post">
        <label for="productID">Pet ID: </label> <br>
        <select name="productID" id="productID" style="width: -webkit-fill-available; color:black; padding: 12px;background-color:white;
    margin-top: 11px;
    font-size: inherit;
    margin-bottom: 18px;" required> <option disabled value="" selected hidden style ="color:black;"> Choose a Product to be deleted </option>
        <?php
        if($insert==true){
            $result=mysqli_query($con,$sql) or die(mysqli_error($con));
            
            while($rows=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                ?>
                    <option value="<?php echo $rows["productID"]; ?> " style ="color:black;">ID: <?php echo $rows["productID"]; ?> - Name: <?php echo $rows["productName"]; ?></option>
            <?php
            }//end of while
            ?>
            </select> <br>
            <button type="submit" class = "register" style="margin-left: 168px; margin-top: 9px;"> Delete <span class="material-icons">remove_circle</span></button>
    </form>
    </div>
            
            <?php
          
            
        }//end of if
        
        ?>
        
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

    <!-- // if(isset($_POST['petID'])){
    // $petID=$_POST['petID'];

    //     $sql1 = "DELETE FROM `petswaydatabase`.`pets` WHERE `petID` = $petID;";
    //     $res=$con->query($sql1);
    //     echo '<script> alert("Deletion Successful!") </script>';
    //     include 'inventorycat.php';
    //     exit();
    // }
    // else{
    //     exit();
    // } -->
