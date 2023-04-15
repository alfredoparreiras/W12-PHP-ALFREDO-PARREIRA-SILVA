<?php

    class Customer{
        
        static public function ListCustomers()
        {
            $DB = new DB_Pdo;
            $DB->Connect();


            //Query
            $query = 'SELECT * FROM customers';

            $Customers = $DB->QuerySelect($query);

                $content = null;

                if($Customers == []){
                    echo "The product list doesn't contain any value.";
                }
                else{
                    $content = "<h1>Customers List</h1>";
                    $content .= '<table>';
                    $content .= '<tr><th>ID</th><th>Name</th><th>Country</th>';
                    for($i = 0; $i < count($Customers); $i++){
                        $content .= '<tr>';
                        $content .= "<td>{$Customers[$i]['id']}</td>";
                        $content .= "<td>{$Customers[$i]['name']}</td>";
                        $content .= "<td>{$Customers[$i]['country']}</td>";
                        $content .= '</tr>';
                    }
                    $content .= '</table>';
                }
                return $content;
        }
    }