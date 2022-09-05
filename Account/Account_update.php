<?php

require("connection.php");

$user_id = $_GET['edit'];

if(isset($_POST['update_user'])){
   $Email=$_POST['Email'];
   $Password=$_POST['password'];

   if(empty($Email) || empty($Password))
   {
      $message[] = 'please fill out all!';    
   }else{

      $update_data = "UPDATE tbl_users SET Email='$Email',password='$Password' WHERE user_id = '$user_id'";
      $upload = mysqli_query($conn, $update_data);

      if($upload){
         header('location:Account.php');
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
   <title>eShopping | Account Update</title>
   <link rel="stylesheet" href="Admin.css">
</head>
<body>

    <!---------Navigation Bar--------->
<div class="header">
    <div class="container">
        <div class="navbar">
            <a href="../Homepage/home.php">
            <div class="logo">
                <img src="../Homepage/Logo.png" width="200px">
            </div>
            </a>

            <nav>
                <ul id="MenuItems">
                    <li><a href="../Homepage/home.php">Home</a></li>
                    <li><a href="../Homepage/Shoppage.php">Shop</a></li>
                    <li><a href="../About/About.php">About</a></li>
                    <li><a href="../Contact%20Us/Contact.php">Contact</a></li>
                    <li><a href="../Account/Account.php">Account</a></li>
                </ul>
        </nav>
            <img onclick="window.location.href='../Account/Cart.php';" src="../eShopping/images/cart.png" width="30px" height="30px">
            <img src="../eShopping/images/menu.png" class="menu-icon"
                 onclick="menu-toggle()">
        </div>
    </div>
</div>

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
      
      $select = mysqli_query($conn, "SELECT * FROM tbl_users WHERE user_id = '$user_id'");
      while($row = mysqli_fetch_assoc($select)){

   ?>
   
   <form action="" method="post" enctype="multipart/form-data">
      <h3 class="title">update the password</h3>
      <input type="email" id="Email" name="Email" value="<?php echo $row['email']; ?>" placeholder="enter email" class="box"><p>

      <input type="password" id="password" name="password" value="enter new password" placeholder="enter password" class="box"></p>

      <input type="submit" class="btn" name="update_user" value="update user">
      <a href="Account.php" class="btn">go back!</a>
     </form>
   
   <?php }; ?>
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
        <p class="copyright">&#169; 2022 eShopping</p>
    </div>
</div>

</body>
</html>