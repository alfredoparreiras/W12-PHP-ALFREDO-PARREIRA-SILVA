<?php
    class Counter{
        
        public static function CountPage(){
            $visitors = date(DATE_RFC2822);
                    
            if(!file_exists('log/CountPage.txt')){
                $counter = DEFAULT_PAGE_DATA['countPage'];
                
            }else{
                $counter = file_get_contents('log/CountPage.txt');
            }
            $counter++;
            file_put_contents('log/Visitors.txt',$visitors . PHP_EOL, FILE_APPEND);
            file_put_contents('log/CountPage.txt', $counter);
        }

        public static function ReadPageCounter(){
            $counter = null;
            
            if(is_dir("log") && is_file('log/CountPage.txt')){
                $counter = file_get_contents('log/CountPage.txt');
            }
            else{
                echo "Your log folder wasn't found.";
            }
            return $counter;
        }
    }