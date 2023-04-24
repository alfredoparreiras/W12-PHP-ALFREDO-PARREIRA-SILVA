<?php
    class WebPage{
        static public function Render($pageData){
            
            if(!isset($pageData['title']))
            {
                $pageData['title'] = DEFAULT_PAGE_DATA['title'];
            }
            if(!isset($pageData['lang']))
            {
                $pageData['lang'] = DEFAULT_PAGE_DATA['lang'];
            }
            if(!isset($pageData['description']))
            {
                $pageData['description'] = DEFAULT_PAGE_DATA['description'];
            }
            if(!isset($pageData['author']))
            {
                $pageData['author'] = DEFAULT_PAGE_DATA['author'];
            }
            if(!isset($pageData['content']))
            {
                header('HTTP/1.0 501 Content was not defined!');
                exit('Content was not defined!');

            }

            require_once 'head.php';
            require_once 'header.php';
            require_once 'nav.php';
            echo $pageData['content'];
            require_once 'footer.php';
        }


    }