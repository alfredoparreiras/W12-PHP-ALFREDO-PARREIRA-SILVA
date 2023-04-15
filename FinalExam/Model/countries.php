a<?php

    class Country
    {
        public static function list()
        {
            $DB = new Db_PDO;
            $DB->Connect();

            //Getting Country DB
            $Countries = $DB->QuerySelect("SELECT * FROM `countries`");

            $content = null;
            $countriesList = null;
            
            foreach($Countries as $country){
                
                $countriesList .= "<tr>
                                        <td>{$country['id']}</td>
                                        <td>{$country['name']}</td>
                                        <td>{$country['code']}</td>
                                        <td>
                                            <a href='index.php?op=902&id={$country['id']}'>Details</a>
                                            <span>|</span>
                                            <a href='index.php?op=904&id={$country['id']}'>Delete</a>
                                        </td>
                                    </tr>";

    
            }
            $content = "<table>
                            <tr><th>ID</th><th>Name</th><th>Code</th><th>Actions</th>
                            {$countriesList}
                        </table>";
                        

            return $content;
        }

        public static function delete()
        {
            $DB = new Db_PDO;
            $DB->Connect();


                $id = $_REQUEST['id'];

            
            $query = "DELETE FROM `countries` WHERE id = :id;";
            $params = [
                "id" => $id,
            ];

            $DB->QuerySelectParam($query,$params);

            $content = "<h4>Ok country deleted</h4>";
            $content .= "<br>
                        <a href='index.php?op=900'>Return to the List</a>";

            return $content;
        }

        public static function edit(){

            $DB = new Db_PDO;
            $DB->Connect();

            $id = $_REQUEST['id'];

            $query = "SELECT * FROM `countries` WHERE id = :id; ";

            $params = [
                "id" => $id
            ];
            
            $Country = $DB->QuerySelectParam($query,$params);

            $content = "<form action='index.php?op=903' method='POST' class='countrySection'>
                            <h1> Country Detail   </h1>
                            <label for='id'>ID : </label>
                            <input type='text' name='id' value='{$Country[0]['id']}'>
                            <label for='id'>Code : </label>
                            <input type='text' name='code' value='{$Country[0]['code']}'>
                            <label for='id'>Name : </label>
                            <input type='text' name='name' value='{$Country[0]['name']}'>
                            <input type='hidden' name='lastId' value='{$Country[0]['id']}'>
                            <input type='submit' value='Submit'>
                            <button type='reset'>Clear</button>
                        </form> 


                        ";

            return $content;
        }

        public static function save()
        {
            if(isset($_REQUEST['id']) && isset($_REQUEST['code']) && isset($_REQUEST['name']))
            {
                $id = htmlspecialchars($_REQUEST['id']);
                $code = htmlspecialchars($_REQUEST['code']);
                $name = htmlspecialchars($_REQUEST['name']);
            }
            else {
                echo "You need to Fill All fields" . self::list();
            }

            $lastId = $_REQUEST['lastId'];

            $query = "  UPDATE `countries` SET `id`=:id ,`code`=:code,`name`= :countryName
                        WHERE id = :lastId";
            $params = [
                "id" => $id,
                "code" => $code,
                "countryName" => $name,
                "lastId" => $lastId
            ];

            $DB = new Db_PDO;
            $DB->Connect();

            $DB->QuerySelectParam($query,$params);
            return "Ok country updated";
        }
    }