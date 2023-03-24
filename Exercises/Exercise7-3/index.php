<?php
//Exercise 7-3


$forecasts = [
    '2018-02-11' => [
        'image_file' => 'images/degagement.gif',
        'image_desc' => 'clearing skies',
        'temperature' => '-17ºC',
        'temperature' => '-17ºC',
    ],
    '2018-02-12' => [
        'image_file' => 'images/soleil_nuage.gif',
        'image_desc' => 'sunny with clouds',
        'temperature' => '-11ºC',
    ],
    '2018-02-13' => [
        'image_file' => 'images/neige.gif',
        'image_desc' => 'snow',
        'temperature' => '-12ºC',
    ],
    '2018-02-14' => [
        'image_file' => 'images/soleil.gif',
        'image_desc' => 'sunny',
        'temperature' => '-15ºC',
    ],
    '2018-02-15' => [
        'image_file' => 'images/neige.gif',
        'image_desc' => 'snow',
        'temperature' => '-11ºC',
    ],
    '2018-02-16' => [
        'image_file' => 'images/soleil.gif',
        'image_desc' => 'sunny',
        'temperature' => '-15ºC',
    ],
];

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <title>Exercise 7-3 Weather forecast</title>
    <style>
        body {
            padding: 5px;
            width: 100%;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;    
            background-color: #D9AFD9;
            background-image: linear-gradient(135deg, #D9AFD9 0%, #97D9E1 42%);


        }

        .dailyForecast{
            display: flex;
            margin: 0 auto;
            justify-content: space-around;
            margin-bottom: 24px;

        }

        h1{
            text-align: center;
        }

        .container{
            padding: 3rem;
            border: 3px solid #D9AFD9;
            margin: 0 auto;
        }

        .ForescastP{
            font-size: 1.2rem;
            font-weight: 600;
        }
    </style>

</head>

<body>
    <div class="container">
        <header>
            <h1>Weather forecast</h1>
        </header>
        <main>
            <table>
                <?php
               //YOUR CODE HERE
                foreach($forecasts as $forecast => $data){
                    echo "<div class='dailyForecast'>
                            <p class='ForescastP'>{$forecast}</p>
                            <img src='{$data['image_file']}'>
                            <p>{$data['temperature']}</p>
                        </div>";

                       
                }
                
                ?>
            </table>
        </main>
    </div>
</body>

</html>