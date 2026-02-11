<?php

$file = "test.txt";


$f = fopen($file, "w");
fwrite($f, "Hello PHP File Handling\n");
fclose($f);


$f = fopen($file, "r");
$content = fread($f, filesize($file));
echo $content;
fclose($f);


echo "<br>";
echo file_get_contents($file);


file_put_contents($file, "New Content Added");


$lines = file($file);
echo "<pre>";
print_r($lines);
echo "</pre>";

echo "<h2>File Information</h2>";   
echo "<br>File Exists: " . file_exists($file);
echo "<br>File Size: " . filesize($file);
echo "<br>File Type: " . filetype($file);
echo "<br>Last Modified: " . date("Y-m-d H:i:s", filemtime($file));
echo "<br>Last Accessed: " . date("Y-m-d H:i:s", fileatime($file));
echo "<br>Created Time: " . date("Y-m-d H:i:s", filectime($file));

echo "<h2>File & Folder Management</h2>";   
copy($file, "copy.txt");
rename("copy.txt", "renamed.txt");
unlink("renamed.txt");

mkdir("newfolder");
rmdir("newfolder");

echo "<br>Is File: " . is_file($file);
echo "<br>Is Dir: " . is_dir("uploads");

echo "<h2>Directory Handling</h2>";   
$files = scandir("uploads");
echo "<pre>";
print_r($files);
echo "</pre>";

$dir = opendir("uploads");

while(($filename = readdir($dir)) !== false) {
    echo "<br>" . $filename;
}

closedir($dir);

echo "<br>Current Directory: " . getcwd();


echo "<h2>file locking</h2>";
$fp = fopen("lock.txt", "w");

if(flock($fp, LOCK_EX)) {
    fwrite($fp, "Locked Writing");
    flock($fp, LOCK_UN);
}

fclose($fp);

?>