<?php
    require_once 'Controller/Db_pdo.php';
    require_once 'Controller/globals.php';
    require_once 'Model/order.php';
    require_once 'View/webpage.php';
    require_once 'Model/user.php';

    session_start();

    // Setting User Language Preference
    //If the user's language is not supported it will display a form asking the user to select an supported language.

    $language = null;

    if(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'],0,2) == 'en' OR substr($_SERVER['HTTP_ACCEPT_LANGUAGE'],0,2) == 'fr' OR substr($_SERVER['HTTP_ACCEPT_LANGUAGE'],0,2) == 'pt')
    {
        $language = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'],0,2);

    }
    else 
    {
        $pageData['content'] = "<section class=''homeSection>
                    <h1>Bem Vindo à Classic Models</h1>
                    <br>
                    <span>
                        <form action='index.php?op=200' method='POST'>
                            <h3>Pleese Select an Supported Language</h3>
                            <div>
                                <input type='radio' id='en' name='language' value='en'>
                                <label for='en'>English</label>
                                <input type='radio' id='fr' name='language' value='fr'>
                                <label for='en'>French</label>
                                <input type='radio' id='pt' name='language' value='pt'>
                                <label for='en'>Portuguese</label>
                            </div>
                            <button type='submit'>Go</button>
                        </form>
                    </span>
                    </section>";

        if(isset($_REQUEST['language']))
        {
            $language = $_REQUEST['language'];

        }
    }

    // Setting Default TimeZone 
    date_default_timezone_set('America/Toronto');

    // Setting Home Page Operation
    if(!isset($_REQUEST['op']))
    {
        //Designated HomePage Operation
        $op = 200; 
    }
    else
    {
        $op = $_REQUEST['op'];
    }

    switch($op)
    {
        case 200:
            if($language == 'en')
            {
                $pageData['content'] = "<section class='homeSection'>
                    <h1>Welcome to Classic Models</h1>
                    <br>
                    <p>
                    Welcome to our classic miniature store! We offer a wide range of authentic and high-quality miniatures from around the world, including vintage American muscle cars, European sports cars, and Japanese classics. We also provide accessories and display cases to help you showcase your collection. Our exceptional customer service is second to none, and we are always happy to answer your questions and provide expert guidance. Thank you for considering our store for your classic miniature needs.
                    </p>
                </section>";
            }
            elseif($language == 'fr')
            {
                $pageData['content'] = "<section class='homeSection'>
                <h1>Bienvenue à Classic Models</h1>
                <br>
                <p>
                Bienvenue dans notre magasin de miniatures classiques ! Nous proposons une large gamme de miniatures authentiques et de haute qualité du monde entier, notamment des voitures musclées américaines vintage, des voitures de sport européennes et des classiques japonais. Nous fournissons également des accessoires et des vitrines pour vous aider à mettre en valeur votre collection. Notre service client exceptionnel est incomparable, et nous sommes toujours heureux de répondre à vos questions et de vous guider de manière experte. Merci d'avoir envisagé notre magasin pour vos besoins en miniatures classiques.
                </p>
            </section>";
            }
            elseif($language == 'pt')
            {
                $pageData['content'] = "<section class='homeSection'>
                <h1>Bem Vindo à Classic Models</h1>
                <br>
                <p>
                Bem-vindo à nossa loja de miniaturas clássicas! Oferecemos uma ampla gama de miniaturas autênticas e de alta qualidade de todo o mundo, incluindo carros musculares americanos vintage, carros esportivos europeus e clássicos japoneses. Também fornecemos acessórios e estojos de exibição para ajudá-lo a mostrar sua coleção. Nosso serviço ao cliente excepcional é incomparável e estamos sempre felizes em responder às suas perguntas e fornecer orientação especializada. Obrigado por considerar nossa loja para suas necessidades de miniaturas clássicas.
                </p>
            </section>";
            }
            WebPage::Render($pageData);
            break;
        case 201:
            $pageData['content'] = User::Login();
            WebPage::Render($pageData);
            break;    
        case 202:
            $pageData['content'] = User::VerifyLogin();
            WebPage::Render($pageData);
            break;    
        case 203:
            $pageData['content'] = User::Register();
            WebPage::Render($pageData);
            break;
        case 204:
            $pageData['content'] = User::VerifyRegister();
            WebPage::Render($pageData);
            break;
        case 205: 
            $pageData['content'] = User::Logout();
            WebPage::Render($pageData);
            break;
        case 206:
            //Orders
            if(isset($_SESSION['email'])){
                $pageData['content'] = Order::DisplayOrdersTable();
            }
            else{
                $pageData['content'] = "<p>You're not allowed to see this page</p>";
            }
            WebPage::Render($pageData);
            break;
        case 207:
            $id = htmlspecialchars($_REQUEST['idSearch']);
            $pageData['content'] = Order::DisplaySpecificOrder($id);
            WebPage::Render($pageData);
            break;
        case 208: 
            $pageData['content'] = Order::AddOrder();
            WebPage::Render($pageData);
            break;
        case 209:
            $pageData['content'] = Order::VerifyOrder();
            WebPage::Render($pageData);
            break;
        case 210:
            $pageData['content'] = Order::DisplayDetails();
            WebPage::Render($pageData);
            break;
        case 211:
            $pageData['content'] = Order::DeleteOrder();
            WebPage::Render($pageData);
            break;
        case 212:
            $pageData['content'] = Order::EditOrder();
            WebPage::Render($pageData);
            break;
        case 213:
            $pageData['content'] = Order::ListJson();
            WebPage::Render($pageData);
            break;
        default:
            header("HTTP/1.0 404 - Invalid Operation in file index.php");
            exit("Invalid Opperation leave!");
            break;
    }