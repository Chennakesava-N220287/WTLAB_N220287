<?php 
$txt = "  oxford university  ";

echo strlen($txt) . "<br><br>";
echo strrev($txt) . "<br><br>";
echo strtoupper($txt) . "<br><br>";
echo strtolower($txt) . "<br><br>";
echo ucfirst($txt) . "<br><br>";
echo ucwords($txt) . "<br><br>";

echo strpos($txt, "university") . "<br><br>";
echo str_replace("university", "vidhyalaya", $txt) . "<br><br>";

echo substr($txt, 0, 5) . "<br><br>";
echo trim($txt) . "<br><br>";
echo ltrim($txt) . "<br><br>";
echo rtrim($txt) . "<br><br>";

echo strcmp("nenu","NENU") . "<br><br>";
echo strcasecmp("nuvvu","Nuvvu") . "<br><br>";

echo htmlspecialchars("<h1>Tinnara</h1>") . "<br><br>";
echo addslashes("I'm seeing insta") . "<br>";
?>
