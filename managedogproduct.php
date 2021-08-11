<?php
 include('adminsession.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Dog Products</title>
    <link rel="stylesheet" href="registration.css" />
    <link rel="stylesheet" href="menubar.css" />

    <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@300&display=swap" rel="stylesheet">
    <style>       

#pets {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#pets td, #pets th {
  border: 1px solid #ddd;
  padding: 8px;
}

#pets tr:nth-child(even){
    background-color:#f3f3f3;
    
}

#pets tr:hover {
    background-color: #ddd;
}

#pets th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: papayawhip;
    color: dimgray;
}
</style>
</head>
<body>
    

<div style="text-align: right;word-spacing: 4px;background-color: darkgray; margin-top: -7px;">
        <div class="dropdown">
            <button type="menu" class="dropbtn"> Inventory </button>
            <div class="dropdown-content" style="text-align: left; word-spacing:4px;">
                <a href="inventorydog.php">Dogs</a>
                <a href="inventorycat.php">Cats</a>
                <a href="dogproducts.php">Dog Products</a>
                <a href="catproducts.php">Cat Products</a>
                
            </div>
        </div>
        <div class="dropdown">
            <button type="menu" class="dropbtn"> Orders </button>
            <div class="dropdown-content" style="text-align: left;word-spacing:4px;">
                <a href="ordersdog.php" style="white-space:pre-line;">Dogs</a>
                <a href="orderscat.php">Cats</a>
                
            </div>
        </div>
        <div class="dropdown" style="margin-right:3px;">
            <button type="menu" class="dropbtn">My Account</button>
            <div class="dropdown-content" style="text-align: left; word-spacing:4px;">
                <a href="myaccountadmin.php">View Profile</a>
                <a href="adminlogout.php">Logout</a>
            </div>
        </div>
    </div>
    <img src="finalHeader.jpg" alt="Pet's Way Header">
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


   
<?php

$sql="SELECT `petswaydatabase`.`productcategories`.productCategoryName, `petswaydatabase`.`productcategories`.petType,`petswaydatabase`.`products`.productID, `petswaydatabase`.`products`.productName,`petswaydatabase`.`products`.availableQuantity, `petswaydatabase`.`products`.productCost FROM `petswaydatabase`.`products`, `petswaydatabase`.`productcategories` WHERE (`petswaydatabase`.`products`.productCategoryID = `petswaydatabase`.`productcategories`.productCategoryID AND `petswaydatabase`.`productcategories`.petType='Dog');";


$result=mysqli_query($con,$sql) or die(mysqli_error($con));

?>
<table id ="pets" style ="margin: auto;
    margin-top: 157px;
    width: 78%;">

<tr>
            <th>productCategoryName</th>
            <th>petType</th>
            <th>productID</th>
            <th>productName</th>
            <th>availableQuantity</th>
            <th>productCost</th>
            
</tr> 

    
        
<?php
    while($rows=mysqli_fetch_array($result,MYSQLI_ASSOC)){
    ?>
    <tr>
        
            
    
            <td><?php echo $rows["productCategoryName"]; ?></td>
       
            
        
            <td><?php echo $rows["petType"]; ?></td>
            <td><?php echo $rows["productID"]; ?></td>
            <td><?php echo $rows["productName"]; ?></td>
        
                   
            <td><?php echo $rows["availableQuantity"]; ?></td>
            <td><?php echo $rows["productCost"]; ?></td>
        </tr>
    

<?php
    // close while loop 
    }
    ?>
    
</table>
</body>
</html>