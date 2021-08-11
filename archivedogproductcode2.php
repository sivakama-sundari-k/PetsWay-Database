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
if(isset($_POST['productName'])){
                $productID=$_POST['productID'];
              $productName=$_POST['productName'];
              $availableQuantity=$_POST['availableQuantity'];
            $productCost=$_POST['productCost'];
            $productCategoryID=$_POST['productCategoryID'];
            
            $sql="UPDATE `petswaydatabase`.`products` SET `petswaydatabase`.`products`.productName ='$productName', `petswaydatabase`.`products`.productCost =$productCost, `petswaydatabase`.`products`.availableQuantity=$availableQuantity, `petswaydatabase`.`products`.productCategoryID='$productCategoryID' WHERE `petswaydatabase`.`products`.productID=$productID;";

            $res=$con->query($sql);
            echo '<script> alert("Updated Successfully!") </script>';
            include 'dogproducts.php';
            exit();
            

}
?>
