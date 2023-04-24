<?php
    require_once 'tools.php';

    class User{

        static public function Login()
        {
            $content = "<section class='loginForm'>
                <h1>Login</h1>
                <form action='index.php?op=202' method='POST'>
                    <fieldset>
                        <input type='email' name='email' placeholder='Email' maxlength='126' required>
                        <input type='password' name='password' placeholder='Password' maxlength='8' required>
                        <button type='submit'>Login</button>
                        <button type='reset'>Clear</button>
                    </fieldset>
                </form>
            </section>";

            return $content;
        }

        static public function Logout(){
            unset($_SESSION['email']);
            return "You're logged out.";
        }

        static public function VerifyLogin()
        {
            // Testing Array 
        

            $DB = new Db_PDO;
            $DB->Connect();
            $query = "SELECT * FROM users";
            //Getting DB Users
            $Users = $DB->QuerySelect($query);
            
        

            //Login Variables
            $email = Tools::RequiredVerifyLength('email',126);
            $password = Tools::RequiredVerifyLength('password',8);
            if(!isset($_SESSION['loginCounter'])){
                
                $_SESSION['loginCounter'] = 0;
            }

            echo $_SESSION['loginCounter'];

            //Authenticator 
            $isAuthenticated = false; 

            //Error Message Variable
            $errorMessage = null;

            //Content return
            $content = null;

            //Checking Email Format
            if(!filter_var($email,FILTER_VALIDATE_EMAIL))
            {
                $errorMessage = "Your email is invalid, please type a valid type.";
            }

            // Checking each email and password to look for a match.
            foreach($Users as $user)
            {
                if($user['email'] == $email && password_verify($password,$user['pw']))
                {
                    $isAuthenticated = true; 
                    break;
                }
            }

            if($isAuthenticated)
            {
                $content = "Your're logged!";
                $_SESSION['email'] = $email;
                $_SESSION['loginCounter'] = 0;
            }
            elseif(!$isAuthenticated && $_SESSION['loginCounter'] < 3) 
            {
                $content = "Your data is invalid, please try again. <br>";
                $content .= self::Login();
                echo $user['password'];
            }
            else 
            {
                $content = "You tried more than 3 times and your access is BLOCKED";
                $content .= "<br><button type='button' onclick='history.back();'>Back</button>";
            }

            $_SESSION['loginCounter']++;
            return $content;
        }

        static public function Register()
        {
            $provinces = [
                ['id' => 0, 'code' => 'QC', 'name' => 'Québec'],
                ['id' => 1, 'code' => 'ON', 'name' => 'Ontario'],
                ['id' => 2, 'code' => 'NB', 'name' => 'New-Brunswick'],
                ['id' => 4, 'code' => 'NS', 'name' => 'Nova-Scotia'],
                ['id' => 5, 'code' => 'MN', 'name' => 'Manitoba'],
                ['id' => 6, 'code' => 'SK', 'name' => 'Saskatchewan'],
            ];

            //Generating Province Options List
            $province = null;
            foreach($provinces as $data){
                $province .= "<option class='optionForm' id='{$data['id']}'value='{$data['code']}'>{$data['name']}</option>";
            }

            //TODO: Fix select input size.

            //Creating and Appending Content
            $content = "<section class='form'>
                            <button type='button' onclick='history.back();' class='btn'>Back</button>
                            <h3>Register</h3>
                            <form action='index.php?op=204' method='POST' class='registerForm'> 
                            <fieldset class='personalDataField'>
                                <legend>Personal Data</legend>
                                <div class='inputDivisor'>
                                    <input type='text' name='fullName' maxlenght='50' placeholder='Fullname' class='input__text input__fullname' required >
                                </div>
                                <input type='text' name='address1' maxlenght='127' placeholder='Address 1' class='input__text'>
                                <input type='text' name='address2' maxlenght='127' placeholder='Address 2' class='input__text'>
                                <input type='text' name='city' maxlength='50' placeholder='City'class='input__text'>
                                <div id='inputDivisor'>
                                    <select name='province'>
                                        {$province}
                                    </select>
                                <input type='text' name='postalCode' maxlength='7' placeholder='Postal Code'class='input__text'>
                                <input type='text' name='country' maxlength='2' placeholder='Country'class='input__text'>

                                </div>
                            </fieldset>
                            <fieldset class='preferencesFieldset'>
                                <legend>Preferred Language</legend>
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
                            <fieldset class='loginFieldset'>
                                <legend>Login</legend>
                                <input type='email' name='email' placeholder='Email' maxlength='126' required class='input__text input__login'>
                                <input type='password' name='pw' placeholder='Password' maxlength='8' placeholder='Must be 8 Chars' required class='input__text input__login'>
                                <input type='password' name='pw2' placeholder='Repeat Password' maxlength='8' required class='input__text input__login'>
                            </fieldset>
                            <div class='spanSection'>
                                <input type='checkbox' name='spamOk' value='1' id='spamCheckInput' checked>
                                <label for='spamCheckInput'>Do you agree in receive our communication</label>
                            </div>
                            <div>
                                <button type='submit' class='btn'>Submit</button>
                                <button type='reset' class='btn'>Clear</button>
                            </div>
                        </form>
                    </section>";

            return $content;
        }

        static public function VerifyRegister()
        {
            //Variables to check Length
            $fullName = Tools::RequiredVerifyLength('fullName',50);
            $address1 = Tools::VerifyLength('address1',127);
            $address2 = Tools::VerifyLength('address2',127);
            $city = Tools::VerifyLength('city',50);
            //TODO: Check why my PostalCode is null.
            $postalCode = Tools::VerifyLength('postalCode',7);
            $country = Tools::VerifyLength('country',50);
            $email = Tools::RequiredVerifyLength('email',126);
            $password = Tools::RequiredVerifyLength('pw',8);
            $password2 = Tools::RequiredVerifyLength('pw2',8);


            //Variables Without length
            $spam = null;

            if(isset($_REQUEST['province']))
            {
                $province = $_REQUEST['province'];
            }
            else 
            {
                $province = null;
            }

            if(isset($_REQUEST['language']))
            {
                $language = $_REQUEST['language'];
            }
            else 
            {
                header("HTTP/1.0 400 You must select an Language.");

            }

            //Variable to Validate
            $isValid = true; 

            //Content and Error Variables
            $errorMessage = null; 
            $content = null;

            //Validating Email Format 
            if(!filter_var($email,FILTER_VALIDATE_EMAIL))
            {
                $errorMessage = "Your email is invalid, please type a valid type.";
                $isValid = false;
            }

            //Validating Spam Input
            if(isset($_REQUEST['spamOk']))
            {
                $spam = 1;
            }
            else 
            {
                $spam = 0;
            }
            
            //Validating Passwords
            if($password != $password2)
            {
                $errorMessage .= "Your passwords must be equals.";
                $isValid = false;
            }

            //Creating Connection with DB
            $DB = new Db_PDO;
            $DB->Connect();
            
            //Adding User to DB
            if($isValid){

                $query = "INSERT INTO `users`(`email`, `pw`, `level`, `fullname`, `addressLine1`, `addressLine2`, `city`, `province`, `country`, `postal_code`, `language`, `spam_ok`) VALUES (:email,:password, :level,:fullName,:address1,:address2,:city,:province,:country,:postalCode,:language,:spam)";
                $params = [
                    "email" => $email,
                    "password" => password_hash($password, PASSWORD_DEFAULT),
                    "level" => "client",
                    "fullName" => $fullName,
                    "address1" => $address1,
                    "address2" => $address2,
                    "city" => $city,
                    "province" => $province,
                    "country" => $country,
                    "postalCode" => $postalCode,
                    "language" => $language,
                    "spam" => $spam
                ];

                $DB->QuerySelectParam($query,$params);

                //How to check if this statement return a value.
                $content = "<p>Hello {$fullName}, your account was sucessfully created.</p>";
            }

            return $content;
        }
    }