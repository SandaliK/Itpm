<header>
    <nav>
        <ul>
            <li><a class="<?php if($menu_name == 'home') echo 'active' ?>" href="HomePage.html">Home</a></li>
            <li><a class="<?php if($menu_name == 'books') echo 'active' ?>" href="loadbookH.php">Books</a></li>
            <li><a class="<?php if($menu_name == 'member') echo 'active' ?>" href="MemberLogin.php">Member</a></li>
            <li><a class="<?php if($menu_name == 'profile') echo 'active' ?>" href="Profile.php">Profile</a></li>
            <li><a class="<?php if($menu_name == 'search') echo 'active' ?>" href="index.php">Search</a></li>
            <li ><a class="<?php if($menu_name == 'borrowed_books') echo 'active' ?>" href="borrowed_books.php">Borrowed Books</a></li>
            <li ><a class="<?php if($menu_name == 'returned_books') echo 'active' ?>" href="returned_books.php">Returned Books</a></li>
            <li><a class="<?php if($menu_name == 'reports') echo 'active' ?>" href="report.php">Report</a></li>
        </ul>
    </nav>

</header>