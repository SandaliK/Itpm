<?php
session_start();
?>

<?php
include ("session.php");
include ("DBconnect.php");
$email = "";
$email = $_SESSION['email'];

$displayQuery = "SELECT * FROM members WHERE email = '$email'";
$res = mysqli_query($db,$displayQuery);


?>
<?php
$menu_name = 'profile';
include 'nav.php';
?>

<html>
<head>
    <style>
        body{
            background-image: url("Images/Back4.jpg");
            -webkit-background-size: cover;
            background-size: cover;
            background-position: center center;
        }
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

        .info {
            width: 40%;
            text-align: left;
            font-style: italic;
            padding: 20px;
            background-color: rgba(57,50,70,0.6);
            margin: auto;
        }

        label{
            color: white;
            font-size: 25px;
            font-style: italic;
            width: 500px;
        }

        .l1{
            border-radius: 10px;
            border: white solid 1px;
            font-size: 30px;
            background-color: white;
            color: black;
            float: right;
            width: 300px;
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

        .buttonEdit{
            margin-left: 65%;
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

        .button2 {
            background-color: white;
            color: black;
            border: 2px solid blueviolet;
        }

        .button2:hover {
            background-color: blueviolet;
            color: white;
        }
    </style>
    <title class="info">Member Profile</title>
    <link rel = "stylesheet" href="">
</head>
<body>
<header>
<!--    <nav>-->
<!--        <li><a href="HomePage.html">Home</a></li>-->
<!--        <li><a href="loadbookH.php">Books</a></li>-->
<!--        <li><a href="MemberLogin.php">Member</a></li>-->
<!--        <li><a href="Profile.php">Profile</a></li>-->
<!--        <li><a href="index.php">Search</a></li>-->
<!--    </nav>-->
</header>
<section>
<?php

while ($row = mysqli_fetch_array($res)) {
    ?>
    <h1>Member Profile</h1>
    <div class="profile">
        <form class="info" method="post" id="profile" action="">
            <label>Member ID</label>
            <label class="l1"><?php echo $row['memberId'] ?></label><br><br>
            <label>Your Name: </label><br>
            <label class="l1"><?php echo $row['memName'] ?></label><br><br>
            <label>Your Email: </label><br>
            <label class="l1"><?php echo $row['email'] ?></label><br><br>
            <label>Your Contact No: </label><br>
            <label class="l1"><?php echo $row['contactNo'] ?></label><br><br>
            <label>Your Address: </label><br>
            <label class="l1"><?php echo $row['address'] ?></label><br><br>
        </form>
        <div class="press"><a href="UpdateMember.php?memId=<?php echo $row['memId']?>" class="buttonEdit button2">Edit</a> </div>
        <div class="press"><a href="logout.php" class="button button1">Logout</a> </div>

    </div>
    <?php

}
?>
</section>
</body>
</html>
