<?php
$server="localhost:3307";
    $username="root";//by default it is root
    $password="Si7122000%"; 
    

    //create a database connection
    $con=mysqli_connect($server,$username,$password); // it takes 3 parameters

    //check for connection success
    if(!$con){
        die("connection to this  database failed due to " . mysqli_connect_error());

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dog Inventory</title>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="reg.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="menunew.css">
    <style>       

#pets {
 
    font-size: larger;
  border-collapse: collapse;
  width: 100%;
}

#pets td, #pets th {
      border: 1px solid #ddd;
    padding: 8px;
            background-color: darkgray;
    color: black;
}

#pets tr:nth-child(even){
    background-color:white;
    color:#0d0d0d;
    
}

#pets td:hover {
    background-color: black;
    color:white;
}

#pets th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: white;
    
    color: #0d0d0d
    }
</style>
</head>
<body>
    

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
                <a href="logout.php">Logout</a>
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
    <div class="dropdown">
            <button type="menu" class="dropbtn"> <span class="material-icons" style="cursor:pointer;">
menu 
</span> </button>
            <div class="dropdown-content" style="text-align: left;word-spacing:4px;">
                
                <a href="addpet.php">Add a Dog</a>
                <a href="archivepet.php">Archive a Dog</a>
            </div>
        </div>
         Dog Inventory     
    </div>
<?php

$sql="SELECT * FROM `petswaydatabase`.`pets` WHERE `petType`='Dog';";


$result=mysqli_query($con,$sql) or die(mysqli_error($con));

?>
<table id ="pets" style ="margin: auto;
    margin-top: 157px;
    width: 78%;">

<tr>
            <th>petID</th>
            <th>petCategoryID</th>
            <th>petName</th>
            <th>petType</th>
            <th>petBreed</th>
            <th>petGender</th>
            <th>petAge</th>
            <th>petPrice</th>
            <th>petImage</th>
</tr> 

    
        
<?php
    while($rows=mysqli_fetch_array($result,MYSQLI_ASSOC)){
    ?>
    <tr>
        
            <td><?php echo $rows["petID"]; ?></td>
    
            <td><?php echo $rows["petCategoryID"]; ?></td>
       
            <td><?php echo $rows["petName"]; ?></td>
        
            <td><?php echo $rows["petType"]; ?></td>
        
            <td><?php echo $rows["petBreed"]; ?></td>
        
            <td><?php echo $rows["petGender"]; ?></td>
        
            <td><?php echo $rows["petAge"]; ?></td>
        
            <td><?php echo $rows["petPrice"]; ?></td>
            
            <td> <div style="text-align:center;">
                 <img src="petImage\<?php echo $rows["petImage"]; ?>" style="width:250px; height:300px;" alt="image"></td>
    </div>
        </tr>
    

<?php
    // close while loop 
    }
    ?>
    
</table>
  <div class="grid-container">
  <div class="grid-item"> <span class="material-icons">
storefront
</span>About <br> <br> Founded in 2017 in Bangalore, Pet's Way, created on the mindset of curating a selection of excellent products for cats and dogs, aims to be the most trusted and convenient online pet shop. <a href="about.html">Read more.</a></div>
  <div class="grid-item"> <span class="material-icons">
store
</span> Address <br> <br> 40, St Mark's Road <br> Ashok Nagar <br> Bengaluru <br> Karnataka <br> 560100 </div>
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