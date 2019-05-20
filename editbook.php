<!DOCTYPE html>
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
        li a{
            color: white;
            text-decoration: none;
            font-family: "Times New Roman";
            font-weight: bold;
            font-size: 20px;
        }
    </style>
    <link rel = "stylesheet" href="addbooks.css" type="text/css">
    <title>Edit Book Form</title>
</head>
<body style="background-color:#99ff99;">
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
<form action="edit.php" method="post" name="form1" >

    <h1>
        Edit Books form
    </h1>

    <table width="450px">
        </tr>
        <tr>
            <td>
                <label>Book ID</label>
            </td>
            <td>
                <input type="text"Bid="Book ID" maxlength="50" size="30" name="bid">
            </td>
        </tr>


        <tr>

            <td>
                <label> Book Title</label>
            </td>
            <td>
                <input type="text" tit="Title" maxlength="50" size="30" name="title" required>
            </td>
        </tr>

        <tr>
            <td>
                <label>Author Name</label>
            </td>
            <td>
                <input type="text"aut="Author Name" maxlength="50" size="30" name="author"required>
            </td>
        </tr>





        <tr>
            <td>
                <label>Book publication</label>
            </td>
            <td>
                <input type="text"Bp="Book_Publication" maxlength="50" size="30" name="book_publish" required>
            </td>
        </tr>

        <tr>
            <td>
                <label>Book Price</label>
            </td>
            <td>
                <input type="number"Bpr="Book_Price" maxlength="50" size="30" name="book_price" required>
            </td>
        </tr>

        <tr>
            <td>
                <label>Books Quantity</label>
            </td>
            <td>
                <input type="number"Bq="Book_Quantity" maxlength="50" size="30" name="book_qty" required>
            </td>
        </tr>



    </table>
    <form>
        <input type="submit" value="Update" id="button"  />
    </form>




</form>
</section>
</body>
</html>