<nav class="navMenu">
        <a href='index.php'>Home</a>
        <?php if(!isset($_SESSION['email'])){
                echo "<a href='index.php?op=1'>Login</a>";
        }
        ?>
        <a href='index.php?op=4'>Register</a>
        <a href='index.php?op=100'>Product List</a>
        <a href='index.php?op=101'>Product Catalog</a>
        <a href='index.php?op=102'>Download PDF</a>
        <a href='index.php?op=103'>Redirect To Nike</a>
        <a href='index.php?op=104'>Display Visitors</a>
        <a>
                <?php
                if(isset($_SESSION['email'])){
                        echo $_SESSION['email'];
                        echo "<a href='index.php?op=6'>Logout</a>";
                }
                ?>
        </a>
</nav>