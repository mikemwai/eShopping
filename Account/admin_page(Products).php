<?php
   require("connection.php");

   if(isset($_POST['add_product']))
   {
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $subcategory_name=$_POST['subcategory_name'];
    $category_name=$_POST['category_name'];
    $product_description=$_POST['product_description'];
    $available_quantity=$_POST['available_quantity'];
    $product_keywords=$_POST['product_keywords'];
    $product_image = $_FILES['product_image']['name'];//Adding image to database(name)
    $product_image_tmp_name = $_FILES['product_image']['tmp_name'];
    $product_image_folder = 'uploaded_img/'.$product_image;
 
    if(empty($product_name) || empty($product_price) || empty($available_quantity) || empty($category_name) || empty($product_description) || empty($subcategory_name) || empty($product_image) || empty($product_keywords))
    {
       $message[] = 'please fill out all';
    }
    else
    {
       $insert = "INSERT INTO tbl_product(product_name,unit_price,product_image,product_description,available_quantity,subcategory_name,category_name,product_keywords) VALUES('$product_name', '$product_price', '$product_image', '$product_description','$available_quantity','$subcategory_name','$category_name', '$product_keywords')";
       $insert1= "INSERT INTO tbl_productimages(product_image) VALUES('$product_image')";
       $upload = mysqli_query($conn,$insert);
       $upload1= mysqli_query($conn,$insert1);
       if($upload)
       {
          move_uploaded_file($product_image_tmp_name, $product_image_folder);
          $message[] = 'new product added successfully';
       }else{
          $message[] = 'could not add the product';
       }
    }
   };

   if(isset($_GET['delete']))
   {
    $product_id = $_GET['delete'];
    mysqli_query($conn, "DELETE  FROM tbl_product WHERE product_id = $product_id");
    header('location:admin_page(Products).php');
   };
 ?>

<?php

if(isset($message))
{
   foreach($message as $message){
      echo '<span class="message">'.$message.'</span>';
   }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width , initial-scale=1.0">
    <title>eShopping | Admin page(Products)</title>
    <link rel="stylesheet" href="Admin.css">
    <link rel="icon" href="../Homepage/favicon.ico" type="image/x-icon"> 
</head>
<body>

<!---------Navigation Bar--------->
<div style="margin: 0 auto" class="header">
   <div class="container1">
        <div class="navbar">
                <div class="logo">
                    <img src="../Homepage/Logo.png" width="200px">
                </div>
                <nav>
                    <ul id="MenuItems">
                        <li><a href="Logout.php">Logout</a></li>
                    </ul>
            </nav>
    
                <!--<img src="../eShopping/images/cart.png" width="30px" height="30px">--->
                <img src="../eShopping/images/menu.png" class="menu-icon"
                     onclick="menu-toggle()">
            </div>
    </div>
</div>

<h1 style="margin: 0 auto" class="title">Admin Page</h1>

<div style="margin: 0 auto" class="header1">
    <div class="container">
        <div style="text-align:center" class="navbar1">
                <nav>
                    <ul id="MenuItems">
                        <li><a href="admin.php">Categories</a></li>
                        <li><a href="admin_page(Subcategory).php">Subcategories</a></li>
                        <li><a href="admin_page(Products).php">Products</a></li>
                        <li><a href="admin_page(Users).php">Users</a></li>
                        <li><a href="admin_page(Orders).php">Orders</a></li>
                    </ul>
                 </nav>
            </div>
        </div>
    </div>
</div>

<div style="margin: 0 auto" class="container">
    <div class="admin-product-form-container">
     <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
      <h3>Add new product</h3>
      <input type="text" placeholder="enter product name" name="product_name" class="box">
      <input type="int" placeholder="enter product price" name="product_price" class="box">
      <input type="text" placeholder="enter product description" name="product_description" class="box">
      <input type="int" placeholder="enter available quantity" name="available_quantity" class="box">
      <!----<input type="" placeholder="enter category name" name="category_name" class="box">--->
      <select type="text" class="box" name="subcategory_name" >
            <option value="" disabled selected hidden>enter subcategory name</option>
            <option value="Formal">Formal</option>
            <option value="Casual">Casual</option>
            <option value="Sports">Sports</option>
            <option value="Dogs">Dogs</option>
            <option value="Cats">Cats</option>
            <option value="Others">Others</option>
       </select><br>
      <select type="text" class="box" name="category_name" >
            <option value="" disabled selected hidden>enter category name</option>
            <option value="Men">Men</option>
            <option value="Women">Women</option>
            <option value="Children">Children</option>
            <option value="Pets">Pets</option>
       </select><br>
      <input type="text" placeholder="enter product keywords" name="product_keywords" class="box">
      <input type="file" accept="image/png, image/jpeg, image/jpg, image/webp" name="product_image" class="box">
      <input type="submit" class="btn" name="add_product" value="add product">
     </form>
    </div><br>

    <?php

   $select = mysqli_query($conn, "SELECT * FROM tbl_product");
   
   ?>

   <div style="margin: 0 auto" class="product-display">
      <table class="product-display-table">
         <thead>
         <tr>
            <th>product id</th>
            <th>product image</th>
            <th>product name</th>
            <th>product description</th>
            <th>product price</th>
            <th>subcategory name</th>
            <th>category name</th>
            <th>available quantity</th>
            <th>product keywords</th>
            <th>action</th>
         </tr>
         </thead>
         <?php while($row = mysqli_fetch_assoc($select)){ ?>
         <tr>
            <td><?php echo $row['product_id']; ?></td>
            <td><img src="uploaded_img/<?php echo $row['product_image']; ?>" height="100" alt=""></td><!------>
            <td><?php echo $row['product_name']; ?></td>
            <td><?php echo $row['product_description']; ?></td>
            <td>Ksh<?php echo $row['unit_price']; ?>/-</td>
            <td><?php echo $row['subcategory_name']; ?></td>
            <td><?php echo $row['category_name']; ?></td>
            <td><?php echo $row['available_quantity']; ?></td>
            <td><?php echo $row['product_keywords']; ?></td>
            <td>
               <a href="admin_update(Products).php?edit=<?php echo $row['product_id']; ?>" class="btn"> edit </a>
               <a href="admin_page(Products).php?delete=<?php echo $row['product_id']; ?>" class="btn"> delete </a>
            </td>
         </tr>
      <?php } ?>
      </table>
   </div>
</div>

<!--------------footer------>
<div class="footer">
    <div class="small-container">
        <div class="row">
            <div class="footer-col-1">
                <h3>Download Our App</h3>
                <p>Download App for Android and ios mobile phone.</p>
                <div class="app-logo">
                    <img src="../eShopping/images/play-store.png">
                    <img src="../eShopping/images/app-store.png">
                </div>
            </div>

            <div class="footer-col-4">
                <h3>Follow Us</h3>
                <ul>
                    <li>
                        Facebook
                    </li>
                    <li>
                        Twitter
                    </li>
                    <li>
                        Instagram
                    </li>
                    <li>
                        YouTube
                    </li>
                </ul>
            </div>

            <div class="footer-col-3">
                <h3>Additional Information</h3>
                <ul>
                    <li>
                        <a href="../Content/Blog articles on eShopping.html">Blog articles on eShopping</a>
                    </li>
                    <li>
                        <a href="../Content/Recommendations.html">Recommendations</a>
                    </li>
                    <li>
                        <a href="../Content/Tools%20and%20Tips.html">Tools and Tips</a>
                    </li>
                    <li>
                        <a href="../Offers/Free%20Shipping.html">Free Shipping</a>
                    </li>
                    <li>
                        <a href="../Updates/Product%20Launches.html">Product Launches</a>
                    </li>
                    <li>
                        <a href="../Updates/Announcements.html">Announcements</a>
                    </li>
                    <li>
                        <a href="../Offers/Discounts.html">Discounts</a>
                    </li>
                    <li>
                        <a href="../Offers/Coupons.html">Coupons</a>
                    </li>
                </ul>
            </div>

        </div>
        <hr>
        <p class="copyright">&#169; <?php echo date("Y"); ?> eShopping</p>
    </div>
</div>


</body>
</html>
