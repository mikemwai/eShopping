<?php
   require("connection.php");

 if(isset($_POST['add_subcategory']))
   {
    $subcategory_name = $_POST['subcategory_name'];
    $category_id = $_POST['category_id'];
 
    if(empty($subcategory_name  || empty($category_id)))
    {
       $message[] = 'please fill out all';
    }else{
       $insert = "INSERT INTO tbl_subcategories(subcategory_name,category_id) VALUES('$subcategory_name','$category_id')";
       $upload = mysqli_query($conn,$insert);
       if($upload)
       {
          $message[] = 'new subcategory added successfully';
       }else{
          $message[] = 'could not add the subcategory';
       }
    }
   };

   if(isset($_GET['delete']))
   {
      $subcategory_id = $_GET['delete'];
      mysqli_query($conn, "DELETE  FROM tbl_subcategories WHERE subcategory_id = $subcategory_id");
      header('location:admin_page(Subcategories).php');
   };

?>

<?php

if(isset($message)){
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
    <title>eShopping | Admin Page(Subcategory)</title>
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
   <div style="margin: 0 auto" class="admin-product-form-container">
     <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
      <h3>Add new subcategory</h3>
      <input type="text" placeholder="enter subcategory name" name="subcategory_name" class="box">
      <input type="text" placeholder="enter category id" name="category_id" class="box">
      <input type="submit" class="btn" name="add_subcategory" value="add subcategory">
     </form>
    </div><br>

    <?php

   $select = mysqli_query($conn, "SELECT * FROM tbl_subcategories");
   //$select1 = mysqli_query($conn, "SELECT * FROM tbl_categories");
   
   ?>
   <div style="margin: 0 auto" class="product-display">
      <table style="margin: 0 auto" class="product-display-table">
         <thead>
         <tr>
            <th>subcategory id</th>
            <th>subcategory name</th>
            <th>category id</th>
            <!---<th>category name</th>--->
            <th>action</th>
         </tr>
         </thead>
         <?php while($row = mysqli_fetch_assoc($select)){ ?>
         <tr>
            <td><?php echo $row['subcategory_id']; ?></td>
            <td><?php echo $row['subcategory_name']; ?></td>
            <td><?php echo $row['category_id']; ?></td>
            <!---<td><//?php echo $row['category_name']; ?></td>---->
            <td>
               <a href="admin_update(Subcategory).php?edit=<?php echo $row['subcategory_id']; ?>" class="btn"> edit </a>
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