<?php 
session_start();
if(!isset($_SESSION['login_user']))
{
	header("location:login.php");
}
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
    
  
    // $petBreed=$_POST['petBreed'];
    // $petAge=$_POST['petAge'];
    // $petPrice=$_POST['petPrice'];
    // $petStatus=$_POST['petStatus'];
    // $petGender=$_POST['petGender'];

    // $sqlresult="SELECT * FROM `petswaydatabase`.`pets` WHERE `petswaydatabase`.`pets`.petBreed='$petBreed' AND `petswaydatabase`.`pets`.petAge=$petAge AND `petswaydatabase`.`pets`.petPrice =$petPrice AND `petswaydatabase`.`pets`.petStatus='$petStatus' AND `petswaydatabase`.`pets`.petGender='$petGender'";

    $sql="SELECT * from `petswaydatabase`.`products` WHERE NOT `petswaydatabase`.`products`.availableQuantity= 0";

     if (isset($_POST['productCost'])){
          $productCost=$_POST['productCost'];
            $sql=$sql . " AND `petswaydatabase`.`products`.productCost=$productCost";
        
    }

   
    
   if (isset($_POST['productCategoryName'])){
          $productCategoryName=$_POST['productCategoryName'];
            $sql="SELECT `petswaydatabase`.`products`.productID, `petswaydatabase`.`products`.productCategoryID, `petswaydatabase`.`products`.productName, `petswaydatabase`.`products`.availableQuantity,`petswaydatabase`.`products`.productCost,`petswaydatabase`.`products`.productImage, `petswaydatabase`.`products`.productDesc, `petswaydatabase`.`products`.productStatus FROM `petswaydatabase`.`products`,`petswaydatabase`.`productcategories` WHERE `petswaydatabase`.`products`.productCategoryID=`petswaydatabase`.`productcategories`.productCategoryID AND `petswaydatabase`.`productcategories`.productCategoryName='$productCategoryName'";
            if (isset($_POST['productCost'])){
          $productCost=$_POST['productCost'];
            $sql=$sql . " AND `petswaydatabase`.`products`.productCost<='$productCost'";
        
    }
          
    }
     else if (isset($_POST['productCost'])){
          $productCost=$_POST['productCost'];
            $sql=$sql . " AND `petswaydatabase`.`products`.productCost<='$productCost'";
        
    }
    
    $result=mysqli_query($con,$sql);
    
       

    
   

      


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cat Products</title>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="reg.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="menunew.css">
<style>
    .containerimage {
    position:relative;
    width: fit-content;
    
    
    }
    
    .image {
    opacity: 1;
    display: block;
    width: fit-content;
    height: auto;
    transition: .5s ease;
    backface-visibility: hidden;
    }

    .image:hover{
        -webkit-transition-duration: 0.4s; /* Safari */
  transition-duration: 0.4s;
  box-shadow: 0 17px 50px 0 rgba(255, 255, 255, 0.19);
    }
    
    .middle {
    transition: .5s ease;
    opacity: 0;
    position: absolute;
    top: 50%;
    width: max-content;
    white-space: nowrap;
    left: 50%;
    transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%)
    }
    
    .containerimage:hover .image {
    opacity: 0.3;
    -webkit-transition-duration: 0.4s; /* Safari */
  transition-duration: 0.4s;
  box-shadow: 0px 25px 50px 0 rgba(255, 255, 255, 0.19);
    cursor:pointer;
  z-index: 0.9;
  transform: scale(1.1);
    }
    
    .containerimage:hover .middle {
    opacity: 1;
    }
    
    .text {
        background-color: #0d0d0d;
    color: white;
    
    padding: 16px 32px;
    min-width: max-content;
    }

    .text:hover{
        background-color: white;
    color: black;
    cursor: pointer;
    min-width: max-content;
    -webkit-transition-duration: 0.4s; /* Safari */
  transition-duration: 0.4s;
  box-shadow: 0 17px 50px 0 rgba(255, 255, 255, 0.19);
  z-index:1;
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

     <div style="display: inline-block; word-spacing:300px; margin-left:46px;margin-right:46px; margin-top:100px;">
    
        <?php
         if(mysqli_num_rows($result)==0){
            ?>
            <h2 style=" word-spacing:normal;"> no results found :-( </h2>
          <?php  
        }
        else{
        while($rows=mysqli_fetch_array($result,MYSQLI_ASSOC)){
        ?>
        <form action="viewProductDetails.php" method="post">
        <div class="containerimage" style="display: inline-block;">
        <img src="productImage\<?php echo $rows["productImage"]; ?>" class="image" style="height: 300px; width: 250px; display: inline-block;" alt="image">
      
        <input style="width:0%;" type="hidden" name="productID" value= <?php echo $rows["productID"]; ?>>
        <?php if($rows["productStatus"]!='sold'){ ?>

            <div class="middle">
            <button class="text" type ="submit" style="word-spacing: normal;"> View Details </button>
            </div>
            <?php
        }
        else{
        ?>
        <div class="middle">
            <div class="text" type ="submit" style="word-spacing: normal;"> SOLD </div>
            </div>
            <?php
        }
        ?>
            </div>
        </form>
<?php
    }//end of while

}
?>

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