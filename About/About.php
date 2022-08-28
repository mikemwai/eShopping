<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width , initial-scale=1.0">
    <title>eShopping | Aboutpage</title>
    <link rel="stylesheet" href="About1.css">
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
                <img src="../eShopping/images/menu.png" class="menu-icon" onclick="menu-toggle()">
        </div>
    </div>
</div>

<!--------------About------------>
<h2 class="title">About Us</h2>
<div class="row">
    <div class="col-2">
        <h1>Welcome to eShopping platform today!</h1><br>
          <p>
            The platform is an effective way of allowing traders to sell their products to customers. 
            This is very beneficial especially during the pandemic period where we have to minimize the amount of movement.
            Business can go on as usual without any interruptions whatsoever!
            </p>
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