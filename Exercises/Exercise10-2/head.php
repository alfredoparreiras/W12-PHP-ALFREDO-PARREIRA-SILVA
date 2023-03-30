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
