<html>
<head>
    <link rel="stylesheet" href="css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="css/common.css">

    <style>

        /*body{*/
            /*background-image: url("Images/Back1.jpg");*/
            /*-webkit-background-size: cover;*/
            /*background-size: cover;*/
            /*background-position: center center;*/
        /*}*/
        /*nav{*/
            /*float: left;*/
            /*word-spacing: 30px ;*/
            /*padding: 20px;*/
            /*padding-top: 10px;*/

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
        /*header{*/
            /*height: 140px;*/
            /*width: 1600px;*/
            /*background-color: black;*/
            /*padding-top: 10px;*/

        /*}*/
        /*header h1{*/
            /*alignment: center;*/
            /*float: inside;*/
            /*padding-right: 400px;*/

        /*}*/
        /*section{*/
            /*height: 1100px;*/
            /*width: 1600px;*/
            /*margin-top: 0px;*/


        /*}*/
        /*.wrapper{*/
            /*width: 1700px;*/
            /*margin: 0 auto;*/
            /*background-color: navajowhite;*/
            /*border: 1px solid aqua;*/
        /*}*/
        /*.header{*/
            /*background-color: blue;*/
            /*color: white;*/
            /*text-align: center;*/
            /*margin: 0;*/
            /*padding: 8px;*/
        /*}*/
        /*table{*/
            /*border: 1px solid black;*/
            /*width: 1200px;*/
            /*margin-left: 230px;*/
        /*}*/
        /*tr,td {*/
            /*text-align: center;*/
            /*border: 1px solid black;*/
            /*border-collapse: collapse;*/
            /*padding: 2px;*/
            /*background: white;*/
        /*}*/
        /*form{*/
            /*width: 400px;*/
            /*margin-left: 300px;*/
            /*text-align: center;*/

        /*}*/

    </style>
</head>
<body style="background-color: #99ff99">
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
<div class = "col-lg-3"></div>
<div class = "col-lg-6">

    <h2 align="center">Books Table</h2>
</div>

<form>

    <input style="background-color:mediumspringgreen;width: 150px; height:40px" type="button" value="ADD New Books" onclick="window.location.href='http://localhost:78/ITPMnewproject/add_bookH.php'" />

    <input  style="background-color:mediumspringgreen;width: 150px; height:40px" type="button" value="Edit Books" onclick="window.location.href='http://localhost:78/ITPMnewproject/editbook.php'">

</form>


<?php
require_once 'DBconnect.php';
$sql = "SELECT * FROM add_books";

$result = mysqli_query($db, $sql);
//print_r($result);http://localhost:63342/ITPMnewproject/add_bookH.php?_ijt=obon009iu9l23svd7tlbd6b0tc
?>
<form action="deletebook.php" method="post">
    <table style="margin-left: -200px">
        <tr>
            <th>Book Id</th>
            <th>Book Title</th>
            <th>Author Name</th>
            <th>Book Publication</th>
            <th>Book Price</th>
            <th>Book Quantity</th>
        </tr>

        <?php ?>

        <?php
        if ($result->num_rows > 0) {
            while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><input type="text" name="id" value="<?php echo $row['idNO']?>"></td>
                    <td><input type="text" name="bname" value="<?php echo $row['booksname']?>"></td>
                    <td><input type="text" name="atname" value="<?php echo $row['booksauthorname']?>"></td>
                    <td><input type="text" name="pubname" value="<?php echo $row['bookspublicationname']?>"></td>
                    <td><input type="text" name="bprice" value="<?php echo $row['booksprice']?>"></td>
                    <td><input type="text" name="bqty" value="<?php echo $row['booksqty']?>"></td>
                    <td><input type="submit" name="delete" value="Delete"></td>

                </tr>
                <?php
            }
        }
        ?>
    </table>
</form>
</form>

</section>
</body>
</html>