<?php
require("connection.php");

session_start();

$user_id=$_SESSION['user_id'];

if(!isset($_SESSION['first_name'])){
   header('location:Account.php');
}
if(!isset($_SESSION['last_name'])){
    header('location:Account.php');
 }
 if(!isset($_SESSION['user_id'])){
    header('location:Account.php');
 }

 if(isset($_POST['update_btn'])){
    $update_value = $_POST['update_quantity'];
    $update_id = $_POST['update_quantity_id'];
    $update_quantity_query = mysqli_query($conn, "UPDATE `tbl_cart` SET quantity = '$update_value' WHERE id = '$update_id'");
    if($update_quantity_query){
       header('location:Cart.php');
    };
 };
 
 if(isset($_GET['remove'])){
    $remove_id = $_GET['remove'];
    mysqli_query($conn, "DELETE FROM `tbl_cart` WHERE id = '$remove_id'");
    header('location:Cart.php');
 };
 
 if(isset($_GET['delete_all'])){
    mysqli_query($conn, "DELETE FROM `tbl_cart`");
    header('location:Cart.php');
 }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width , initial-scale=1.0">
    <title>eShopping | Cartpage</title>
    <link rel="stylesheet" href="Products.css">
    <link rel="stylesheet" href="Admin.css">
</head>
<body>

    <!---------Navigation Bar--------->
<div class="header">
    <div class="container">
        <div class="navbar">
            <div class="logo">
                <img src="../Homepage/Logo.png" width="200px">
            </div>
            <nav>
                <ul id="MenuItems">
                    <li><a href="../Homepage/home.php">Home</a></li>
                    <li><a href="../Homepage/Shoppage.php">Shop</a></li>
                    <li><a href="../About/About.php">About</a></li>
                    <li><a href="../Contact%20Us/Contact.php">Contact</a></li>
                    <!---<li><a href="../Account/Account.php">Account</a></li>--->
                    <li><a href="Logout.php">Logout</a></li>
                </ul>
        </nav>

            <!---<img onclick="window.location.href='../Account/Cart.php';" src="../eShopping/images/cart.png" width="30px" height="30px">--->
            <img src="../eShopping/images/menu.png" class="menu-icon"
                 onclick="menu-toggle()">
        </div>
    </div>
</div>

<?php

$select = mysqli_query($conn, "SELECT * FROM tbl_users");

?>

<!-----------Products--------->
<div class="small-container">
    <h1 class="title"><?php echo $_SESSION['first_name']; echo" "; echo $_SESSION['last_name']?></h1>
    <h1 class="title">Shopping Cart</h1>
</div>
 
<div style="margin: 0 auto"class="container">
   
<?php

   $select = mysqli_query($conn, "SELECT * FROM tbl_cart WHERE user_id='$user_id'");
   $select1 = mysqli_query($conn, "SELECT * FROM tbl_order WHERE user_id='$user_id'");


   $grand_total = 0;

?>

<div style="margin: 0 auto" class="product-display">
   <table class="product-display-table">
      <thead>
      <tr>
         <th>product image</th>
         <th>product name</th>
         <th>product price</th>
         <th>quantity</th>
         <th>total price</th>
         <th>action</th>
      </tr>
      </thead>
      <?php while($row = mysqli_fetch_assoc($select)){ ?>
      <tr>
         <td><img class="image1" src="uploaded_img/<?php echo $row['image']; ?>" height="100" alt=""></td><!------>
         <td><?php echo $row['name']; ?></td>
         <td>Ksh<?php echo $row['price']; ?>/-</td>
         <td>
            <form action="" method="post">
                  <br><br><input type="hidden" name="update_quantity_id"  value="<?php echo $row['id']; ?>" >
                  <br><input type="number" name="update_quantity" min="1"  value="<?php echo $row['quantity']; ?>" >
                  <input type="submit" value="update" name="update_btn" class="btn">
            </form> 
         </td>
         <td>Ksh<?php echo $sub_total = $row['price'] * $row['quantity']; ?>/-</td>
         <td>
            <a href="Cart.php?remove=<?php echo $row['id']; ?>" onclick="return confirm('remove item from cart?')" class="btn"> remove </a>
         </td>
      </tr>
      <?php
           $grand_total=$sub_total+$grand_total;  
      ?>
      <?php } ?>
      <tr class="table-bottom">
            <td><a href="../Homepage/Shoppage.php" class="btn" style="margin-top: 0;">continue shopping</a></td>
            <td colspan="3">grand total</td>
            <td>Ksh<?php echo $grand_total; ?>/-</td>
            <td><a href="Cart.php?delete_all" onclick="return confirm('are you sure you want to delete all?');" class="btn"> delete all </a><a href="checkout.php" class="btn">Check Out</a></td>
         </tr>
   </table><br><br>


   <br><table class="product-display-table">
         <thead>
         <tr>
            <th>total products</th>
            <th>order amount</th>
            <th>order status</th>
            <th>payment type</th>
         </tr>
         </thead>
         <?php while($row = mysqli_fetch_assoc($select1)){ ?>
         <tr>
            <td><?php echo $row['total_products']; ?></td>
            <td>Ksh<?php echo $row['order_amount']; ?>/-</td>
            <td><?php echo $row['order_status']; ?></td>
            <td><?php echo $row['payment_type']; ?></td>
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
        <p class="copyright">&#169; 2022 eShopping</p>
    </div>
</div>

</body>
</html>