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

<?php 
    $lang = 'en-CA';
    $title = 'ClassicModels.com - Home Page';
    $description = 'Scale Models of Classic Cars, Trucks, Planes, Motorcyles and more';
    $author = 'Stéphane Lapointe';
    $content = 'bla bla bla bla bla this is the page content';
?>

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
 const COMPANY_LOGO = 'web-site-icon.jpg';
 const COMPANY_NAME = 'ClassicModels.com';
 const COMPANY_STREET_ADDRESS = '5340 St-Laurent';
 const COMPANY_CITY = 'Montréal';
 const COMPANY_PROVINCE = 'QC';
 const COMPANY_COUNTRY = 'Canada';
 const COMPANY_POSTAL_CODE = 'J0P 1T0';
 const COMPANY_EMAIL = 'contact@classicmodels.com';
 const COMPANY_PHONE = '438-680-1291';
?>



<head>
    <meta charset="UTF-8">
    <title><?=$title?></title>
    <meta name="description" content="<?=$description?>">
    <meta name="author" content="<?=$author?>">
    <link rel="shortcut icon" href="<?=COMPANY_LOGO?>" type="image/x-icon">

    <!--IMPORTANT for responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        header {
            background-color: black;
            color: white;
            padding: 10px;
            display: flex;
            align-items: center
        }

        header img{
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
    </style>
</head>

<body>

    <!-- PAGE HEADER -->
    <header>
        <img src="<?=COMPANY_LOGO?>" alt="">
        <h2>
            ClassicModels.com
        </h2>
    </header>

    <!-- NAVIGATION BAR-->
    <nav>
        <a href='ex3-1.php'>Home</a>
    </nav>

    <!-- CONTENT -->
    <?=$content?>

    <!-- FOOTER -->
    <footer>
        Designed by <?=$author?> &copy;<br>
        <?=COMPANY_NAME?>
        <?php echo '<br>' . COMPANY_STREET_ADDRESS . ' ' . COMPANY_CITY . ' ' . COMPANY_PROVINCE  . ' ' . COMPANY_POSTAL_CODE . '<br>' . COMPANY_EMAIL . ' ' . COMPANY_PHONE ?>
    </footer>
    </div>
</body>

</html>