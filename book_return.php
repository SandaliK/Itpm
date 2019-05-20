<?php
session_start();
?>

<?php
include ("session.php");
include ("DBconnect.php");
print_r($_POST);
?>
<html>
<head>
    <link rel="stylesheet" href="css/common.css">
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
    <h1 style="color: white; padding-left: 50px;">Book Return</h1>

<?php

if(isset($_POST['borrowedBookId'])){
$sql = "UPDATE borrowedbooks SET fine_charges = '".$_POST['fine_charges']."' , return_status = 'returned' where borrowedBookId = ".$_POST['borrowedBookId'];
echo $sql;
    $result = mysqli_query($db, $sql);
    if($result){
        header("Location: borrowed_books.php");

        //header('','','borrowed_books.php');
    }
}

else{
    $borrow_id = $_GET['b_id'];
    $sql = "SELECT * FROM borrowedbooks INNER JOIN members ON borrowedbooks.memberId=members.memberId where borrowedBookId=$borrow_id ";

    $result = mysqli_query($db, $sql);
    //print_r($result-> $row);
    ?>
    <form id="book_return_form" action="book_return.php" method="post">
    <table id="example" class="display" style="width:100%">
        <thead>
        <tr>
            <th>
                ref_no
            </th>
            <th>
                book id
            </th>
            <th>
                book name
            </th>
            <th>
                student name
            </th>
            <th>
                borrowed date
            </th>
            <th>
                expected date to return
            </th>
            <th>
                Delay
            </th>
            <th>
                Fine Charges
            </th>
        </tr>
        </thead>
        <tbody>
        <?php


        if ($result->num_rows > 0) {

            while ($row = mysqli_fetch_assoc($result)) {
                $date = date('Y-m-d');//echo $date;
                $date1=date_create(date('Y-m-d' , strtotime($row['returnedDate'])));
                $date2=date_create($date);
                $diff=date_diff($date1,$date2);
                $no_of_days = $diff->format("%a");

                ?>
                <tr>
                    <td><?php echo $row['borrowedBookId']?><input type="hidden" name="borrowedBookId" id="borrowedBookId" value="<?php echo $row['borrowedBookId']?>"></td>
                    <td><?php echo $row['bookId']?></td>
                    <td><?php echo $row['bookName']?></td>
                    <td><?php echo $row['memberName']?></td>
                    <td><?php echo $row['issuedDate']?></td>
                    <td><?php echo $row['returnedDate']?></td>
                    <td><?php echo $diff->format("%R%a days"); ?></td>
                    <td><?php echo $no_of_days*20 ?><input type="hidden" name="fine_charges" id="fine_charges" value="<?php echo $no_of_days*20 ?>"></td>
                </tr>
                <?php
            }
        }
        ?>
        </tbody>
    </table>

    <div class="press"> <input type="submit" VALUE="submit"> </div>
</form>
</section>
    <?php } ?>
</body>
</html>
