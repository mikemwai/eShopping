<?php

require("connection.php");

$subcategory_id = $_GET['edit'];

if(isset($_POST['update_subcategory']))
{

    $subcategory_name = $_POST['subcategory_name'];
    $category_id = $_POST['category_id'];

    if(empty($subcategory_name  || empty($category_id)))
    {
       $message[] = 'please fill out all';   
   }else{

      $update_data = "UPDATE tbl_subcategory SET subcategory_name='$subcategory_name', category_id='$category_id',
      WHERE subcategory_id = '$subcategory_id'";
      $upload = mysqli_query($conn, $update_data);

      if($upload)
      {
         header('location:admin_page(Products).php');
      }
      else
      {
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
      
      $select = mysqli_query($conn, "SELECT * FROM tbl_subcategories WHERE subcategory_id = '$subcategory_id'");
      while($row = mysqli_fetch_assoc($select))//accepts result object as parameter
      {

   ?>
   
   <form action="" method="post" enctype="multipart/form-data">
      <h3>update subcategory</h3>
      <input type="text" placeholder="enter subcategory name" name="subcategory_name" value="<?php echo $row['subcategory_name']; ?>" class="box">

      <input type="text" placeholder="enter category id" name="category_id" value="<?php echo $row['category_id']; ?>" class="box">

      <input type="submit" class="btn" name="update_subcategory" value="update subcategory">
      <a href="admin_page(Subcategory).php" class="btn">go back!</a>
  </form>

   <?php }; ?>

</div>

</div>

</body>
</html>