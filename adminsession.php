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
    
session_start();
$user_check=$_SESSION['login_user'];
$ses_sql="SELECT `adminUsername`,`adminID` FROM `petswaydatabase`.`admin` WHERE `adminUsername`='$user_check';";
$result = mysqli_query($con,$ses_sql);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
$loggedin_session=$row["adminUsername"];
$loggedin_id=$row["adminID"];
if(!isset($loggedin_session)){
 echo '<script> alert("You have been logged out. Please login in to continue.") </script>';
 header("Location: adminlogin.php");
 exit();
}
?>