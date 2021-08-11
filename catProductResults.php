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
    

    $sql="SELECT `petswaydatabase`.`products`.productID, `petswaydatabase`.`products`.productImage, `petswaydatabase`.`products`.productStatus, `petswaydatabase`.`products`.availableQuantity FROM `petswaydatabase`.`products`,`petswaydatabase`.`productcategories` WHERE `petswaydatabase`.`products`.productCategoryID= `petswaydatabase`.`productcategories`.productCategoryID AND `petswaydatabase`.`productcategories`.petType='Cat';";
    
    $result=mysqli_query($con,$sql) or die(mysqli_error($con));
     
    

      


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
                <a href="catProductResults.php">Product</a>
                
            </div>
        </div>
    </div>

    <!-- filter form -->
    <div style="color:black; text-align:center;margin-top: 70px;">
        <h2 style="opacity:0.6;"> Filter Search <span class="material-icons">
filter_alt
</span> </h2>
        <form action="catProductFilter.php" method="post">
            <!-- <label for="petBreed">Pet Breed </label> -->
        <select name="productCategoryName" id="productCategoryName" style="width: max-content;  color:black; padding: 3px;background-color:white;
    margin-top: 11px;
    font-size: inherit;display:inline-block;
    margin-bottom: 18px;"> <option disabled value="" selected hidden style ="color:black;">Select Product Category</option>
        <?php
        $sqlpcat="SELECT * from `petswaydatabase`.`productcategories` where `petswaydatabase`.`productcategories`.petType='Cat';";
        $respcat=$con->query($sqlpcat);
         while($rows4=mysqli_fetch_array($respcat,MYSQLI_ASSOC)){
        ?>
                <option value="<?php echo $rows4["productCategoryName"]; ?>" style ="color:black;"><?php echo $rows4["productCategoryName"]; ?></option>
                <?php
         }//end of while
                ?>
                </select>

             <!-- <label for="petGender">Pet Gender </label> -->
        <select name="productCost" id="productCost" style="width: max-content;  color:black; padding: 3px;background-color:white;
    margin-top: 11px;
    font-size: inherit;display:inline-block;
    margin-bottom: 18px;"> <option disabled value="" selected hidden style ="color:black;">Select Product Cost</option>
        <?php
        $sqlcost="SELECT DISTINCT `petswaydatabase`.`products`.productCost FROM `petswaydatabase`.`products`, `petswaydatabase`.`productcategories` WHERE `petswaydatabase`.`products`.productCategoryID=`petswaydatabase`.`productcategories`.productCategoryID AND `petswaydatabase`.`productcategories`.petType='Cat';";
        $rescost=$con->query($sqlcost);
         while($rows5=mysqli_fetch_array($rescost,MYSQLI_ASSOC)){
        ?>
                <option value=<?php echo $rows5["productCost"]; ?> style ="color:black;"><?php echo $rows5["productCost"]; ?></option>
                <?php
         }//end of while
                ?>
                </select>

                 <!-- <label for="petAge">Pet Age </label> -->
        

        

        
                <div style="text-align:center; display:inline-block;">
                <button type="submit"> Search <span class="material-icons">
search
</span></button>
        </div>
</form>
</div>

    <div style =" word-spacing: 7px;
    text-align: center;
    background-color: #000000;
    color: white;
    font-size: xx-large;
    margin-top: 95px;"> 
         Shop for Cat Products 
   
    </div>

    
    
    <div style="display: inline-block; word-spacing:300px; margin-left:46px;margin-right:46px; margin-top:100px;">
    
    
    
    <?php 

        while($rows=mysqli_fetch_array($result,MYSQLI_ASSOC)){
        ?>
        <form action="viewProductDetails.php" method="post">
        <div class="containerimage" style="display: inline-block;">
        <img src="productImage\<?php echo $rows["productImage"]; ?>" class="image" style="height: 300px; width: 250px; display: inline-block;margin-top:90px;">
        <input style="width:0%;" type="hidden" name="productID" value= <?php echo $rows["productID"]; ?>>
        <?php if($rows["productStatus"]=='sold' || $rows["availableQuantity"]==0){ ?>
            <div class="middle">
            <div class="text" type ="submit" style="word-spacing: normal;"> SOLD </div>
            </div>
            
            <?php
        }
        else{
        ?>
        <div class="middle">
            <button class="text" type ="submit" style="word-spacing: normal;"> View Details </button>
            </div>
            <?php
        }
        ?>
            </div>
        </form>
<?php
    }//end of while

    
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