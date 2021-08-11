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
    

    $sqlsmalldogs="SELECT * FROM `petswaydatabase`.`pets`,`petswaydatabase`.`petcategories` WHERE `petswaydatabase`.`pets`.petCategoryID= `petswaydatabase`.`petcategories`.petCategoryID AND `petswaydatabase`.`petcategories`.petCategoryName='Small Dog';";
    
    $resultsmalldogs=mysqli_query($con,$sqlsmalldogs) or die(mysqli_error($con));
     
    $sqllargedogs="SELECT * FROM `petswaydatabase`.`pets`,`petswaydatabase`.`petcategories` WHERE `petswaydatabase`.`pets`.petCategoryID= `petswaydatabase`.`petcategories`.petCategoryID AND `petswaydatabase`.`petcategories`.petcategoryName='Large Dog';";

      $resultlargedogs=mysqli_query($con,$sqllargedogs) or die(mysqli_error($con));

      


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dogs</title>
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


    <!-- filter form -->
    <div style="color:black; text-align:center;margin-top: 70px;">
        <h2 style="opacity:0.6;"> Filter Search <span class="material-icons">
filter_alt
</span> </h2>
        <form action="dogFilter.php" method="post">
            <!-- <label for="petCategoryName">Pet Category </label> -->
        <select name="petCategoryName" id="petCategoryName" style="width: max-content; color:black; padding: 3px;background-color:white;
    margin-top: 11px;
    font-size: inherit; display:inline-block;
    margin-bottom: 18px;"> <option disabled value="" selected hidden style ="color:black;">Select Category</option>
        <?php
     $sqlcategories="SELECT DISTINCT `petswaydatabase`.`petcategories`.petCategoryName FROM `petswaydatabase`.`petcategories`, `petswaydatabase`.`pets` WHERE `petswaydatabase`.`petcategories`.petCategoryID = `petswaydatabase`.`pets`.petCategoryID AND `petswaydatabase`.`pets`.petType='Dog';";
         $rescategories=mysqli_query($con,$sqlcategories) or die(mysqli_error($con));
         while($rows3=mysqli_fetch_array($rescategories,MYSQLI_ASSOC)){
        ?>
                <option value="<?php echo $rows3["petCategoryName"]; ?>" style ="color:black;"><?php echo $rows3["petCategoryName"]; ?></option>
                <?php
                
         }//end of while
                ?>
                

                </select>

                <!-- <label for="petBreed">Pet Breed </label> -->
        <select name="petBreed" id="petBreed" style="width: max-content;  color:black; padding: 3px;background-color:white;
    margin-top: 11px;
    font-size: inherit;display:inline-block;
    margin-bottom: 18px;"> <option disabled value="" selected hidden style ="color:black;">Select Breed</option>
        <?php
        $sqlbreeds="SELECT DISTINCT `petswaydatabase`.`pets`.petBreed FROM `petswaydatabase`.`pets` WHERE `petType`='Dog';";
        $resbreeds=$con->query($sqlbreeds);
         while($rows4=mysqli_fetch_array($resbreeds,MYSQLI_ASSOC)){
        ?>
                <option value="<?php echo $rows4["petBreed"]; ?>" style ="color:black;"><?php echo $rows4["petBreed"]; ?></option>
                <?php
         }//end of while
                ?>
                </select>

             <!-- <label for="petGender">Pet Gender </label> -->
        <select name="petGender" id="petGender" style="width: max-content;  color:black; padding: 3px;background-color:white;
    margin-top: 11px;
    font-size: inherit;display:inline-block;
    margin-bottom: 18px;"> <option disabled value="" selected hidden style ="color:black;">Select Gender</option>
        <?php
        $sqlgender="SELECT DISTINCT `petswaydatabase`.`pets`.petGender FROM `petswaydatabase`.`pets` WHERE `petType`='Dog';";
        $resgender=$con->query($sqlgender);
         while($rows5=mysqli_fetch_array($resgender,MYSQLI_ASSOC)){
        ?>
                <option value=<?php echo $rows5["petGender"]; ?> style ="color:black;"><?php echo $rows5["petGender"]; ?></option>
                <?php
         }//end of while
                ?>
                </select>

                 <!-- <label for="petAge">Pet Age </label> -->
        <select name="petAge" id="petAge" style="width: max-content;  color:black; padding: 3px;background-color:white;
    margin-top: 11px;display:inline-block;
    font-size: inherit;
    margin-bottom: 18px;"> <option disabled value="" selected hidden style ="color:black;">Select Age</option>
        <?php
        $sqlage="SELECT DISTINCT `petswaydatabase`.`pets`.petAge FROM `petswaydatabase`.`pets` WHERE `petType`='Dog';";
        $resage=$con->query($sqlage);
         while($rows6=mysqli_fetch_array($resage,MYSQLI_ASSOC)){
        ?>
                <option value=<?php echo $rows6["petAge"]; ?> style ="color:black;"><?php echo $rows6["petAge"]; ?></option>
                <?php
         }//end of while
                ?>
                </select>

        <!-- <label for="petPrice">Pet Price </label> -->
        <select name="petPrice" id="petPrice" style="width: max-content; color:black; padding: 3px;background-color:white;
    margin-top: 11px;display:inline-block;
    font-size: inherit;
    margin-bottom: 18px;"> <option disabled value="" selected hidden style ="color:black;">Select Price</option>
        <?php
        $sqlprice="SELECT DISTINCT `petswaydatabase`.`pets`.petPrice FROM `petswaydatabase`.`pets` WHERE `petType`='Dog';";
        $resprice=$con->query($sqlprice);
         while($rows7=mysqli_fetch_array($resprice,MYSQLI_ASSOC)){
        ?>
                <option value=<?php echo $rows7["petPrice"]; ?> style ="color:black;"><?php echo $rows7["petPrice"]; ?></option>
                <?php
         }//end of while
                ?>
                </select>

        <!-- <label for="petStatus">Pet Status </label> -->
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
         Shop for Dogs 
   
    </div>

    
    <div style =" word-spacing: 7px;
    text-align: center;
    color: white;
    font-size: x-large;
    margin-top: 95px;"> 
         Small Breeds 
   
    </div>
    <div style="display: inline-block; word-spacing:300px; margin-left:46px;margin-right:46px; margin-top:100px;">
    
    
    
    <?php 

        while($rowssmalldogs=mysqli_fetch_array($resultsmalldogs,MYSQLI_ASSOC)){
        ?>
        <form action="viewPetDetails.php" method="post">
        <div class="containerimage" style="display: inline-block;">
        <img src="petImage\<?php echo $rowssmalldogs["petImage"]; ?>" class="image" style="height: 300px; width: 250px; display: inline-block; margin-top:70px;">
        <input style="width:0%;" type="hidden" name="petID" value= <?php echo $rowssmalldogs["petID"]; ?>>
        <?php if($rowssmalldogs["petStatus"]!='sold'){ ?>
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

    
?>

</div>


    <div style =" word-spacing: 7px;
    text-align: center;
    color: white;
    font-size: x-large;
    margin-top: 95px;"> 
         Large Breeds 
   
    </div>
  <div style="display: inline-block; word-spacing:300px; margin-left:46px;margin-right:46px; margin-top:100px;">
  
    

  <?php
    while($rowslargedogs=mysqli_fetch_array($resultlargedogs,MYSQLI_ASSOC)){
        ?>
        <form action="viewPetDetails.php" method="post">
        <div class="containerimage" style="display: inline-block;">
        <img src="petImage\<?php echo $rowslargedogs["petImage"]; ?>" class="image" style="height: 300px; width: 250px; display: inline-block; margin-top:70px;">
        <input style="width:0%;" type="hidden" name="petID" value= <?php echo $rowslargedogs["petID"]; ?>>
        <?php if($rowslargedogs["petStatus"]!='sold'){ ?>
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