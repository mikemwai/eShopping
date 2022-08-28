<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width , initial-scale=1.0">
    <title>eShopping | Shoppage</title>
    <link rel="stylesheet" href="Shoppage.css">
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
                        <!--<form action="" class="search-bar-container" id="search-form">
                        <input type="search" id="search-box" placeholder="search here...">
                        <img src="../Account/Searchicon.png" class="icon" id="image">
                         </form>------>
                    </ul>
                </nav>

                <form action="results.php" class="" method="get">
                    <input type="search" name="user_query" placeholder="Search here..." class="searchbar">
                    <button type="submit" name="search" class="btn2"><img src="../Account/Searchicon.png" class="icon" id="image"></button>
                    <!--<input type="submit" name="search" value="Search">--->
                </form> 

            <!--<img src="../Account/Searchicon.png" class="icon" id="search-icon">---->
                <img id="image" onclick="window.location.href='../Account/Cart.php';" src="../eShopping/images/cart.png" width="30px" height="30px">
                <img src="../eShopping/images/menu.png" class="menu-icon"
                     onclick="menu-toggle()">
            </div>
        </div>
    </div>
</div>

<!-------Categories------->
<div class="small-container">
    <h2 class="title">Shop With Us</h2>
    <div class="row">
        <div onclick="window.location.href='../Account/Menspage.php';" class="col-4">
            <img src="../eShopping/pexels-teddy-joseph-2955375.jpg">
            <h4>Men</h4>
       </div>

        <div onclick="window.location.href='../Account/Ladiespage.php';" class="col-4">
            <img src="../eShopping/pexels-ogo-3597931.jpg">
            <h4>Ladies</h4>
        </div>

        <div onclick="window.location.href='../Account/Childrenspage.php';" class="col-4">
            <img src="../eShopping/pexels-amina-filkins-5559985.jpg">
            <h4>Children</h4>
        </div>

        <div onclick="window.location.href='../Account/Petspage.php';" class="col-4">
            <img src="Pets1.jpg">
            <h4>Pets</h4>
        </div>
    </div>
</div>

<!-------------Subcategories------------>
<div class="small-container">
    <h2 class="title">Subcategories</h2>
    <div class="row">
        <div onclick="window.location.href='../Account/Formal.php';" class="col-4">
            <img class="image" src="Formal.jpg">
            <h4>Formal</h4>
       </div>

        <div onclick="window.location.href='../Account/Casual.php';" class="col-4">
            <img class="image" src="Casual.jpg">
            <h4>Casual</h4>
        </div>

        <div onclick="window.location.href='../Account/Sports.php';" class="col-4">
            <img class="image" src="Sports.jpg">
            <h4>Sports</h4>
        </div>

        <div onclick="window.location.href='../Account/Dogs.php';" class="col-4">
            <img class="image" src="Pets1.jpg">
            <h4>Dogs</h4>
        </div>

        <div onclick="window.location.href='../Account/Cats.php';" class="col-4">
            <img class="image" src="Cat2.png">
            <h4>Cats</h4>
        </div>

        <div onclick="window.location.href='../Account/Others.php';" class="col-4">
            <img class="image" src="Rabbit1.webp">
            <h4>Others</h4>
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

<!--<script>
   document.querySelector('#search-icon').onclick = () =>
   {
    document.querySelector('#search-form').classlist.toggle('active');
   }
</script>---->

</body>
</html>