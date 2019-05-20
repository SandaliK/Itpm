<?php
include "DBconnect.php";

?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Online Library Management System</title>
    <style>
    .srch{
      padding-left: 1100px;
        size: 40px;

    }

    </style>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=decice-width,initial-scale=1">

</head>
<style type="text/css">

</style>
<body>
<div class="wrapper">
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

        <h1 style="text-align: center;font-size: 36px; color: white;">SEARCH</h1>



        <div class="srch">
            <form style="padding-top: 2%; padding-bottom: 5%;" class="navbar-form" method="post" name="form1">

                <input style="height: 40px; width: 200px; text-align: start;"  class="form-control" type="text" name="search" placeholder="Search books..." required="">

                <button style="height: 40px; width: 70px; background-color: blue; font-size: 10px; font-weight: bold; color: white;" type="submit" name="submit" class="btn btn-default">Click
                </button>

            </form>
        </div>

    </header>
    <section>



        <div class="box2">
        <h2 style="text-align: start; font-size: 30px; margin-right: 20px">List Of Available Books</h2>
        <?php
        if(isset($_POST['submit'])){
            $q = mysqli_query($db,"SELECT * FROM book WHERE book_title LIKE '%$_POST[search]%' OR  book_description LIKE '%$_POST[search]%' OR book_category LIKE '%$_POST[search]%' OR book_author LIKE '%$_POST[search]%'");
            if(mysqli_num_rows($q)==0){
                echo "Sorry! No Book Found. Try Searching again!";
            }
            else{
                echo "<table style='color: yellow; ' class='table table-bordered table-hover'>";
                echo  "<tr style='background-color: black;'>";
//Table header
                echo "<th>"; echo "Id"; echo  "</th>";
                echo "<th>"; echo "Title"; echo "</th>";
                echo "<th>"; echo "Description"; echo "</th>";
                echo "<th>"; echo "Category"; echo "</th>";
                echo "<th>"; echo "Author"; echo "</th>";
                echo "<th>"; echo "Publish date"; echo "</th>";
                echo "<th>"; echo "qty"; echo "</th>";
                echo "</tr>";

                while($row = mysqli_fetch_assoc($q)){
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
            }
        }


        $res=mysqli_query($db,"SELECT * FROM `book`;");
        echo "<table class='table table-bordered table-hover' style='text-space: 10px;'>";
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

        </div>
    </section>
    <footer>

    </footer>
</div
</body>
</html>