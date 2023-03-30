<?php
    class WebPage{
        static public function render($pageData){
            if(!isset($pageData['title'])){
                $pageData['title'] = DEFAULT_PAGE_DATA['title'];
            }
            if(!isset($pageData['lang'])){
                $pageData['lang'] = DEFAULT_PAGE_DATA['lang'];
            }
            if(!isset($pageData['description'])){
                $pageData['description'] = DEFAULT_PAGE_DATA['description'];
            }
            if(!isset($pageData['author'])){
                $pageData['author'] = DEFAULT_PAGE_DATA['author'];
            }
            if(!isset($pageData['content'])){
                $pageData['content'] = "<b>ERROR! Page content not set!</b>";
            }

            require_once 'counter.php';
            require_once 'head.php';
            require_once 'header.php';
            Counter::CountPage();
            require_once 'nav.php';
            
            echo $pageData['content'];
            require_once 'footer.php';

        }
        

    }