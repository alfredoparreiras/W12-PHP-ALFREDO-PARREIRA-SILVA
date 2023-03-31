<?php 
    require_once 'globals.php';
    require_once 'products.php';
    require_once 'webpage.php';
    require_once 'counter.php';

    if(!isset($_REQUEST['op']))
    {
        $op = 0; //HomePage
    }
    else
    {
        $op=$_REQUEST['op'];
    }

    switch($op){
        case 0:
            $pageData['content'] = "<section class='homeSection'><h1 class='homeTitle'>WELCOME TO OUR STORE</h1><br><p class='homeDescription'>Welcome to our online store, the ultimate destination for Manchester United fans! We are an e-commerce platform that offers a wide range of high-quality Manchester United products for men, women, and children. Our collection includes trendy, fashionable, and classic designs, catering to every taste and preference.

            Our Manchester United products are made from premium quality materials t≈hat ensure maximum comfort, durability, and style. We believe in providing our customers with the best possible shopping experience, which is why we offer a user-friendly interface, easy navigation, and a secure payment gateway.
            
            We also take pride in our fast and reliable shipping services, ensuring that you receive your favorite Manchester United products in the shortest possible time. Whether you're looking for a Manchester United jersey for game day or a statement piece for your collection, we have got you covered.
            
            At our store, we value our customers and their satisfaction, and we strive to provide them with exceptional service and quality products. So, come and explore our extensive collection of Manchester United products and show your support for one of the greatest football clubs in the world!</p></section>";
            WebPage::render($pageData);
            break;
        case 100:
            $pageData['content'] = Product::productCatalog();
            WebPage::render($pageData);
            break;
        case 101:
            $pageData['content'] = Product::productTable();
            WebPage::render($pageData); 
            break;
        case 102:
            header('Content-type: application/pdf');
            header('Content-disposition: attachment; filename=some_file.pdf ');
            readfile('some_file.pdf');
            break;
        case 103:
            header('location: http://www.nike.ca');
            break;
        default:
            header("HTTP/1.0 404 - Invalid Operation in file index.php");
            exit("Invalid Opperation leave!");
            break;
    }

