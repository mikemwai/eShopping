<?php

session_start();

require_once ('component.php');

class CreateDb
{

    // get product from the database
    public function getData()
    {
        require("connection.php");

        $sql = "SELECT * FROM tbl_product";

        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0)
        {
            return $result;
        }
    }
}


// create instance of Createdb class
$database = new CreateDb("ecommerce", "tbl_product");

if (isset($_POST['add']))
{
    /// print_r($_POST['product_id']);
    if(isset($_SESSION['cart'])){

        $item_array_id = array_column($_SESSION['cart'], "product_id");

        if(in_array($_POST['product_id'], $item_array_id))
        {
            echo "<script>alert('Product is already added in the cart..!')</script>";
            echo "<script>window.location = 'index.php'</script>";
        }
        else{

            $count = count($_SESSION['cart']);
            $item_array = array(
                'product_id' => $_POST['product_id']
            );

            $_SESSION['cart'][$count] = $item_array;
        }

    }else{

        $item_array = array
        (
                'product_id' => $_POST['product_id']
        );

        // Create new session variable
        $_SESSION['cart'][0] = $item_array;
        print_r($_SESSION['cart']);
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>eShopping | Menspage</title>
    <link rel="stylesheet" href="Men.css">
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
                    <li><a href="../About/About.html">About</a></li>
                    <li><a href="../Contact%20Us/Contact.html">Contact</a></li>
                    <li><a href="../Account/Account.php">Account</a></li>
                </ul>
        </nav>

            <img src="../eShopping/images/cart.png" width="30px" height="30px">
            <img src="../eShopping/images/menu.png" class="menu-icon"
                 onclick="menu-toggle()">
        </div>
    </div>
</div>

<!-----------Subcategories--------->
<div class="small-container">
    <h2 class="title">Men Products</h2>

    <h2 class="title">Formal</h2>

    <?php //require_once ("header.php"); ?>
    <div class="container">
        <div class="row text-center py-5">
            <?php
                $result = $database->getData();
                while ($row = mysqli_fetch_assoc($result))
                {
                    component($row['product_name'], $row['unit_price'], $row['product_image'], $row['product_id']);
                }
            ?>
        </div>
    </div>
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