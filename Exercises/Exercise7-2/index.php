<?php
// Exercise 7-2
/* Months of the year, array of 12 items.
the key is the month name, the value is a color name
*/
$months_colors = [
    'January' => 'blue',
    'February' => 'white',
    'March' => 'Red',
    'April' => 'Yellow',
    'May' => 'Grey',
    'June' => 'Lime',
    'July' => 'lightblue',
    'August' => 'fuchsia',
    'September' => 'lightgrey',
    'October' => 'olive',
    'November' => 'pink',
    'December' => 'purple',
];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Months table</title>
    <style>
        .container {
            width: 80%;
            border: 1px solid brown;
            margin: 10px;
            padding: 20px;
        }
    </style>
</head>

<body>

    <h1>Exercise 7-2 Months table</h1>
    <main>
        <div class="container">
            <!--First table -->
            <table>
                <?php
                     // YOUR PHP CODE HERE
                    foreach($months_colors as $month => $data){
                        echo "<div style='background-color: {$data}'>{$month}</div> ";
                    }
                ?>
            </table>
        </div>

        <div class="container">
            <!--Second table -->
            <table class='second_table'>
                <?php
                     // YOUR PHP CODE HERE
                    foreach($months_colors as $month => $data){
                        echo "<div style='background-color:{$data}; display: inline-block; margin-right: 5px;'>{$month}</div> ";
                    }
                ?>
            </table>
        </div>
    </main>

</body>

</html>