<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>eShopping | Registration</title>
    <link rel="stylesheet" href="../Account/Registration.css">
    <link rel="icon" href="../Homepage/favicon.ico" type="image/x-icon"> 
</head>
<body>

    <div class="header">
        <div class="container">
            <div class="navbar">
                <div class="logo">
                    <img src="../Homepage/Logo.png" width="200px">
                </div>
                <nav>
                    <ul id="MenuItems">
                        <li><a href="../Homepage/Homepage.php">Home</a></li>
                        <li><a href="../Homepage/Shoppage.html">Shop</a></li>
                        <li><a href="../About/About.html">About</a></li>
                        <li><a href="../Contact%20Us/Contact.html">Contact</a></li>
                        <li><a href="../Account/Login.php">Account</a></li>
                    </ul>
            </nav>
    
                <img src="../eShopping/images/cart.png" width="30px" height="30px">
                <img src="../eShopping/images/menu.png" class="menu-icon"
                     onclick="menu-toggle()">
            </div>
        </div>
    </div>

     <form action="process_registration.php" method="post">
        <h2 class="title">
            Registration Page
        </h2>
         <fieldset><!------Groups related elements in a form(Draws box around related elements) -->
             <legend>Personal Information</legend>

        <label for="UserNo">UserNo (Your Address)</label>
         <input type="int" id="UserNo" name="UserNo">

         <p></p><label for="fname">FirstName</label>
         <input type="text" id="fname" name="first_name">

         <p></p><label for="lname">LastName</label>
         <input type="varchar" id="lname" name="last_name"></p>

         <p></p><label for="sex">Sex</label>
         <input type="varchar" id="sex" name="sex"></p>

         <!----<p>
                 Sex<br></br>
             <select type="varchar" id="sex" name="sex">
                 <option value="" selected></option>
                 <option value="Male">Male</option>
                 <option value="Female">Female</option>
             </select>
             </p>----->

        <p></p><label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Enter your Password"></p>

        <p></p><label for="PhoneNo">PhoneNo</label>
        <input type="varchar" id="PhoneNo" name="PhoneNo"></p>

         <!--For the submit button, you can either use the input element or
         the button element. (Ensure the value of the type attribute is "submit"-->
         <input type="submit" value="Register" name="registration" class="btn"><br></br>

         <!--button type="submit">Register HERE</button><br></br-->
            </fieldset>
     </form>
</body>
</html>