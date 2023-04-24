fb<?php

    class Order
    {
        public static function DisplayOrdersTable()
        {
            // Connect and Retrieve Orders Info
            $DB = new Db_PDO;
            $DB->Connect();

            //Creating Query
            $query = 'SELECT * FROM orders';


            $Orders = $DB->QuerySelect($query);

            //
            $tableBody = null;
            //Creating Table Body
            foreach($Orders as $data)
            {
                $tableBody .= "<tr>
                                    <td>{$data['id']}</td>
                                    <td class='date'>{$data['date']}</td>
                                    <td class='date'>{$data['shippedDate']}</td>
                                    <td>{$data['status']}</td>
                                    <td>{$data['customerId']}</td>
                                    <td>{$data['comments']}</td>
                                    <td class='actionSection'>
                                        <a href='index.php?op=210&id={$data['id']}'>Details</a>
                                        <a href='index.php?op=211&id={$data['id']}'>Delete</a>
                                    </td>
                                </tr>";
            }

            $content = "<div class='searchSection'>
                            <form action='index.php?op=207' method='POST'>
                                <input type='text' name='idSearch' maxlength='6'>
                                <button type='submit' class='btn submit'>Search</button>
                            </form>
                            <form action='index.php?op=206' method='POST'>
                                <button type='submit' name='showAll' value='showAll' class='btn show'>Show All</button>
                            </form>
                            <form action='index.php?op=208' method='POST'>
                                <button type='submit' name='addOrder' value='addOrder' class='btn order'>Add Order</button> 
                            </form>
                        </div>
                        <table class='ordersTable'>
                        <tr><th>Id</th><th>Date</th><th>Shipped Date</th><th>Status</th><th>Customer</th><th>Comments</th><th>Actions</th></tr>
                        {$tableBody}
                        </table>";

            return $content;
        }

        public static function DisplaySpecificOrder($id)
        {
             // Connect and Retrieve Orders Info
            $DB = new Db_PDO;
            $DB->Connect();

             //Creating Query
             $query = "SELECT * FROM orders WHERE id = {$id}";

            $Orders = $DB->QuerySelect($query);

             //
            $tableBody = null;
             //Creating Table Body
            foreach($Orders as $data)
            {
                $tableBody .= "<tr>
                                    <td>{$data['id']}</td>
                                    <td class='date'>{$data['date']}</td>
                                    <td class='date'>{$data['shippedDate']}</td>
                                    <td>{$data['status']}</td>
                                    <td>{$data['customerId']}</td>
                                    <td>{$data['comments']}</td>
                                    <td class='actionSection'>
                                        <a href='index.php?op=210&id={$data['id']}'>Details</a>
                                        <a href='index.php?op=211&id={$data['id']}'>Delete</a>
                                    </td>
                                </tr>";
            }

            $content = "<div class='searchSection'>
                            <form action='index.php?op=207' method='POST'>
                                <input type='text' name='idSearch' maxlength='6'>
                                <button type='submit' class='btn submit'>Search</button>
                            </form>
                            <form action='index.php?op=206' method='POST'>
                                <button type='submit' name='showAll' value='showAll' class='btn show'>Show All</button>
                            </form>
                            <form action='index.php?op=208' method='POST'>
                                <button type='submit' name='addOrder' value='addOrder' class='btn order'>Add Order</button> 
                            </form>
                        </div>
                        <table class='ordersTable'>
                        <tr><th>Id</th><th>Date</th><th>Shipped Date</th><th>Status</th><th>Customer</th><th>Comments</th><th>Actions</th></tr>
                        {$tableBody}
                        </table>";

            return $content;
        }

        public static function DisplayDetails()
        {
            $DB = new Db_PDO;
            $DB->Connect();

        
            $id = $_REQUEST['id'];
            

            $query = 'SELECT * FROM `orders` WHERE `id` = :id';
            $params = [
                "id" => $id
            ];
            echo $id;

            $order = $DB->QuerySelectParam($query,$params);


            $content = "<form action='index.php?op=212' method='POST' class='orderDetailSection'>
                            <h1> Order Detail   </h1>
                            <label for='id'>ID : </label>
                            <input type='text' name='id' value='{$order[0]['id']}' readonly>
                            <label for='id'>Date : </label>
                            <input type='date' name='date' value='{$order[0]['date']}'>
                            <label for='id'>Required Date : </label>
                            <input type='date' name='requiredDate' value='{$order[0]['requiredDate']}'>
                            <label for='id'>Shipped Date : </label>
                            <input type='date' name='shippedDate' value='{$order[0]['shippedDate']}'>
                            <label for='id'>Status : </label>
                            <input type='text' name='status' value='{$order[0]['status']}'>
                            <label for='id'>Comments : </label>
                            <input type='text' name='comments' value='{$order[0]['comments']}'>
                            <label for='id'>Customer ID : </label>
                            <input type='text' name='customerId' value='{$order[0]['customerId']}'>
                            <div class='submitSection'>
                                <input type='submit' value='Submit'>
                                <input type='reset' value='Clear'>
                            </div>
                        </form>";

            return $content;
        }

        public static function EditOrder()
        {
            $DB = new Db_PDO; 
            $DB->Connect();

            // Required Variables
            if(isset($_REQUEST['date']) && isset($_REQUEST['requiredDate']))
            {
                $date = $_REQUEST['date'];
                $requiredDate = $_REQUEST['requiredDate'];
            }

            $id = $_REQUEST['id'];
            $customerId = Tools::RequiredVerifyLength('customerId',11);
            $status = Tools::RequiredVerifyLength('status',15);
            
            // Non Required Variables
            
            $shippedDate = $_REQUEST['shippedDate'];
            $comments = $_REQUEST['comments'];
            
            //Query
            $query = 'UPDATE `orders` SET `date`= :date ,`requiredDate`= :requiredDate,`shippedDate`= :shippedDate,`status`= :status,    `comments`= :comments,`customerId`= :customerId 
                    WHERE id = :id';

            $params = [
                "id" => $id,
                "date" => $date,
                "requiredDate" => $requiredDate, 
                "shippedDate" => $shippedDate, 
                "status" => $status, 
                "comments" => $comments, 
                "customerId" => $customerId
            ];

            $DB->QuerySelectParam($query, $params);

            return "<h1>Your order {$id} was sucessfully updated</h1>";
        }

        public static function AddOrder(){
            $content = null; 


            //Retrieving Customers ID
            $DB = new Db_PDO;
            $DB->Connect();

            $Customers = $DB->QuerySelect('SELECT * FROM customers;');
            $customersId = null;

            foreach($Customers as $data){
                $customersId .= "<option class='optionForm' id='{$data['id']}'value='{$data['id']}'>Name: {$data['name']} ID: {$data['id']}</option>";
            }

            $content = "<div class='AddOrder'>
                            <form action='index.php?op=209' method='POST'>
                            <input type='text' name='id' class='input input__text' placeholder='ID' maxlength='10' required>
                            <div class='dateSection'>
                                <label for='date'>Date</label>
                                <input type='date' id ='date' name='date' class='input input__date' required>
                                <label for='requiredDate'>Required Date</label>
                                <input type='date' id ='requiredDate' name='requiredDate' class='input input__date' required>
                                <label for='shippedDate'> Shipped Date</label>
                                <input type='date' id ='shippedDate' name='shippedDate' class='input input__date' required>
                            </div>
                            <input type='text' name='status' class='input input__text' placeholder='Status'>
                            <select name='customerId' required>
                                {$customersId}
                            </select>
                            <input type='text' name='comments' class='input input__text' placeholder='Comments'>
                            <button type='submit' class='btn submit'>Add Order</button> 
                            </form>";

            return $content;
        }

        public static function VerifyOrder()
        {
            //TODO: Validate Dates | How to retrieve ID or Ask to User to Select another ID |
            $id = Tools::RequiredVerifyLength('id',10);
            $date = $_REQUEST['date'];
            $requiredDate = $_REQUEST['requiredDate'];
            $shippedDate = $_REQUEST['shippedDate'];
            $status = Tools::VerifyLength('status',15);
            $customerId = $_REQUEST['customerId'];
            $comments = Tools::VerifyLength('comments',1500);

            //Variable to validate 
            $isValid = true;

            //Contents Variable
            $content = null;
            $errorMessage = null;


            //Creating and Connecting Connection with DB.
            $DB = new Db_PDO;
            $DB->Connect();

            // Check if shipping is after Created Date
            $checkDate = new DateTime($date);
            $checkShippingDate = new DateTime($shippedDate);

            $interval = $checkDate->diff($checkShippingDate);

            //If interval has a positive value , it meams the shipped date was before order creation.
            //TODO: is not working
            if ($interval->format('%R') === '+') {
                echo 'Date 1 is before Date 2';
                $errorMessage = "You cannot send a product before order creation. Please select a valid date.";
                $isValid = false;
            } 


            //Inserting into DB.
            if($isValid)
            {
                //TODO
                try
                {
                    $query = "INSERT INTO `orders`(`id`, `date`, `requiredDate`, `shippedDate`, `status`, `comments`, `customerId`) 
                        VALUES ('{$id}','{$date}','{$requiredDate}','{$shippedDate}','{$status}','{$comments}','{$customerId}')";
                
                $DB->Query($query);

                $content = "Your order number {$id} was created sucessfully.";
                }
                catch(PDOException $e)  
                {
                    //TODO: is not catching.
                    $content = "We have an error here, see : " . $e->getMessage();
                }
            
            }
            else 
            {
                $content = $errorMessage;
            }

            return $content;

        }

        public static function DeleteOrder()
        {
            $DB = new Db_PDO;
            $DB->Connect();

            if(isset($_REQUEST['id']))
            {
                $id = $_REQUEST['id'];
            }

            $query =   'DELETE FROM `orderdetails` WHERE `orderId` = :id';
            $params = [
                "id" => $id
            ];

            $query2 = 'DELETE FROM `orders` WHERE `id` = :id';



            $DB->QuerySelectParam($query,$params);
            //$DB->Query($query2);
            $DB->QuerySelectParam($query2,$params);

            return "<h1>Your Order {$id} was sucessfully deleted</h1>";
        }

        public static function ListJson()
        {
            $DB = new Db_PDO; 
            $DB->Connect(); 
            $orders = $DB->QuerySelect("SELECT * FROM orders;");
            $ordersJson = json_encode($orders, JSON_PRETTY_PRINT);
            header("Content-Type: application/json; charset=UTF-8");
            http_response_code(200);
            echo $ordersJson;
        }

    }
    