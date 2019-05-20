<?php
require_once 'DBconnect.php';

if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $sql = "DELETE FROM add_books WHERE idNO='$id'";

    if (mysqli_query($db, $sql)) {
        header("Location:loadbookH.php");

    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($db);
    }
}

?>