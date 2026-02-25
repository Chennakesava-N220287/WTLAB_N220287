<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);


if(!file_exists("mode.txt")) {
    file_put_contents("mode.txt", "Initial Content\n");
}


$f = fopen("mode.txt", "r");
if($f) fclose($f);


$f = fopen("mode.txt", "w");
if($f){
    fwrite($f, "Write mode\n");
    fclose($f);
}


$f = fopen("mode.txt", "a");
if($f){
    fwrite($f, "Append mode\n");
    fclose($f);
}


if(!file_exists("newfile.txt")) {
    $f = fopen("newfile.txt", "x");
    if($f) fclose($f);
}


$f = fopen("mode.txt", "r+");
if($f){
    fwrite($f, "Read Write\n");
    fclose($f);
}


$f = fopen("mode.txt", "w+");
if($f){
    fwrite($f, "Erase + Write\n");
    fclose($f);
}


$f = fopen("mode.txt", "a+");
if($f){
    fwrite($f, "Append + Read\n");
    fclose($f);
}


if(!file_exists("unique.txt")) {
    $f = fopen("unique.txt", "x+");
    if($f) fclose($f);
}

echo "All file modes executed safely.";

?>
