<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="PHP Course">
    <link rel="stylesheet" href="style.css">
    <title>PHP Course - Exercises Home Page</title>
</head>
<body>
    <h1>Exercises for Course W12 PHP March 2023</h1>

    <?php
        //date_default_timezone_set('America/New_York'); 

        echo '<b>Current date is ' .date("j-M-Y h:i") .'</b>';
        $name = "Alfredo"
    ?>
    <?php
        function hello($name){
            echo 'hello' . $name;
            return 34;
            }
    ?>
</body>
</html>