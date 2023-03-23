<?php

function showTitle($title)
{
    echo "<h2>&#9830; $title</h2>";
    echo '<hr/>';
}

$sentence = 'Hello my friends! How are you today?';

showTitle('Exercise 1: number of characters with strlen()');
// your code here
$number_of_characters = strlen($sentence);
echo "This sentence have {$number_of_characters} characters.";

showTitle('Exercise 2: word count with str_word_count()');
// your code here
$number_of_words = str_word_count($sentence);
echo "This sentence have {$number_of_words} words.";

showTitle('Exercise 3: uppercase with strtoupper()');
// your code here
echo strtoupper($sentence);

showTitle('Exercise 4: First character of each word capitalized with ucwords()');
// your code here
echo ucwords($sentence);

showTitle('Exercise 5 character count without whitespaces');
// your code here
$number_of_whitespace = substr_count($sentence, ' ');
echo strlen($sentence) - $number_of_whitespace;


showTitle('Exercise 6 change a for b, c for d, e for f with strtr()');
// your code here
echo strtr($sentence, 'ace','bdf');

$test = 10;
?>