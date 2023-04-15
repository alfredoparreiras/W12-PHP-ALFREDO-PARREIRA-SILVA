<?php

        class Db_PDO{

            //MySql or MariaDB
            const DB_SERVER_TYPE = 'mysql'; 

            // Local server ip address
            const DB_HOST = '127.0.0.1'; 

            //optional, need to check port in MAMP [Optional]
            const DB_PORT = '8889';

            //DataBase's name
            const DB_NAME = 'classicmodels';

            //DataBase chartset [Optional]
            const DB_CHARSET = 'utf8mb4';

            //Default Database User 
            const DB_USER_NAME ='root';

            //Default Database password [MAMP]
            const DB_PASSWORD = 'root';

            private $DB_connection; 

            private const DB_OPTIONS = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false
            ];

            //Function to connect to MySQL
            public function Connect()
            {
                try{
                    $DSN = self::DB_SERVER_TYPE . ':host=' . self::DB_HOST . ';port=' . self::DB_PORT . ';dbname=' . self::DB_NAME . ';charset=' . self::DB_CHARSET;
                    $this->DB_connection = new PDO($DSN, self::DB_USER_NAME, self::DB_PASSWORD, self::DB_OPTIONS);
                }
                catch(PDOException $e)
                {
                    http_response_code(500);
                    exit('DB connection Error : ' . $e -> getMessage());
                }
                
                //Testing Connection
                //echo 'Connect to DB';
            }

            //Disconection
            public function Disconnect()
            {
                $this->DB_connection = null;
            }

            //Sends a query to the DB Insert, Update or Delete. 
            public function Query($sql)
            {
                try { 
                    $result = $this->DB_connection->query($sql);
                    //Returns a PDO Statement Object
                    return $result; 
                }
                catch(PDOException $e)
                {
                    http_response_code(500);
                    exit('DB Query Error : ' . $e->getMessage());
                }
            }

            //Sends a Query to the DB Select
            public function QuerySelect($sql)
            {
                try { 
                    $result = $this->DB_connection->query($sql);
                    //Returns a PDO Statement Object
                    return $result->fetchAll(); 
                }
                catch(PDOException $e)
                {
                    http_response_code(500);
                    exit('DB Query Error : ' . $e->getMessage());
                }
            }

            function QuerySelectParam($sql,$params){
            
                try
                {
                    $stmt = $this->DB_connection->prepare($sql);
                    $stmt->execute($params);
                    return $stmt->fetchAll();
                }
                catch(PDOException $e)
                {
                    http_response_code(500);
                    exit("Db Query Error : " . $e->getMessage());
                }
    
            }

        }