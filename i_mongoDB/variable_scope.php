<?php

$string = "Bagunnaraaa";
$integer = 10;
$float = 10.5;
$boolean = true;
$array = array("Ben10","pokemon");
echo var_dump($string . "<br>",$integer . "<br>",$float . "<br>",$boolean . "<br>",$array . "<br>");


echo $string . "<br>";
echo $integer . "<br>";
echo $float . "<br>";
echo $boolean . "<br>";
print_r($array) . "<br>";


function localScope() {
    $localVar = "nenu pakka local";
    echo $localVar . "<br>" ;
}
localScope();



$Var = "global star RC";

function globalScope() {
    global $Var;
    echo $Var . "<br>";
}
globalScope();




function staticScope() {
    static $x = 0;
    $x++;
    echo "Count: $x <br>";
}

staticScope();
staticScope();
staticScope();



?>
