<?php

session_start();        // Start the session
?>

<?php
include ("DBconnect.php");       //include database configuration page
include ("session.php");         //include session page

$error = "";


if (isset($_POST['submit'])) {

    $email = $_POST['email'];
    $password = $_POST['pwd'];

    if (email_exists($email,$db)) {

        $result = mysqli_query($db , "SELECT password FROM members WHERE email = '$email'");     //check the given password is matching with related email address.
        $getpassword = mysqli_fetch_assoc($result);

        $getpassword['password'];


        if ($password !== $getpassword['password']) {
            $error = "Password is incorrect.";          //if the password is wrong, display massage"Password is incorrect."
        }
        else {

            $_SESSION['email'] = $email;
            //print_r($_SESSION);
            header("location: memberProfile.php");      //if the email and password are matching, go to the member profile.

        }

    }
    else {
        $error = "Invalid Email";       //if the email wrong,display massage "Invalid Email"
    }

}

?>

<html>

<head>
    <style>
    section{
    height: 1100px;
    width: 1600px;
    margin-top: 0px;

    }
    header{
    height: 140px;
    width: 1600px;
    background-color: black;

    }
    nav{
    float: left;
    word-spacing: 30px ;
    padding: 20px;

    }
    nav li{
    display: inline-block;
    line-height: 100px;
    font-size: 20px;
    }
    li a{
        color: white;
        text-decoration: none;
        font-family: "Times New Roman";
        font-weight: bold;
        font-size: 20px;
    }
    </style>
    <script>
        function formValidation(){
            var a = document.forms["form"]["pwd"].value;
            if (a == "") {
                alert("Password is required!!!!!!!!!");
                return false;
            }
        }

    </script>
    <title>Member Sign In</title>
    <link rel="stylesheet" href="LoginStyleMember.css">
</head>

<body>
<header>
    <nav>
        <ul>
            <li><a href="HomePage.html">Home</a></li>
            <li><a href="loadbookH.php">Books</a></li>
            <li><a href="MemberLogin.php">Member</a></li>
            <li><a href="Profile.php">Profile</a></li>
            <li><a href="index.php">Search</a></li>
            <li><a href="borrowed_books.php">Borrowed Books</a></li>
            <li><a href="returned_books.php">Returned Books</a></li>
        </ul>
    </nav>
</header>
<section>
<div id = "error"> <?php  echo $error ; ?></div>
<div class="form-area">
    <div class="img-area">
        <img src="Images/User_Avatar.png" alt="">
    </div>

    <form method="post" action="MemberLogin.php"  enctype="multipart/form-data"  onsubmit=" return formValidation()" name="form">
        <h2>Member Sign In</h2>
        <p>Email : </p>
        <input type="text" name="email" required>

        <p>Password : </p>
        <input type="password" name="pwd" required>

        <p>Don't have an account?<a href="memberRegister.php"/> Register</a></p>
        <p>Reset Password? <a href="ResetPassword.php"/>Reset</p>

        <a href="memberProfile.php" class="btn">
            <span class="btn-text" ><input name="submit" type="submit" id="submit" value="Sign in" > </span>
        </a>




        <p>Forget Password?<a href="Forget.php" />Forget</p>

</div>
</form>
</section>
</body>
</html>

