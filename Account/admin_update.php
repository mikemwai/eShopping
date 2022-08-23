<?php

require("connection.php");

$category_id = $_GET['edit'];

if(isset($_POST['update_category']))
{

    $category_name = $_POST['category_name'];

    if(empty($category_name))
    {
       $message[] = 'please fill out all';   
   }else{

      $update_data = "UPDATE tbl_categories SET category_name='$category_name'
      WHERE category_id = '$category_id'";
      $upload = mysqli_query($conn, $update_data);

      if($upload)
      {
         header('location:admin.php');
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
      
      $select = mysqli_query($conn, "SELECT * FROM tbl_categories WHERE category_id = '$category_id'");
      while($row = mysqli_fetch_assoc($select))//accepts result object as parameter
      {

   ?>
   
   <form action="" method="post" enctype="multipart/form-data">
      <h3>update category</h3>
      <input type="text" placeholder="enter category name" name="category_name" value="<?php echo $row['category_name']; ?>" class="box">

      <input type="submit" class="btn" name="update_category" value="update category">
      <a href="admin.php" class="btn">go back!</a>
  </form>

   <?php }; ?>

</div>

</div>

</body>
</html>