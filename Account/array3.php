<?php 

require("connection.php");

$sql = "SELECT user_id,first_name,last_name,email,password,gender,role FROM tbl_users";
$result = mysqli_query($conn, $sql);

/*$row = mysqli_fetch_assoc($result);
print_r($row);*/

if (mysqli_num_rows($result) > 0) 
{
  // output data of each row
  while($row = mysqli_fetch_assoc($result))
  {
    echo "ID: " . $row["user_id"]. " - Name: " . $row["first_name"]." ". $row["last_name"]. 
     " - Email: " . $row["email"].  " - Password: " . $row["password"].  " - Gender: " . $row["gender"].  " - Role: " . $row["role"]. "<br>";
  }
} else 
{
  echo "0 results";
}

?>