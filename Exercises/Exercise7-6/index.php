<?php
//Exercise 7-6 array functions

function arrayDisplay($array)
{
    echo '<table>';
    echo '<tr><th style="border:1px solid black">index/key</th><th style="border:1px solid black">value</th></tr>';
    foreach ($array as $key => $value) {
        echo '<tr><td style="border:1px solid black">' . $key . '</td><td style="border:1px solid black">' . $value . '</td></tr>';
    }
    echo '</table>';
}

function showTitle($title)
{
    echo "<br/><b>&#9830; $title</b><br/>";
    echo '<hr/>';
}

$colors = [
    'red',
    'blue',
    'black',
    'green',
    'grey',
];

showTitle('Exercise 1 - Sort array in ascending order');
// YOUR CODE HERE
sort($colors);
$stringColors = implode('<br>',$colors);
echo $stringColors;

showTitle('Exercise 2 - All uppercase using array_walk or array_map');
// YOUR CODE HERE

print_r(array_map('strtoupper',$colors));
echo '<br>';

showTitle('Exercise 3 - Merge $colors and $otherColors with array_merge()');

$otherColors = [
    'yellow',
    'purple',
    'black',
];

// YOUR CODE HERE

$newArray = array_merge($colors, $otherColors);
print_r($newArray);
echo '<br>';

showTitle('Exercise 4: one word per line with explode() and foreach');
$sentence = 'Hello my friends! How are you today?';
// YOUR CODE HERE
$array = explode(" ",$sentence);
foreach($array as $word){
    echo $word . "<br>";
}

showTitle('Exercise 5: reverse the array with array_reverse()');
// YOUR CODE HERE
$array2 = array_reverse($newArray);
print_r($array2);


echo "-----------------------------------------------------<br><br><br><br><br>";

$myDate = mktime(9,10,10,09,19,1990);
echo date("d-m-Y")
