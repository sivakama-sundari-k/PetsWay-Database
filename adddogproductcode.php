
<?php 

$insert=false;
if(isset($_POST['productName'])){
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

    //Successful connection
    

    
    $productName=$_POST['productName'];
    $productCost=$_POST['productCost'];
    $availableQuantity=$_POST['availableQuantity'];
    
    $productCategoryID=$_POST['productCategoryID']; 
    $productDesc=$_POST['productDesc'];
    $filename = $_FILES["productImage"]["name"]; 
    $tempname = $_FILES["productImage"]["tmp_name"];     
        $folder = "productImage/".$filename; 
          
                // Now let's move the uploaded image into the folder: image 
        if (move_uploaded_file($tempname, $folder))  { 
            echo '<script> alert("Image uploaded successfully") </script>'; 

           $sql = "INSERT INTO `petswaydatabase`.`products`(`productName`, `availableQuantity`, `productCost`, `productCategoryID`,`productImage`,`productDesc`,`productStatus`) VALUES ('$productName', '$availableQuantity', '$productCost', '$productCategoryID','$filename','$productDesc','available');"; // backtick and NOT SINGLE QUOTE!!!
    

    if($con->query($sql) == true){
        $insert=true;
        echo '<script> alert("Addition Successful!") </script>';
        include 'dogproducts.php';
        exit();
    }
    else{
        echo "ERROR: $sql <br> $con->error";
        
    }

    
//    $result33 = mysqli_query($db, "SELECT * FROM products");       
exit();
    }
else{ 
            $msg = "Failed to upload image. Please try uploading again :-(";
            exit();
            include 'adddogproduct.php';
            
        }
}
?>