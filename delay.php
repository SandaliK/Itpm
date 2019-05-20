<html>
<head>
    <link rel="stylesheet" href="css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="css/common.css">
</head>
<body>
<div style="background-color: black; color: white; margin-bottom: -70px">
<h1 style="color: white; text-align: center; margin-left: -100px">Delayed Returns</h1>
</div>
<header>
    <nav>
        <ul>
            <li><a href="HomePage.html">Home</a></li>
            <li><a href="loadbookH.php">Books</a></li>
            <li><a href="MemberLogin.php">Member</a></li>
            <li><a href="Profile.php">Profile</a></li>
            <li><a href="index.php">Search</a></li>
            <li ><a style="color: gold" href="borrowed_books.php">Borrowed Books</a></li>
            <li ><a href="returned_books.php">Returned Books</a></li>

        </ul>
    </nav>

</header>
<?php
require_once 'DBconnect.php';
$sql = "SELECT * FROM borrowedbooks INNER JOIN members ON borrowedbooks.memberId=members.memberId where return_status = 'pending' ";

$result = mysqli_query($db, $sql);
//print_r($result);
?>
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
                No of days
            </th>

            <th>
                actions
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
            if(! $no_of_days > 0) continue;
            ?>
            <tr>
                <td><?php echo $row['borrowedBookId']?></td>
                <td><?php echo $row['bookId']?></td>
                <td><?php echo $row['bookName']?></td>
                <td><?php echo $row['memberName']?></td>
                <td><?php echo $row['issuedDate']?></td>
                <td><?php echo $row['returnedDate']?></td>
                <td><?php echo $no_of_days ?></td>
                <td><button><a href="book_return.php?b_id=<?php echo $row['borrowedBookId'] ?>">Return</a></button></td>
            </tr>
            <?php
        }
    }
    ?>
    </tbody>
</table>
    <script type="text/javascript" src="js/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            var table = $('#example').DataTable();
        } );
        </script>
</body>
</html>