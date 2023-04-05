<?php 
    require_once 'globals.php';
    require_once '../Model/products.php';
    require_once '../View/webpage.php';
    require_once 'counter.php';
    require_once '../Model/user.php';
    session_start();

    if(!isset($_REQUEST['op']))
    {
        $op = 0; //HomePage
    }
    else
    {
        $op=$_REQUEST['op'];
    }

    $lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
    
    date_default_timezone_set('America/Toronto');
    
    
    switch($op){
    
        case 0:
            if($lang == 'en'){
                if(!isset($_COOKIE['lastVisit'])){
                    $content = "It's your fist visit";
                }
                else
                {
                    $content = $_COOKIE['lastVisit'];
                }
                setcookie("lastVisit", Date("d-m-y h:i:s"),time() + (86400 * 30));
                $pageData['content'] = "<section class='homeSection'><h1 class='homeTitle'>WELCOME TO OUR STORE , Your last visit was {$content}</h1><br><p class='homeDescription'>Welcome to our online store, the ultimate destination for Manchester United fans! We are an e-commerce platform that offers a wide range of high-quality Manchester United products for men, women, and children. Our collection includes trendy, fashionable, and classic designs, catering to every taste and preference.
    
                Our Manchester United products are made from premium quality materials t≈hat ensure maximum comfort, durability, and style. We believe in providing our customers with the best possible shopping experience, which is why we offer a user-friendly interface, easy navigation, and a secure payment gateway.
                
                We also take pride in our fast and reliable shipping services, ensuring that you receive your favorite Manchester United products in the shortest possible time. Whether you're looking for a Manchester United jersey for game day or a statement piece for your collection, we have got you covered.
                
                At our store, we value our customers and their satisfaction, and we strive to provide them with exceptional service and quality products. So, come and explore our extensive collection of Manchester United products and show your support for one of the greatest football clubs in the world!</p></section>";


            }
            else
            {

                $pageData['content'] = "<section class='homeSection'><h1 class='homeTitle'>Bienvenue dans notre magasin, , Your last visit was {$content}</h1><br><p class='homeDescription'>Bienvenue sur notre boutique en ligne, la destination ultime pour les fans de Manchester United ! Nous sommes une plateforme de commerce électronique qui propose une large gamme de produits Manchester United de haute qualité pour hommes, femmes et enfants. Notre collection comprend des designs à la mode, à la mode et classiques, répondant à tous les goûts et préférences.
    
                Nos produits Manchester United sont fabriqués à partir de matériaux de première qualité qui garantissent un maximum de confort, de durabilité et de style. Nous croyons qu'il est important d'offrir à nos clients la meilleure expérience d'achat possible, c'est pourquoi nous offrons une interface conviviale, une navigation facile et une passerelle de paiement sécurisée.
                
                Nous sommes également fiers de nos services d'expédition rapides et fiables, garantissant que vous recevez vos produits Manchester United préférés dans les plus brefs délais. Que vous recherchiez un maillot Manchester United pour le jour du match ou une pièce phare pour votre collection, nous avons ce qu'il vous faut.
                
                Dans notre magasin, nous apprécions nos clients et leur satisfaction, et nous nous efforçons de leur fournir un service exceptionnel et des produits de qualité. Alors, venez découvrir notre vaste collection de produits Manchester United et montrez votre soutien à l'un des plus grands clubs de football du monde !</p></section>";

            }
            WebPage::render($pageData);
            break;
        case 1:
            //Display Login Form
            $pageData['title'] = COMPANY_NAME.' - Login Page';
            $pageData['content'] = User::Login();
            WebPage::render($pageData);
            break;
        case 2:
            //Validate Login
            $pageData['content'] = User::Validate();
            WebPage::render($pageData);
            break;
        case 4:
            $pageData['content'] = User::Register(); 
            $pageData['title'] = COMPANY_NAME.' - Form Registration';
            WebPage::render($pageData);
            break;
        case 5:
            $pageData['content'] = User::VerifyRegister();
            $pageData['title'] = COMPANY_NAME.' - Form Registration';
            WebPage::render($pageData);
            break;
        case 6: 
            $pageData['content'] = User::Logout(); 
            WebPage::render($pageData);
            break;
        case 100:
            $pageData['content'] = Product::productCatalog();
            $pageData['title'] = COMPANY_NAME.' - Product Catalog';
            WebPage::render($pageData);
            break;
        case 101:
            $pageData['content'] = Product::productTable();
            $pageData['title'] = COMPANY_NAME.' - Product Table';
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
        case 104:
            $data = Counter::displayVisitors();
            $pageData['title'] = COMPANY_NAME.' - Visitors Log';
            $pageData['content'] = "<h1>Visitors</h1><div class='displayVisitors'><p>{$data}</p></div>";
            WebPage::render($pageData); 
            break;
        default:
            header("HTTP/1.0 404 - Invalid Operation in file index.php");
            exit("Invalid Opperation leave!");
            break;
    }

