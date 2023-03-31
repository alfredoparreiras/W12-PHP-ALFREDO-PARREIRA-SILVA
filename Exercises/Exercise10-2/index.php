<?php 
    require_once 'globals.php';
    require_once 'products.php';
    require_once 'webpage.php';
    require_once 'counter.php';

    $pageData['content'] = Product::productList();

    WebPage::render($pageData);