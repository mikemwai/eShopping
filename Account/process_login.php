<?php

require("connection.php");
session_start();

if(isset($_POST['submit']))
{

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

   $select = mysqli_query($conn, "SELECT * FROM `tbl_users` WHERE email = '$Email' AND password = '$Password'") or die('query failed');

   if(mysqli_num_rows($select) > 0)
   {
      $row = mysqli_fetch_assoc($select);
      $_SESSION['user_id'] = $row['id'];
      header('location:admin_page.php');
   } 
   else
   {
      $message[] = 'incorrect password or email!';
      header('location:Account.php');
   }

}

?>

<?php
if(isset($message)){
   foreach($message as $message){
      echo '<div class="message" onclick="this.remove();">'.$message.'</div>';
   }
}
?>

