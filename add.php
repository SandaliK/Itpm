<?php
require_once 'DBconnect.php';

if (isset($_POST) & !empty($_POST)){

    $id = $_POST['bid'];
    $book_name = $_POST['title'];
    $book_a = $_POST['author'];
    $pun_n = $_POST['book_publish'];
    $pri = $_POST['book_price'];
    $qty = $_POST['book_qty'];


//if(!empty($book_name) || !empty($book_a) || !empty($pun_n) || !empty($P_date) || !empty($pri) || !empty($qty)){



    $sql = "INSERT INTO `add_books`( `booksname`, `booksauthorname`,`bookspublicationname`, `booksprice`, `booksqty`) 
VALUES ('$book_name','$book_a','$pun_n','$pri','$qty')";

    if($db->query($sql)){
        header("Location:loadbookH.php");

    }else{
        echo "Error:". $db->error;
    }


}else {
    echo "All field are required";

}

//$conn->close();

?>