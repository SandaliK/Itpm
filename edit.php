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



    $sql = "UPDATE add_books SET booksname  = '$book_name', booksauthorname = '$book_a', 
bookspublicationname = '$pun_n', booksprice= '$pri',booksqty = '$qty' WHERE idNO ='$id'";

    if($db->query($sql)){
        header("Location:loadbookH.php");
        echo "New record inserted successfully";

    }else{
        echo "Error:". $db->error;
    }


}else {
    echo "All field are required";

}

//$conn->close();

?>