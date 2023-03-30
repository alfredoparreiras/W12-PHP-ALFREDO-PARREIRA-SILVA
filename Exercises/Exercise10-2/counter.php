<?php
    class Counter{
        
        
        public static function CountPage(){
            
            session_start();

            if(is_dir("log")){
                if(isset($_SESSION['views'])){
                    $_SESSION['views'] = $_SESSION['views']+1;
                }
                else{
                    $_SESSION['views'] = 1;
                }

                file_put_contents('log/CountPage.log',$_SESSION['views']);
            }
            else{
                echo "Your log folder wasn't found.";
            }
        }

        public static function ReadPageCounter(){
            $counter = null;
            
            if(is_dir("log")){
                $counter = file_get_contents('log/CountPage.log');
            }
            else{
                echo "Your log folder wasn't found.";
            }
            return $counter;
        }
    }