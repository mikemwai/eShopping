<?php

require("connection.php");

$product_id = $_GET['edit'];

if(isset($_POST['update_product'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $subcategory_name=$_POST['subcategory_name'];
   $category_name=$_POST['category_name'];
   $product_description=$_POST['product_description'];
   $available_quantity=$_POST['available_quantity'];
   $product_image = $_FILES['product_image']['name'];
   $product_image_tmp_name = $_FILES['product_image']['tmp_name'];
   $product_image_folder = 'uploaded_img/'.$product_image;

   if(empty($product_name) || empty($product_price) || empty($available_quantity) || empty($category_name) || empty($product_description) || empty($subcategory_name) || empty($product_image))
   {
   $message[] = 'please fill out all!';    
   }
   else
   {
      $update_data = "UPDATE tbl_product SET product_name='$product_name', unit_price='$product_price', product_image='$product_image',product_description='$product_description',available_quantity='$available_quantity',
      subcategory_name='$subcategory_name', category_name='$category_name'  WHERE product_id = '$product_id'";
      $upload = mysqli_query($conn, $update_data);

      if($upload){
         move_uploaded_file($product_image_tmp_name, $product_image_folder);
         header('location:admin_page(Products).php');
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
      
      $select = mysqli_query($conn, "SELECT * FROM tbl_product WHERE product_id = '$product_id'");
      while($row = mysqli_fetch_assoc($select))//accepts result object as parameter
      {

   ?>
   
   <form action="" method="post" enctype="multipart/form-data"><!-----specifies how form data should be encoded----->
      <h3 class="title">update the product</h3>
      <input type="text" class="box" name="product_name" value="<?php echo $row['product_name']; ?>" placeholder="enter the product name">
      <input type="int" min="0" class="box" name="product_price" value="<?php echo $row['unit_price']; ?>" placeholder="enter the product price">
      <input type="text" placeholder="enter product description" name="product_description" value="<?php echo $row['product_description']; ?>" class="box">
      <select type="text" class="box" name="subcategory_name">
            <option value="<?php echo $row['subcategory_name']; ?>" disabled selected hidden>enter subcategory name</option>
            <option value="Formal">Formal</option>
            <option value="Casual">Casual</option>
            <option value="Sports">Sports</option>
            <option value="Dogs">Dogs</option>
            <option value="Cats">Cats</option>
            <option value="Others">Others</option>
       </select><br>
      <select type="text" class="box" name="category_name">
            <option value="<?php echo $row['category_name']; ?>" disabled selected hidden>enter category name</option>
            <option value="Men">Men</option>
            <option value="Women">Women</option>
            <option value="Children">Children</option>
            <option value="Pets">Pets</option>
      </select><br>
      <input type="int" placeholder="enter available quantity" name="available_quantity" value="<?php echo $row['available_quantity']; ?>" class="box">
      <input type="file" class="box" name="product_image"  accept="image/png, image/jpeg, image/jpg, image/webp" value="<?php echo $row['product_image']; ?>">
      <input type="submit" value="update product" name="update_product" class="btn">
      <a href="admin_page(Products).php" class="btn">go back!</a>
   </form>


   <?php }; ?>

   

</div>

</div>

</body>
</html>