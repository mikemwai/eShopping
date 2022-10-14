<?php
require("connection.php");

mysqli_query($conn, "DELETE FROM product");

if(isset($_POST['add_to_cart']))
{
    session_start();

    $user_id=$_SESSION['user_id'];
    
    if(!isset($_SESSION['user_id'])){
        header('location:Account.php');
     }

    $product_id=$_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['unit_price'];
    $product_image = $_POST['product_image'];
    $product_quantity = 1;
 
    $select_cart = mysqli_query($conn, "SELECT * FROM tbl_cart WHERE name = '$product_name' AND user_id='$user_id'");
 
    if(mysqli_num_rows($select_cart) > 0)
    {
       $message[] = 'Product already added to cart!';
    }
    else
    {
       $insert_product = mysqli_query($conn, "INSERT INTO tbl_cart(name, user_id, product_id, price, image, quantity) VALUES('$product_name', '$user_id', '$product_id', '$product_price', '$product_image', '$product_quantity')");
       $message[] = 'Product added to cart succesfully!';
    }
 
};

if(isset($_POST['add_to_product']))
{
    $product_id=$_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['unit_price'];
    $product_image = $_POST['product_image'];
    $product_details= $_POST['product_description'];
    $product_quantity = 1;

    $insert_product = mysqli_query($conn, "INSERT INTO product(name, product_id, price, image, product_details) 
       VALUES('$product_name','$product_id', '$product_price', '$product_image', '$product_details')");

    header('location:Productspage.php');
};

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width , initial-scale=1.0">
    <title>eShopping | Others</title>
    <link rel="stylesheet" href="Products.css">
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
                <div class="nav-links" id="navLinks">
                <img src="../eShopping/images/close.png" class="menu-icon"
                 onclick="hideMenu()">
                <ul id="MenuItems">
                    <li><a href="../Homepage/home.php">Home</a></li>
                    <li><a href="../Homepage/Shoppage.php">Shop</a></li>
                    <li><a href="../About/About.php">About</a></li>
                    <li><a href="../Contact%20Us/Contact.php">Contact</a></li>
                    <li><a href="../Account/Account.php">Account</a></li>
                    <!---<li><a href="../Account/Cart.php">Cart</a></li>--->
                </ul>
            </nav>
                <form action="results.php" class="search" method="get">
                    <input type="search" name="user_query" placeholder="Search here..." class="searchbar">
                    <button type="submit" name="search" class="btn2"><img src="../Account/Searchicon.png" class="icon" id="image"></button>
                    <!--<input type="submit" name="search" value="Search">--->
                </form> 

            <img onclick="window.location.href='../Account/Cart.php';" src="../eShopping/images/cart.png" width="30px" height="30px">
            <img src="../eShopping/images/menu(Black).png" class="menu-icon"
                 onclick="showMenu()">
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

   $select = mysqli_query($conn, "SELECT * FROM tbl_product WHERE subcategory_name='Others'");
   
?>

<!-----------Products--------->
<div class="small-container">
    <h2 class="title">Others</h2>
    
    <div class="row">
       <?php while($row = mysqli_fetch_assoc($select)){ ?>

        <form action="" method="post">
        <div class="col-4">
        <img class="image" src="uploaded_img/<?php echo $row['product_image']; ?>" height="100" alt="">
            <h4><?php echo $row['product_name']; ?></h4>
            <p><?php echo $row['subcategory_name']; ?></p>
            <p>Ksh<?php echo $row['unit_price']; ?>/-</p>
            <!---<p><?php //echo $row['product_description']; ?></p>---->
            <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>">
            <input type="hidden" name="product_name" value="<?php echo $row['product_name']; ?>">
            <input type="hidden" name="unit_price" value="<?php echo $row['unit_price']; ?>">
            <input type="hidden" name="product_image" value="<?php echo $row['product_image']; ?>">
            <input type="hidden" name="product_description" value="<?php echo $row['product_description']; ?>">
            <input type="submit" class="btn" value="Add to Cart" name="add_to_cart"><br>
            <input type="submit" class="btn" value="View Details" name="add_to_product">
        </div>
        </form>
        
        <?php } ?>
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

<!--------------JavaScript for Toggle Menu----------------->
<script>
    var navLinks=document.getElementById("navLinks");
    function showMenu()
    {
        navLinks.style.right="0";
    }

    function hideMenu()
    {
        navLinks.style.right="-200px";
    }
</script>

</body>
</html>