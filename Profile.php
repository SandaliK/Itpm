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

<html>
<head>
    <link rel="stylesheet" href="css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="css/common.css">
    <style>

        /*header{*/
            /*height: 140px;*/
            /*width: 1600px;*/
            /*background-color: black;*/

        /*}*/
        /*header h1{*/
            /*alignment: center;*/
            /*float: inside;*/
            /*padding-right: 400px;*/

        /*}*/
        /*section{*/
            /*height: 1400px;*/
            /*width: 1600px;*/
            /*margin-top: 0px;*/
            /*background-image: url("Images/Back4.jpg");*/


        /*}*/
        /*nav{*/
            /*float: left;*/
            /*word-spacing: 15px ;*/
            /*padding: 20px;*/

        /*}*/
        /*nav li{*/
            /*display: inline-block;*/
            /*line-height: 100px;*/
            /*font-size: 20px;*/
        /*}*/
        /*li a{*/
            /*color: white;*/
            /*text-decoration: none;*/
            /*font-family: "Times New Roman";*/
            /*font-weight: bold;*/
            /*font-size: 20px;*/
        /*}*/
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
        .box2{
            height:800px;
            width: 1000px;
            background: rgba(57,50,70,0.6);
            margin: 70px auto;
            opacity: 7%;
            font-family: "Times New Roman";
            solid-opacity: -7%;
            padding-top: 5px;


        }
        .box2 h2{
            font-family: "Times New Roman";
            font-size: 28px;
            font-weight: bold;
            float: contour;
            color: mediumblue;
        }
        .box2 table{
            table-layout: auto;
            grid-row: auto;
            color: wheat;
            font-size: 18px;
            font-family: "Times New Roman";
            font-style: normal;
            column-count: auto;
            column-rule-color: black;
            row-gap: 30px;
            column-fill: auto;
            column-gap: 100px;
            table-border-color-dark: black;
            align-content: center;


        }
    </style>
    <title class="info">Member Profile</title>
    <link rel = "stylesheet" href="">
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
    <h1 style="color: white; padding-left: 50px;">Member Profile</h1>
</header>
<section>

    <?php

    while ($row = mysqli_fetch_array($res)) {
        ?>

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
        </div>
        <?php
    }
    ?>
    <div class="box2">
        <h2 style="text-align: start; font-size: 30px; margin-right: 20px">List Of Available Books</h2>
        <?php
        $res=mysqli_query($db,"SELECT * FROM `book`;");
        echo "<table class='table table-bordered table-hover' style='text-space: 10px; margin-left: 20px;'>";
        echo  "<tr style='background-color: black; all-space-treatment: 20px;'>";
        //Table header
        echo "<th>"; echo "Id"; echo  "</th>";
        echo "<th>"; echo "Title"; echo "</th>";
        echo "<th>"; echo "Description"; echo "</th>";
        echo "<th>"; echo "Category"; echo "</th>";
        echo "<th>"; echo "Author"; echo "</th>";
        echo "<th>"; echo "Publish date"; echo "</th>";
        echo "<th>"; echo "qty"; echo "</th>";
        echo "</tr>";

        while($row = mysqli_fetch_assoc($res)){
            echo "<tr>";
            echo "<td>"; echo $row['book_id']; echo "</td>";
            echo "<td>"; echo $row['book_title']; echo "</td>";
            echo "<td>"; echo $row['book_description']; echo "</td>";
            echo "<td>"; echo $row['book_category']; echo "</td>";
            echo "<td>"; echo $row['book_author']; echo "</td>";
            echo "<td>"; echo $row['date_publish']; echo "</td>";
            echo "<td>"; echo $row['qty']; echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
        ?>
        <div class="press"><a href="logout.php" class="button button1">Logout</a> </div>
</section>
</body>
</html>
