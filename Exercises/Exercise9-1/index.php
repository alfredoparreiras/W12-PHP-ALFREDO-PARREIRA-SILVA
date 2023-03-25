<?php
//Exercise 9-1 Date and Time functions
// reference https://www.php.net/manual/fr/function.date.php
// date formating https://www.php.net/manual/fr/datetime.format.php


function showTitle($title)
{
    echo "<h2>&#9830; $title</h2>";
    echo '<hr/>';
}

showTitle('timezone specified in php.ini');
echo 'timezone:'.date_default_timezone_get();

showTitle('current timestamp, seconds since january 1st, 1970');
$t = time();
print_r($t);

showTitle('Create a timestamp for a given date 20h:25min:10s on 10 january 2019');
// 1st method with mktime
// your code here
$timeStamp = mktime(20,25,10,01,10,2019);
echo $timeStamp;

//2nd method with strotime()
// your code here

showTitle('Exercise 1 full date and time in RFC2822 format');
// your code here
echo date(DATE_RFC2822, $timeStamp);

showTitle('Exercise 2 Day only');
// your code here
echo date("d",$timeStamp);

showTitle('Exercise 3 The Month only');
// your code here
echo date("m",$timeStamp);

showTitle('Exercise 4 The Year only');
// your code here
echo date("y",$timeStamp);


showTitle('Exercise 5 Date displayed like 10,january,2019');
// your code here
echo date("d,F,o",$timeStamp);


showTitle('Exercise 6 Add 1 month and full display');
// your code here
$interval = DateInterval::createFromDateString('1 month');
$date = date_create('2019-10-01');
//$newDate = date_add($date,$interval);
echo date(DATE_RFC2822,strtotime("+1 month", $timeStamp));


showTitle('Exercice 7 Number of days since 31 décembre 1973');
// your code here
$firstDate = mktime(0,0,0,12,31,1973);
$today = time();
$days_between = ceil(abs($today - $firstDate) / 86400);
echo $days_between;

showTitle('Exercice 8 Date displayed like Thurday, 10 january 2019');
// your code here
echo date("l,d F o",$timeStamp);
