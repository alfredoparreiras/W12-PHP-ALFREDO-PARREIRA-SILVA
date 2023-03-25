<?php
// Exercise 10-0
//1.display the current working directory
$curDir = getcwd();
echo "The current directory is => " . $curDir;

//2.verify that file ex10-0_text.txt exists in current directory, if not display message "file does not exist"
echo "<br><br>";
$file = 'ex10-0_text.txt';

if(file_exists($file)){
    echo "The {$file} exists in this directory";
}
else{
    echo "The {$file} doesn't exist in this directory";
}

//3.display the file size of file ex10-0_text.txt in bytes
echo "<br><br>";
$secondFile = 'index.php';
$size = filesize($secondFile);

echo "The size of the file {$secondFile} is {$size} bytes.";

//4.read whole content of file ex10-0_text.txt and save in a variable. Display content on web page.
echo "<br><br>";

$filePath = 'ex10-0_text.txt';
$contentFile = file_get_contents($filePath);
echo $contentFile;

//5.copy file to ex10-0_text.txt to HELLO.txt
$fileDestination = 'HELLO.txt';
copy($filePath,$fileDestination);

//6.replace whole file content of HELLO.txt by the text "Hello World"
file_put_contents($fileDestination,'Hello World');

//7.rename file HELLO.TXT to HELLO2.txt
rename($fileDestination, 'HELL02.txt');

//8.delete file HELLO2.txt
unlink('HELL02.txt');
?>