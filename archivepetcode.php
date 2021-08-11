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
if(isset($_POST['petID'])){
              $petID=$_POST['petID'];

        $sql1 = "DELETE FROM `petswaydatabase`.`pets` WHERE `petID` = $petID;";
        $res=$con->query($sql1);
        echo '<script> alert("Deletion Successful!") </script>';
        include 'inventorydog.php';
        exit();
          }
?>