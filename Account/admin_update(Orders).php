<?php

require("connection.php");

$order_id = $_GET['edit'];

if(isset($_POST['update_order']))
{

   $order_status = $_POST['order_status'];

   if(empty($order_status))
   {
   $message[] = 'please fill out all!';    
   }
   else
   {
      $update_data = "UPDATE tbl_order SET order_status='$order_status' WHERE order_id = '$order_id'";
      $upload = mysqli_query($conn, $update_data);

      if($upload)
      {
         header('location:admin_page(Orders).php');
      }else{
         $message[] = 'please fill out all!'; 
      }

   }
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="Admin.css">
</head>
<body>

<?php
   if(isset($message)){
      foreach($message as $message){
         echo '<span class="message">'.$message.'</span>';
      }
   }
?>

<div class="container">


<div class="admin-product-form-container centered">

   <?php
      
      $select = mysqli_query($conn, "SELECT * FROM tbl_order WHERE order_id = '$order_id'");
      while($row = mysqli_fetch_assoc($select))//accepts result object as parameter
      {

   ?>
   
   <form action="" method="post" enctype="multipart/form-data"><!-----specifies how form data should be encoded----->
      <h3 class="title">update the order</h3>
      <input type="int" class="box" name="order_id" value="<?php echo $row['order_id']; ?>">
      <input type="int" class="box" name="user_id" value="<?php echo $row['user_id']; ?>">
      <input type="double" class="box" name="order_amount" value="<?php echo $row['order_amount']; ?>">
      <select type="text" class="box" name="order_status">
            <option><?php echo $row['order_status']; ?></option>
            <option value="Pending">Pending</option>
            <option value="Paid">Paid</option>
            <option value="Delivered">Delivered</option>
       </select><br>
      <select type="text" class="box" name="payment_type">
            <option><?php echo $row['payment_type']; ?></option>
            <option value="M-Pesa">M-Pesa</option>
            <option value="Bank Account">Bank Account</option>
            <option value="Cash on Delivery">Cash on Delivery</option>
      </select><br>
      <input type="submit" value="update order" name="update_order" class="btn">
      <a href="admin_page(Orders).php" class="btn">go back!</a>
   </form>


   <?php }; ?>

   

</div>

</div>

</body>
</html>