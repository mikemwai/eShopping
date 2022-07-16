<?php

require("connection.php");

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:Account.php');
};

if(isset($_POST['order']))
{
    $payment_type = $_POST['payment_type'];


    $grand_total = 0;
    $select = mysqli_query($conn, "SELECT * FROM tbl_cart WHERE user_id='$user_id'");
    while($row = mysqli_fetch_assoc($select))
    {
    $cart_products[] = $row['name'].' ( '.$row['quantity'].' )';
    $sub_total = $row['price'] * $row['quantity'];
    $grand_total=$sub_total+$grand_total;  
    $total_products=implode(', ', $cart_products);
    };

   $order_query = mysqli_query($conn,"SELECT * FROM tbl_order WHERE user_id='$user_id'");

   if($sub_total == 0)
   {
      $message[] = 'your cart is empty';
   }
   else
   {
      //$insert_order1 =  mysqli_query($conn,"INSERT INTO tbl_orderdetails(order_id, user_id, product_id, product_name, product_image, product_price, order_quantity, payment_type, orderdetails_total) 
      //VALUES('$order_id', '$user_id', '$product_id', '$product_name', '$product_image', '$product_price', '$product_quantity', '$payment_type', '$sub_total')");
      $insert_order =  mysqli_query($conn,"INSERT INTO tbl_order(user_id, total_products, order_amount, payment_type) VALUES('$user_id', '$total_products', '$grand_total', '$payment_type')");
      $message[] = 'order placed successfully!';
   }

   mysqli_query($conn, "DELETE FROM `tbl_cart` WHERE user_id='$user_id'");

   //header('location:Cart.php');

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width , initial-scale=1.0">
    <title>eShopping | Checkout</title>
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
                    <li><a href="../Account/Logout.php">Logout</a></li>
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
      echo '<div class="message"><span>'.$message.'</span> </div>';
   };
};

?>

<?php

    $select = mysqli_query($conn, "SELECT * FROM tbl_cart WHERE user_id='$user_id'");
   
?>

<!-----------Products--------->
<div class="admin-product-form-container">
   <form action="" method="POST">
            <?php while($row = mysqli_fetch_assoc($select)){ ?>
            <input type="hidden" name="order_id" value="<?php echo $row['id']; ?>">
            <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>">
            <input type="hidden" name="product_name" value="<?php echo $row['name']; ?>">
            <input type="hidden" name="product_price" value="<?php echo $row['price']; ?>">
            <input type="hidden" name="product_image" value="<?php echo $row['image']; ?>">
            <input type="hidden" name="product_quantity" value="<?php echo $row['quantity']; ?>">
            <?php } ?>
            <h3>Place your order</h3>
            <span>Payment Type :</span>
            <select type="text" class="box" name="payment_type" >
            <option value="M-Pesa">M-Pesa</option>
            <option value="Bank Account">Bank Account</option>
            <option value="Cash on Delivery">Cash on Delivery</option>
            </select><br>
      <input type="submit" name="order" class="btn" value="place order">
      <a href="Cart.php" class="btn">Go Back</a>
   </form>
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