<?php

require("connection.php");
//include("connection.php");

//print_r($_POST);

$FName=$_POST["first_name"];
$LName=$_POST["last_name"];
$Email=$_POST["Email"];
$Password=$_POST["password"];
$Sex=$_POST["sex"];


$sql="INSERT INTO  tbl_users(first_name,last_name,email,password,gender)
VALUES ('$FName','$LName','$Email','$Password','$Sex')";

$select=" SELECT * from tbl_users WHERE email='$Email' && password='$Password' ";
$result=mysqli_query($conn,$select);

if(mysqli_num_rows($result)>0)
{
    $error[]='user already exists!';
}
else
{
    if(mysqli_query($conn,$sql))
   {
    header('location:../Homepage/Shoppage.php');
    //echo "<br> User Registered successfully";
   }
  else
   {
    $error[]='please fill out all details';
    //echo "Error: ". $sql .mysqli_error($conn);
   }
}

?>

<?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
?>



