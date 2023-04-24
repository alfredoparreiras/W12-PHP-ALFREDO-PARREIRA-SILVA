<nav class="navMenu">
    <ul class="navList">
        <li class="navItem"><a href="index.php?op=200">Home</a></li>
        <li class="navItem"><a href="index.php?op=206">Orders</a></li>
        <li class="navItem"><a href="index.php?op=203">Register</a></li>
        <li class="navItem"><a href="index.php?op=213">JSON</a></li>
        <li class="navItem lastItem">
            <?php 
                if(!isset($_SESSION['email']))
                {
                    echo "<a href='index.php?op=201'>Login</a>";
                }
                else 
                {
                    echo "<a href='index.php?op=205'>Logout</a><span class='Nav__loggedEmail'>Your're logged at : {$_SESSION['email']}</span>";
                }

            ?>
        </li>
    </ul>
</nav>