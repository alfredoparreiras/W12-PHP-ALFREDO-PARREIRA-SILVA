<?php 
    class User{

        

        public static function Login(){

            if(!isset($_SESSION['loginCounter'])){
                $_SESSION['loginCounter'] = 0;
            }
            
            $_SESSION['loginCounter']++;
            $content =   "<h1>Login</h1>"
                        ."<form action='index.php?op=2' method='POST' class='login'>" 
                        . "<input type='email' name='email' id='emailForm' placeholder='Email' maxlength='126' required>" 
                        . "<input type='password' name='password' id='passwordForm' placeholder='Password' maxlength='8' rere>" 
                        . "<button type='submit' class='form__button'>Login</button>" 
                        . "</form>";
            return $content;
        }

        public static function Validate(){
            //Array of User to Test.
            $DB = new Db_PDO;
            $DB->Connect();

            $Users = $DB->QuerySelect("SELECT * FROM `users`");

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
                Counter::CountLoggedPage();
                $_SESSION['email'] = $email;
            }
            if($isAuthenticated == false && $_SESSION['loginCounter'] <= 3){
                $content .= "<h1>Try Again</h1><br><h2>The data provided is not valid</h2>";
                $content .= $errorMessage;  
                $content .= self::Login();
            }
            if($_SESSION['loginCounter'] > 3)
            {
                $content .= "<h1>BLOCKED!</h1><br><h2>You enter wrong data for 3 times, now you need to wait for 24min</h2>";
                $content .= $errorMessage;
            }

            return $content;
        }

        public static function Register(){
            //Provinces Data
            $provinces = [
                ['id' => 0, 'code' => 'QC', 'name' => 'Québec'],
                ['id' => 1, 'code' => 'ON', 'name' => 'Ontario'],
                ['id' => 2, 'code' => 'NB', 'name' => 'New-Brunswick'],
                ['id' => 4, 'code' => 'NS', 'name' => 'Nova-Scotia'],
                ['id' => 5, 'code' => 'MN', 'name' => 'Manitoba'],
                ['id' => 6, 'code' => 'SK', 'name' => 'Saskatchewan'],
            ];

            $province = null; 
            //Loop do create Provinces Field. 
            foreach($provinces as $data){
                $province .= "<option class='optionForm' id='{$data['id']}'value='{$data['code']}'>{$data['name']}</option>";
            }

            


            $content = " <form action='index.php?op=5' method='POST' class='registerForm'> 
                            <fieldset class='personalDataField'>
                                <legend>Personal Data</legend>
                                <input type='text' name='fullName' maxlenght='50' placeholder='Fullname' class='fullnameForm' required >
                                <input type='text' name='address1' maxlenght='127' placeholder='Address 1' >
                                <input type='text' name='address2' maxlenght='127' placeholder='Address 2' >
                                <input type='text' name='city' maxlength='50' placeholder='City'>
                                <select name='province' id='provinceSelect'>
                                    {$province}
                                </select>
                                <input type='text' name='postalCode' maxlength='7' placeholder='Postal Code'>
                            </fieldset>
                            <fieldset class='preferencesFieldset'>
                                <legend>Preferences</legend>
                                <div class='radioSection'>
                                    <div class='radioItem'>
                                        <input type='radio' id='fr' name='language' value='fr'>
                                        <label for=''>Francês</label>
                                    </div>
                                    <div class='radioItem'>
                                        <input type='radio' id='en' name='language' value='en'>
                                        <label for=''>English</label>
                                    </div>
                                    <div class='radioItem'>
                                        <input type='radio' id='pt' name='language' value='pt'>
                                        <label for=''>Português</label>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset>
                                <legend>Login</legend>
                                <input type='email' name='email' placeholder='Email' maxlength='126' required>
                                <input type='password' name='pw' placeholder='Password' maxlength='8' placeholder='Must be 8 Chars' required>
                                <input type='password' name='pw2' placeholder='Repeat Password' maxlength='8' required>
                            </fieldset>
                            <div class='spanSection'>
                                <input type='checkbox' name='spamOk' value='1' id='spamCheckInput' checked>
                                <label for='spamCheckInput'>Do you agree in receive our communication</label>
                            </div>
                            <div>
                                <button type='submit' class='form__button'>Submit</button>
                                <button type='button' onclick='history.back();'>Back</button>
                            </div>
                        </form>";

                        return $content;
        }

        public static function VerifyRegister(){
            $usersRegistered = [
                ['id' => 0, 'email' => 'abc@test.com', 'pw' => '12345678'],
                ['id' => 1, 'email' => 'def@test.com', 'pw' => '12345678'],
                ['id' => 2, 'email' => 'abc@gmail.com', 'pw' => '11111111'],
            ];
            //Receiving data from server
            $errorMessage = null;

            //Variables
            $fullName = null; 
            $address1 = null;
            $address2 = null; 
            $city = null;
            $postalCode = null;
            $email = null;
            $pw = null;
            $pw2 = null; 


            // Names to check fullname, address1, address2,city, postalCode, email, pw, pw2
            //Verifying Full Name 
            if(isset($_REQUEST['fullName']) && strlen($_REQUEST['fullName']) <= 50 ){
                $fullName = htmlspecialchars($_REQUEST['fullName']);
            }
            else
            {
                header('HTTP/1.0 404 - Error in your name, please insert a valid name. Must be equal or less than 50 characters');
                exit('Error in your name, please insert a valid email');
            }

            //Verifying Addresses
            if($_REQUEST['address1'] < 127 && $_REQUEST['address2'] < 127)
            {
                $address1 = $_REQUEST['address1'];
                $address2 = $_REQUEST['address2'];
            }
            else
            {
                $errorMessage = 'The maximum length of the address are 127 Characters, please type a smaller address.';
            }

            //Verifying City
            if($_REQUEST['city'] < 50)
            {
                $city = $_REQUEST['address1'];
            }
            else
            {
                $errorMessage .= 'The maximum length of the city is 50 Characters, please type a smaller city name.';
            }
            
            //Verifying PostalCode
            if($_REQUEST['postalCode'] < 7)
            {
                $postalCode = $_REQUEST['postalCode'];
            }
            else
            {
                $errorMessage .= 'The maximum length of the Postal Code is 7 Characters, please type a correct Postal Code.';
            }

            //Verifying Email 
            

            if(isset($_REQUEST['email'])){
                $email = htmlspecialchars($_REQUEST['email']);
            }
            else
            {
                header('HTTP/1.0 404 - You set an Incorrect Email, please provide a correct email.');
                exit('You set an Incorrect Email, please provide a correct email.');
            }

            $existentEmail = false; 

            foreach($usersRegistered as $user){
                if($user['email'] == $email){
                    $existentEmail = true;
                }
            }

            if($existentEmail){
                header('HTTP/1.0 404 - You set an Pre-Existent Email, please provide a different email.');
                exit('You set an Pre-Existent Email, please provide a different email.');
            }
    

            if(!filter_var($_REQUEST['email'],FILTER_VALIDATE_EMAIL)){
                $errorMessage .= " You need to provide a correct email type.";
            }
            else if(strlen($email) > 126){
                $errorMessage .= "Your email must contain 127 characters";
            }



            //Verifying Password
            if(isset($_REQUEST['pw']) && isset($_REQUEST['pw2'])){
                $pw = $_REQUEST['pw'];
                $pw2 = $_REQUEST['pw2'];
            }
            else
            {
                header('HTTP/1.0 404 - You need to set a password and repeat it');
                exit('You need to set a password and repeat it');
            }

            if($pw != $pw2){
            
                $errorMessage .= "Your passwords must be equals";
            }

            //Verifying Province 
            $province = $_REQUEST['province'];
            $preferedLanguage = $_REQUEST['language'];
            
            //Verifying Spam
            if(isset($_REQUEST['spamOk']))
            {
                $spam = true;
            }
            else
            {
                $spam = false;
            }

            //NOTES: Need to create a variable to verify if all data is good and this way return the data or ask for changes. 

            return "You're registered " . $fullName . $email . $address1 . $address2 . $city . $pw . $pw2 . $province . $preferedLanguage . json_encode($spam);

        }

        public static function Logout(){
            $_SESSION['email'] = null;
            return "You're Loggout";
        }
    }