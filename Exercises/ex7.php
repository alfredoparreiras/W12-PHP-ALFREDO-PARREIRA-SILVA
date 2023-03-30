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



    // Products 


        $arrayIds = array_keys($products[0]);

        echo "{$arrayIds[0]}";
        // print_r($keys);
    


    function showTable($table){
        $content = '';
        $content .= '<table>';
            $content .= '<tr><th>ID</th><th>Name</th><th>Price</th><th>Weight</th>';
            for($i = 0; $i < 3; $i++){
                $content .= '<tr>';
                $content .= "<td>{$table[$i]['id']}</td>";
                $content .= "<td>{$table[$i]['name']}</td>";
                $content .= "<td class='price'>{$table[$i]['price']}</td>";
                $content .= "<td>{$table[$i]['weight']}</td>";
                $content .= '</tr>';
            }
        $content .= '</table>';

        return $content;
    }
    
    echo showTable($products);
?>