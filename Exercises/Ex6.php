<?php 

$gradeAlfredo = 85;
$gradeGabs = 93;
$gradeDanials = 70;


function getLetterGrade($grade){
    switch ($grade){
        case $grade >= 90 AND $grade <= 100:
            return "A";
            break;
        case $grade >= 80 AND $grade <= 89:
            return "B";
            break;
        case $grade >= 70 AND $grade <= 79:
            return "C";
            break;
        case $grade >= 60 AND $grade <= 69:
            return "D";
            break;
        case $grade < 60:
            return "F";
            break;
        default:
            return "This grade is invalide, grade must be between 0 and 100";
    }
}

echo "<h1>Exercise 6.2.1</h1>";
echo "<br>Your grade is {$gradeAlfredo} and the correspondent letter is => " . getLetterGrade($gradeAlfredo);
echo "<br>Your grade is {$gradeGabs} and the correspondent letter is => " . getLetterGrade($gradeGabs);
echo "<br>Your grade is {$gradeDanials} and the correspondent letter is => " . getLetterGrade($gradeDanials);


//Exercise 6.2.2

/**
 * A picture sharing service charges 5 cents per image for the first 100 downloads. For any subsequent downloads, they charge 3 cents each. Write a function getPicturesCost(nbPics) to computes the total cost for any given input number nbPics of downloads. We want to be able to use the function like this:
 */

CONST copiesThreshold = 100;
$alfredoPics = 30;
$carolPics = 130;


function getPicturesCost($nbPics){
    if($nbPics < copiesThreshold){
        return $nbPics * .05;
    }
    else{
        return ($nbPics - 100) * .03 + (100 * .05);
    }
}

//Testing 
echo "<br><br><h1>Exercise 6.2.2</h1>";
echo "<br>You want to print {$alfredoPics} and the total price is => " . getPicturesCost($alfredoPics);
echo "<br>You want to print {$carolPics} and the total price is =>  " . getPicturesCost($carolPics);

/**
 * An electricity bill is computed based on the number of days for which power was supplied, and how many kilowatt-hours (kWh) were consumed. First there is a fixed rate of $0.50 per day for the service, whatever the amount of power consumed.  Then the first 200 kWh consumed are charged at $0.30 per kWh. For the remaining consumption above 200 kWh, the rate is $0.20 per kWh. Write a function getElectricityTotal($nbDays,$nbKWh) to compute the total amount for the bill based on the number of days $nbDays and number of kilowatts $nbKWh. We want to be able to use the function like this:
 */

CONST RatePerDayOfUsage = .5;
CONST KwhThreshold = 200;

$numberOfDays1 = 60; 
$kWh1 = 180;

$numberOfDays2 = 60;
$kWh2 = 350;

function getEletricityTotal($nbDays, $nbKWh){
    if($nbKWh < KwhThreshold){
        return ($nbDays * RatePerDayOfUsage) + ($nbKWh * .3);
    }else{
        return ($nbDays * RatePerDayOfUsage) + ((($nbKWh - KwhThreshold) * .2) + (KwhThreshold * .3));
    }
}

echo "<h1>Exercise 6.2.3</h1>";
echo "<br>You used eletricy by {$numberOfDays1} and the total amount of Kilowatts was {$kWh1} and the correspondent letter is => " . getEletricityTotal($numberOfDays1,$kWh1);
echo "<br>You used eletricy by {$numberOfDays2} and the total amount of Kilowatts was {$kWh2} and the correspondent letter is => " . getEletricityTotal($numberOfDays2,$kWh2);

/**
 * Write a function getMax($n1,$n2,$n3) returning the greatest of 3 numbers. 
 */

function getMax($n1,$n2,$n3) {
    $max = null;

    if($n1 > $n2){
        if($n1 > $n3){
            $max = $n1;
        }
        else{
            $max = $n3;
        }
    }
    else{
        if($n2 > $n3){
            $max = $n2;
        }
        else{
            $max = $n3;
        }
    }

    return $max;
}
$number1 = 8;
$number2 = 52;
$number3 = 34;

$number4 = 108;
$number5 = 52;
$number6 = 34;

$number7 = 8;
$number8 = 52;
$number9 = 65;


echo "<h1>Exercise 6.2.4</h1>";
echo "<br>You choosed {$number1} and {$number2} and {$number3} and the greater one is => " . getMax($number1,$number2,$number3);
echo "<br>You choosed {$number4} and {$number5} and {$number6} and the greater one is => " . getMax($number4,$number5,$number6);
echo "<br>You choosed {$number7} and {$number8} and {$number9} and the greater one is => " . getMax($number7,$number8,$number9);

/**
 * Write a function sortAsc($n1,$n2,$n3) displaying 3 numbers in ascending (increasing) order on the web page.
 */

    function sortAsc($n1,$n2,$n3){
        $temp = null;
        $max = null;
        $med = null;
        $min = null;

        if($n1 > $n2 AND $n1 > $n3){
            $max = $n1;
            if($n2 > $n3){
                $med = $n2;
                $min = $n3;
            }
            else{
                $med = $n3;
                $min = $n2;
            }
        }

        if($n2 > $n1 AND $n2 > $n3){
            $max = $n2;
            if($n1 > $n3){
                $med = $n1;
                $min = $n3;
            }
            else{
                $med = $n3;
                $min = $n1;
            }
        }

        if($n3 > $n2 AND $n3 > $n1){
            $max = $n3;
            if($n2 > $n1){
                $med = $n2;
                $min = $n1;
            }
            else{
                $med = $n1;
                $min = $n2;
            }
        }
        
        return '<br>' . $min . '<br>' . $med . '<br>'. $max;

    }

    $number11 = 34;
    $number21 = 356;
    $number31 = 999;

    $number41 = 356;
    $number51 = 34;
    $number61 = 999;

    $number71 = 3;
    $number81 = 1;
    $number91 = 9;

    echo "<h1>Exercise 6.2.5</h1>";
    echo "<br><br>You choosed {$number11} and {$number21} and {$number31} and this is the ascending order => <br>" . sortAsc($number11,$number21,$number31);
    echo "<br><br>You choosed {$number71} and {$number81} and {$number91} and this is the ascending order => <br>" . sortAsc($number71,$number81,$number91);
    echo "<br><br>You choosed {$number41} and {$number51} and {$number61} and this is the ascending order => <br>" . sortAsc($number41,$number51,$number61);

    /**
     * Write a function showBetween_1_5() to display on the web page the integer numbers from 0 to 5. It should print
    *>0
    *>1
    *>2
    *>3
    *>4
    *>5
     */

    function showBetween_1_5(){
        for($i = 0; $i < 6; $i++){
            echo  '>' . $i . '<br>';
        }
    }

    echo "<h1>Exercise 6.5.1</h1>";
    echo "<h3><br>For Loop</h3>";
    showBetween_1_5();

    function showBetween_1_5_While(){
        $i = 0;
        while($i < 6){
            echo  '>' . $i . '<br>';
            $i++;
        }
    }

    echo "<h3><br>While Loop</h3>";
    showBetween_1_5_While();

    function showBetween_1_5_Do_While(){
        $i = 0; 

        do{
            echo  '>' . $i . '<br>';  
            $i++;
        }while($i < 6);
    }

    echo "<h3><br>Do While Loop</h3>";
    showBetween_1_5_Do_While();

    //----------------------------------
    /**
     * A.	Write a function displayBetween($n1,$n2)  to display on the web page the integer numbers between any two numbers. For example displayBetween(5,10)  shall display the integers between 5 and 10 inclusively:
     */

    function displayBetween($n1, $n2){
        for($i = $n1; $i <= $n2; $i++){
            echo  '>' . $i . '<br>';  

        }
    }

    echo "<h3><br>Display Between</h3><br>A<br>";
    displayBetween(5,10);

    function displayBetweenImproved($n1, $n2){
        
        if($n1 < $n2){
            for($i = $n1; $i <= $n2; $i++){
                echo  '>' . $i . '<br>';  
    
            }
        }
        else
        {
            for($i = $n1; $i >= $n2; $i--){
                echo  '>' . $i . '<br>';  
    
            }
        }
    }

    echo "<h3><br>Display Between</h3><br>B<br>";
    displayBetweenImproved(15,10);

    /**
     * Write a function sumBetween($n1,$n2) returning the sum of all the integers between two numbers. For example the sum of the integers between 5 and 10 inclusively is 5+6+7+8+9+10=45.  We want to be able to use the function like this:
     */

    function sumBetween($n1, $n2){
        $total = null;

        for($i = $n1; $i <= $n2; $i++){
            $total += $i;
        }

        return $total;

    }

    echo "<h3><br>Exercise 6.5.3</h3>";
    echo sumBetween(5,10);

    
?>

