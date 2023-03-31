<?php
    class Counter{
        
        public static function CountPage(){
            $visitors = date(DATE_RFC2822);
                    
            if(!file_exists('../log/CountPage.txt')){
                $counter = DEFAULT_PAGE_DATA['count'];
                
            }else{
                $counter = file_get_contents('../log/CountPage.txt');
            }

            $counter += 1;
            file_put_contents('../log/Visitors.txt', 'Visit at : ' . $visitors . PHP_EOL, FILE_APPEND);
            file_put_contents('../log/CountPage.txt', $counter);
        }

        public static function ReadPageCounter(){
            $counter = null;
            
            if(is_dir("../log") && is_file('../log/CountPage.txt')){
                $counter = file_get_contents('../log/CountPage.txt');
            }
            else{
                echo "Your log folder wasn't found.";
            }
            return $counter;
        }

        public static function displayVisitors(){
            $visitors = file_get_contents('../log/Visitors.txt');
            $visitors = str_replace('+0000','<br>',$visitors);
            return $visitors;
        }
    }