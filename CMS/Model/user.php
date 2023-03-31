<?php 
    class User{


        public static function Login(){
        
            $content =   "<h1>Login</h1>"
                        ."<form action='index.php?op=2' method='POST' class='login' required>" 
                        . "<input type='email' name='email' id='emailForm' placeholder='Email' maxlength='126' required>" 
                        . "<input type='password' name='password' id='passwordForm' placeholder='Password' maxlength='8'>" 
                        . "<button type='submit' class='form__button'>Login</button>" 
                        . "</form>";
            return $content;
        }

        public static function Validate(){
            //Array of User to Test.
            $Users = [
                ['id' => 0, 'email' => 'Yannick@gmail.com', 'pw' => '12345678'],
                ['id' => 1, 'email' => 'Victor@test.com', 'pw' => '11111111'],
                ['id' => 2, 'email' => 'Christian@victoire.ca', 'pw' => '22222222'],
            ];

            //Receiving Data from the server (POST)
            //NOTES:If you want to specify, we can use $_GET or $_POST'
            //NOTES: We need to use HTMLSPECIALCHARS with all texts inputs.
            $errorMessage = '';

            if(isset($_REQUEST['email'])){
                $email = htmlspecialchars($_REQUEST['email']); 
            }
            else{
                header("HTTP/1.0 404 - Error in your Email, please insert a valid value.");
                exit("Error in your Email, please insert a valid value!");
            }

            if(strlen($email) < 126){
                $email = htmlspecialchars($email);
            }
            else {
                header("HTTP/1.0 404 - Error in your Email, please insert a value below 126 characters.");
                exit("Error in your Email, please insert a valid value!");
            }

            if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                $errorMessage = 'Your email is invalid.<br>';
            }
            
            if(isset($_REQUEST['password'])){
                $password = $_REQUEST['password'];
            }
            else
            {
                header("HTTP/1.0 404 - Error in your Password, please insert a value below 126 characters.");
                exit("Error in your Password, please insert a valid value!");
            }

            if(strlen($password) <= 2){
                $errorMessage .= 'Your password need to be greater than 2 characters';
            }


            // Variable to set if the user is authenticated or not.
            $isAuthenticated = false; 

            //Verify if there is a user with these login data.
            foreach($Users as $user){
                if($user['email'] == $email && $user['pw'] == $password){
                    $isAuthenticated = true;
                    break;
                }
            }
            
            //Content to display as a return of this function.
            $content = null;

            if($isAuthenticated == true){
                $content = "something";
            }
            else{
                $content .= "<h1>Try Again</h1><br><h2>The data provided is not valid</h2>";
                $content .= $errorMessage;
                $content .= self::Login();
            }

            return $content;
        }
    }