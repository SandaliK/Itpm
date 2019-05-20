<?php
session_start();
require 'DBconnect.php';

$aql = "SELECT * FROM member WHERE email = '".$_SESSION['info']."'";
$aqlq = mysqli_query($db,$aql);
$aqlqq = mysqli_fetch_assoc($aqlq);

$user = $aqlqq['memName'];
$pass = $aqlqq['password'];

$text = "Hi!!!! " . $user . " your Password is : " . $pass;;

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <style>
        body{
            background-image: url("Images/Back6.jpg");
        }

        .press{
            margin-top: 10px;
            margin-left: 20px;
        }

        .button{
            margin-left: 75%;
            background-color: tomato;
            border: none;
            color: white;
            padding: 16px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 18px;
            font-style: italic;
            font-family: "Britannic Bold";
            -webkit-transition-duration: 0.4s; /* Safari */
            transition-duration: 0.4s;
            cursor: pointer;

        }

        .button1 {
            background-color: white;
            color: black;
            border: 2px solid tomato;
        }

        .button1:hover {
            background-color: tomato;
            color: white;
        }

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
        nav li {
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
    <meta charset="UTF-8">
    <meta name ="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body >
<header>
    <nav>
        <ul>
            <li><a href="HomePage.html">Home</a></li>
            <li><a href="loadbookH.php">Books</a></li>
            <li><a href="MemberLogin.php">Member</a></li>
            <li><a href="Profile.php">Profile</a></li>
            <li><a href="index.php">Search</a></li>
        </ul>
    </nav>
</header>
<section>

<slider>

    <div class="press"><b><a href="MemberLogin.php" class="button button1">Login!!!!!</a></b> </div>

    <p><?php echo "<script type='text/javascript'>alert('$text');</script>"; ?></p>
</slider>
</section>
</body>

</html>
