<?php

require("connection.php");

//session_start();

if(isset($_POST['registration']))
{

$FName=$_POST["first_name"];
$LName=$_POST["last_name"];
$Email=$_POST["Email"];
$Password=$_POST["password"];
$Sex=$_POST["sex"];


$sql="INSERT INTO  tbl_users(first_name,last_name,email,password,gender)
VALUES ('$FName','$LName','$Email','$Password','$Sex')";

$select=" SELECT * from tbl_users WHERE email='$Email' && password='$Password' ";

$result=mysqli_query($conn,$select);

if(mysqli_num_rows($result)>0)
{
    if(empty($FName) || empty($LName) || empty($Email) || empty($Password) || empty($Sex))
    {
    $error[] = 'Please fill out all details!';
    }
    else
    {
    $error[]='User already exists!';
    }
}
else
{
    if(mysqli_query($conn,$sql))
   {
    header('location:Account.php');
   }
  else
   {
    $error[]='please fill out all details';
   }
}
};

?>

<?php 

require("connection.php");

session_start();

if(isset($_POST['Login']))
{
$Email=$_POST["Email"];
$Password=$_POST["password"];


$select=" SELECT * from tbl_users WHERE email='$Email' && password='$Password' ";

$result=mysqli_query($conn,$select);

if(mysqli_num_rows($result) > 0)
{
    $row = mysqli_fetch_array($result);

    if(empty($Email) || empty($Password))
    {
       $error[] = 'Please fill out all details!';
    }
    else
    {
    if($row['role'] == '1')
    {
       header('location:admin.php');

    }
    elseif($row['role'] == '3')
    {
       $_SESSION['first_name'] = $row['first_name'];
       $_SESSION['last_name'] = $row['last_name'];
       $_SESSION['user_id']=$row['user_id'];
       header('location:Cart.php');

    }
    }
   
 }
 else
 {
    $error[] = 'incorrect email or password!';
 }
};

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width , initial-scale=1.0">
    <title>eShopping | Account</title>
    <link rel="stylesheet" href="Account.css">
    <link rel="icon" href="../Homepage/favicon.ico" type="image/x-icon"> 
</head>
<body>
<div style="margin: 0 auto" class="hero">
    <div class="header">
        <div class="container">
            <div class="navbar">
                <a href="../Homepage/home.php">
                <div class="logo">
                    <img src="../Homepage/Logo(White).png" width="200px">
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
                    <li><a href="../Account/Cart.php">Cart</a></li>
                </ul>
                </div>
                </nav>

                <img src="../eShopping/images/menu.png" class="menu-icon"
                 onclick="showMenu()">
            </div>
        </div>
    </div>
    
    <div style="margin: 0 auto" class="form-box">
    
        <div class="form-container">
            <?php
           if(isset($error))
           {
            foreach($error as $error)
            {
            echo '<span class="error-msg">'.$error.'</span>';
             };
           };
           ?>
        </div>       
    
        <div class="button-box">
            <div id="btn"></div>
            <button type="button" class="toggle-btn" onclick="login()">Log In</button>
            <button type="button" class="toggle-btn" onclick="register()">Register</button>
        </div>
        <div class="social-icons">
            <img src="fb.png">
            <img src="tw.png">
            <img src="gp.png">
        </div>

        <!------------Login Form-------------->
        <form id="login" action="" method="post" class="input-group">              
                  <input type="email" id="Email" name="Email" placeholder="Email" class="input-field"></p>
                  <input type="password" id="password" name="password" placeholder="Password" class="input-field"></p>
                   <input type="submit" value="Login" name="Login" class="submit-btn"><br>
                   <!--<p>Forgotten Password?</p>
                   <a href="Account_update.php?edit=<?php //echo $row['user_id']; ?>">
                   <p>Reset Password</p>--->
                   </a>
                   <!---<p>Don't have an account? <a href="../Account/Registration.php">Register Now</a></p>--->
        </form>

        <!-----------Registration Form------->
        <form id="register" action="" method="post" class="input-group">    
             <input type="text" id="fname" name="first_name" placeholder="FirstName" class="input-field"><p>
             <input type="varchar" id="lname" name="last_name" placeholder="LastName" class="input-field"></p>
             <input type="email" id="Email" name="Email" placeholder="Email" class="input-field"><p>
             <input type="password" id="password" name="password" placeholder="Password" class="input-field"></p>
             <input type="varchar" id="sex" name="sex" placeholder="Gender" class="input-field"></p>
             <!--<input type="checkbox" class="chech-box">I agree to the Terms and Conditions--->
   
             <input type="submit" value="Register" name="registration" class="submit-btn"><br></br>
       </form>

    </div>

</div>

<script>
    var x=document.getElementById("login");
    var y=document.getElementById("register");
    var z=document.getElementById("btn");
    function register()
    {
        x.style.left="-400px";
        y.style.left="50px";
        z.style.left="110px";
    }
    
    function login()
    {
        x.style.left="50px";
        y.style.left="450px";
        z.style.left="0px";
    }
</script>

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