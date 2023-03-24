<!-- ?php
/* EXERCISE 3-1A and 3-1B */

/* web page variable properties */
$lang = 'en-CA';
$title = 'ClassicModels.com - Home Page';
$description = 'Scale Models of Classic Cars, Trucks, Planes, Motorcyles and more';
$author = 'Stéphane Lapointe';
$content = 'bla bla bla bla bla this is the page content';
?> -->

<!-- WEB PAGE TEMPLATE BELOW ========================== -->
<!DOCTYPE html>
<html lang="XXXX">


<!-- 

/* EXERCISE 3-1B */
/* GLOBAL CONSTANTS */
const COMPANY_LOGO = 'web-site-icon.jpg';
const COMPANY_NAME = 'ClassicModels.com';
const COMPANY_STREET_ADDRESS = '5340 St-Laurent';
const COMPANY_CITY = 'Montréal';
const COMPANY_PROVINCE = 'QC';
const COMPANY_COUNTRY = 'Canada';
const COMPANY_POSTAL_CODE = 'J0P 1T0';
 -->

<?php
const COMPANY_LOGO = 'src/images/red_jersey.jpg';
const COMPANY_NAME = 'MaschesterUnitedCanada.com';
const COMPANY_STREET_ADDRESS = '5340 St-Laurent';
const COMPANY_CITY = 'Montréal';
const COMPANY_PROVINCE = 'QC';
const COMPANY_COUNTRY = 'Canada';
const COMPANY_POSTAL_CODE = 'J0P 1T0';
const COMPANY_EMAIL = 'contact@maschesterunited.ca';
const COMPANY_PHONE = '438-680-1291';
?>


<?php
$lang = 'en-CA';
$title = 'MaschesterUnitedCanada.com';
$description = 'Scale Models of Classic Cars, Trucks, Planes, Motorcyles and more';
$author = 'Alfredo Parreira';
?>


<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
    <meta name="description" content="<?= $description ?>">
    <meta name="author" content="<?= $author ?>">
    <link rel="shortcut icon" href="<?= COMPANY_LOGO ?>" type="image/x-icon">
    <link rel="stylesheet" href="style.css">

    <!--IMPORTANT for responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        table{
            margin: 20px;
        }

        table, td, th{
            border: 1px solid red;
            border-collapse: collapse;
            text-align: center;
        }

        td,th{
            padding: 10px;
        }

        .price::before { 
            content: '$';
        }
        header {
            background-color: black;
            color: white;
            padding: 10px;
            display: flex;
            align-items: center
        }

        header img {
            width: 48px;
            height: 48px;
            margin-right: 5px;
        }

        nav {
            background-color: grey;
            color: white;
            padding: 10px;
        }

        footer {
            background-color: black;
            color: white;
            padding: 10px
        }

        /* product div */
        .product {
            width: 200px;
            height: 320px;
            overflow: auto;
            border: 1px solid black;
            text-align: center;
            display: inline-block;
            margin: 10px;
        }

        .product:hover {
            background-color: #c0c0c0;
        }

        /* product image */
        .product img {
            width: 100%;
        }

        /* product name */
        .product .name {
            font-size: 24px;
            margin: 0;
        }

        /* product description */
        .product .description {
            margin: 0;
        }

        /* product price */
        .product .price {
            font-size: 24px;
            color: red;
            font-weight: bold;
            margin: 0;
        }
    </style>
</head>

<body>

    <!-- PAGE HEADER -->
    <header>
        <img src="<?= COMPANY_LOGO ?>" alt="">
        <h2>
            MaschesterUnitedCanada.com
        </h2>
    </header>

    <!-- NAVIGATION BAR-->
    <nav>
        <a href='ex3-1.php'>Product List</a>
        <a href='ex3-1.php'>Catalog</a>

    </nav>

    <!-- CONTENT -->
    <?php
    $products = [
        [
            'id' => 0,
            'name' => 'Red Jersey',
            'description' => 'Manchester United Home Jersey, red, sponsored by Chevrolet',
            'price' => 59.99,
            'pic' => 'src/images/red_jersey.jpg',
            'qty_in_stock' => 200,
        ],
        [
            'id' => 1,
            'name' => 'White Jersey',
            'description' => 'Manchester United Away Jersey, white, sponsored by Chevrolet',
            'price' => 49.99,
            'pic' => 'src/images/white_jersey.jpg',
            'qty_in_stock' => 133,
        ],
        [
            'id' => 2,
            'name' => 'Black Jersey',
            'description' => 'Manchester United Extra Jersey, black, sponsored by Chevrolet',
            'price' => 54.99,
            'pic' => 'src/images/black_jersey.jpg',
            'qty_in_stock' => 544,
        ],
        [
            'id' => 3,
            'name' => 'Blue Jacket',
            'description' => 'Blue Jacket for cold and raniy weather',
            'price' => 129.99,
            'pic' => 'src/images/blue_jacket.jpg',
            'qty_in_stock' => 14,
        ],
        [
            'id' => 4,
            'name' => 'Snapback Cap',
            'description' => 'Manchester United New Era Snapback Cap- Adult',
            'price' => 24.99,
            'pic' => 'src/images/cap.jpg',
            'qty_in_stock' => 655,
        ],
        [
            'id' => 5,
            'name' => 'Champion Flag',
            'description' => 'Manchester United Champions League Flag',
            'price' => 24.99,
            'pic' => 'src/images/champion_league_flag.jpg',
            'qty_in_stock' => 321,
        ],
    ];
    function tableList($products)
    {
        echo '<table>';
        echo '<tr><th>ID</th><th>Name</th><th>Price</th><th>Weight</th>';
        for ($i = 0; $i < count($products); $i++) {
            echo '<tr>';
            echo "<td>{$products[$i]['id']}</td>";
            echo "<td>{$products[$i]['name']}</td>";
            echo "<td>{$products[$i]['description']}</td>";
            echo "<td class='price'>{$products[$i]['price']}</td>";
            echo "<td>{$products[$i]['pic']}</td>";
            echo "<td>{$products[$i]['qty_in_stock']}</td>";
            echo '</tr>';
        }
        echo '</table>';
    }

    $content = tableList($products);
    ?>
    <?= $content ?>

    <!-- FOOTER -->
    <footer>
        Designed by <?= $author ?> &copy;<br>
        <?= COMPANY_NAME ?>
        <?php echo '<br>' . COMPANY_STREET_ADDRESS . ' ' . COMPANY_CITY . ' ' . COMPANY_PROVINCE  . ' ' . COMPANY_POSTAL_CODE . '<br>' . COMPANY_EMAIL . ' ' . COMPANY_PHONE ?>
    </footer>
    </div>
</body>

</html>