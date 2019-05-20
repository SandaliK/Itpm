<?php

session_start();        // Start the session
?>

<?php
include ("DBconnect.php");       //include database configuration page
include ("session.php");        //include session page

$error = "";

if (isset($_POST['submit'])){       //after submitting the details, assign details to the variables.

    $memName = $_POST['name'];
    $email = $_POST['email'];
    $phn = $_POST['phn'];
    $addr = $_POST['addr'];
    $password = $_POST['pwd1'];
    $password = $_POST['pwd2'];

    if (email_exists($email, $db)){         //check the existing email addresses.

        $error = "Email exists";

    }else{
    //echo 'else<br>';
        $insertQuery = "INSERT INTO members(memName,email,contactNo,address,password) VALUES ('$memName','$email','$phn','$addr','$password')";      //insert data into database
        echo $insertQuery;
        $res =  mysqli_query($db , $insertQuery);
        print_r($res);
        if (!$res){     //check the result

            die("failed!!!");       //if result fail, display failed.

        }else{

            header("location: memberLogin.php");      //if result true , go to member profile page.
        }

    }

}

?>

<html>

<head>
    <style>
        nav{
            float: left;
            word-spacing: 30px ;
            padding: 20px;
            padding-top: 10px;

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
        header{
            height: 140px;
            width: 1600px;
            background-color: black;
            padding-top: 10px;

        }
        header h1{
            alignment: center;
            float: inside;
            padding-right: 400px;

        }
        section{
            height: 1100px;
            width: 1600px;
            margin-top: 0px;


        }

    </style>
    <script>
        function formValidation(){


            var c = document.forms["form"]["phn"].value;
            if (c == ""){
                alert("Fill the contact number!!");
                return false;
            }
            if (c.length<10){
                alert("Enter 10 numbers!!");
                return false;
            }

            var d = document.forms["form"]["email"].value;          //email address validation
            var atsign = d.indexOf("@");
            var dotsign = d.lastIndexOf(".");
            if (atsign<1 || dotsign < atsign+2 || dotsign+2 >= d.length) {
                alert("Enter the valid Email address!!");
                return false;
            }
        }

    </script>
    <style>
        body{
            background-image: url("Images/Back1.jpg");
            -webkit-background-size: cover;
            background-size: cover;
            background-position: center center;
        }

        .form-area{
            width: 500px;
            height: 1000px;
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
    <title>Register</title>
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
<div id="error"><?php  echo $error ; ?></div>
<div class="form-area">
    <div class="img-area">
        <img src="Images/User_Avatar.png">
    </div>

    <form method="POST" action="memberRegister.php" enctype="multipart/form-data"  onsubmit=" return formValidation()" name="form">

        <h2>Register</h2>
        <p>Member Name : </p>
        <input type="text" name="name" id="name" required>
        <p>E mail : </p>
        <input type="text" name="email" required>
        <p>Contact No: </p>
        <input type="text" name="phn" id="phn" required>
        <p>Address: </p>
        <input type="text" name="addr" required>
        <p>Password : </p>
        <input type="password" name="pwd1" required>
        <p>Confirm Password : </p>
        <input type="password" name="pwd2" required>

        <a href="#" class="btn">
            <span class="btn-text"><input name="submit" type="submit" id="submit" >Register</span>
        </a>
        <p>Already a member? <a href="MemberLogin.php"> Sign In </a> </p>

    </form>
</div>
</section>
</body>
</html>

