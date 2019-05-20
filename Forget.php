<?php
/**
 * Created by PhpStorm.
 * User: SARA PERERA
 * Date: 3/18/2019
 * Time: 9:09 PM
 */

$res = "";
session_start();
require 'DBconnect.php';

if (isset($_POST['Recover'])){
    $dql = "SELECT * FROM member WHERE  email = '".$_POST['email']."'";
    $dqlq = mysqli_query($db,$dql);
    if (!empty($_POST['email'])){
        $_SESSION['info'] = $_POST['email'];
        header("location:info.php");
    }
    if (empty($_POST['email'])){
        $res = "What is your Email????";
    }elseif (filter_var($_POST['email'])){
        $res = "invalid email";
    }
    else (mysqli_fetch_assoc($dqlq)==0){
    $res="Email doesn't exists!!!!!!"
    };
}
?>


<html>

<head>
    <style>
        body{
            background-image: url("Images/Back1.jpg");
            -webkit-background-size: cover;
            background-size: cover;
            background-position: center center;
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
        .form-area{
            width: 500px;
            height: 600px;
            position: relative;
            background: rgba(0,0,0,0.6);
            text-align: center;
            margin: 60px auto 0;
            padding: 35px;
            border: 3px solid #fff;
            -webkit-border-radius: 70px 0 70px 0 ;
            -moz-border-radius: 70px 0 70px 0;
            border-radius: 70px 0 70px 0;
        }

        .form-area h2{
            margin-bottom: 45px;
            color: #fff;
        }

        .img-area{
            width: 70px;
            height: 70px;
            border-radius: 70%;
            background: cadetblue;
            position: absolute;
            top: -2.6%;
            left: 43.7%;

        }

        .img-area img{
            width:60%;
            padding: 12px;
        }

        input{
            width: 100%;
            height: 50px;
            border-radius: 15px 0 15px 0;
            border: 2px solid #fff;
            margin-bottom: 15px;
            background-color: transparent;
            color: white;
        }

        .form-area p{
            text-align: left;
            color: white;
            text-transform: uppercase;
            font-weight: bold;

        }

        .btn{
            display: inline-block;
            height: 50px;
            width: 150px;
            line-height: 70px;
            overflow: hidden;
            position: relative;
            text-align: center;
            background: tomato;
            border-radius: 25px;
            color: tomato; /*tomato*/
            text-transform: uppercase;
            margin-top: 20px;
            cursor: pointer;
            text-decoration: none;

        }

        .btn-text{
            display: block;
            height: 100%;
            position: relative;
            top: 0;
            -webkit-transition: top 0.6s ;
            -moz-transition: top 0.6s ;
            -ms-trasition: top 0.6s;
            -o-transition: top 0.6s;
            transition: top 0.6s;
            width: 100%;

        }

        .for-pass{
            text-decoration: none;
            display: block;
            margin-top: 30px;
            font-weight: bold;
            font-size: 20px;
            color: white;
        }


    </style>
    <title>Reset Password</title>
    <link rel="stylesheet">
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
        </ul>
    </nav>
</header>
<section>
<div class="form-area">
    <div class="img-area">
        <img src="Images/User_Avatar.png">
    </div>

    <form method="POST" action="Forget.php">

        <h2>Forget Password</h2>
        <p>Email : </p>
        <input type="text" name="email" required><span><?php echo $res; ?></span>

        <a href="#" class="btn">
            <span class="btn-text"><input name="Recover" type="submit" id="submit" ></span>
        </a>

    </form>
</div>
</section>
</body>
</html>


