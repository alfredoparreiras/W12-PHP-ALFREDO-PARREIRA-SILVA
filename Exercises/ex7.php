<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table, td, th{
            border: 1px solid red;
            border-collapse: collapse;
            text-align: center;
        }

        td,th{
            padding: 10px;
        }

        .price::before { 
            content: '$';
        }
    </style>
</head>
<body>
    
</body>
</html>
<?php 

    $products = [
        [
        'id' => 'td1234',
        'name' => 'lawn mower',
        'price' => 199.99,
        'weight' => 50,
        ],
        [
        'id' => 'ra9xfg',
        'name' => 'rake',
        'price' => 19.99,
        'weight' => 5,
        ],
        [
        'id' => 'pe4532',
        'name' => 'shovel',
        'price' => 19.99,
        'weight' => 5,
        ],
    ];

    echo 

    // Products 

    // echo '<table>';
    // echo '<tr><th>ID</th><th>Name</th><th>Price</th><th>Weight</th>';
    // for($i = 0; $i < 3; $i++){
    //     echo '<tr>';
    //     echo "<td>{$products[$i]['id']}</td>";
    //     echo "<td>{$products[$i]['name']}</td>";
    //     echo "<td class='price'>{$products[$i]['price']}</td>";
    //     echo "<td>{$products[$i]['weight']}</td>";
    //     echo '</tr>';
    // }
    // echo '</table>';


        $keys = array_keys($products[0]);

        // print_r($keys);
        $number = sizeof($keys);


    function showTable($table){

        


    }

    showTable($products);

?>