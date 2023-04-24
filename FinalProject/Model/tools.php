<?php
    class Tools{
        static public function RequiredVerifyLength($field, $maxLength)
        {
            //TODO: Maybe can't work because we need to pass this value as a String
            if(isset($_REQUEST[$field])){
                $value = htmlspecialchars($_REQUEST[$field]);
            }
            else
            {
                header("HTTP/1.0 400 Your {$field} must be valid.");
            }

            if(strlen($value) > $maxLength){
                header("HTTP/1.0 411 Your {$value} must have less than {$maxLength}");
            }

            return $value;
        }

        static public function VerifyLength($field, $maxLength)
        {
            $value = null;
            
            if(strlen($field) < $maxLength)
            {
                $value = htmlspecialchars($_REQUEST[$field]);
            }
            else 
            {
                header("HTTP/1.0 411 Your {$field} must have less than {$maxLength}");
            }
            
            return $value;
        }
    }