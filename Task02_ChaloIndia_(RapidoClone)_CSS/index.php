<?php
$folder = "uploads/";
$files = scandir($folder);
?>

<h2>Upload File</h2>

<form action="upload.php" method="post" enctype="multipart/form-data">
    <input type="file" name="myfile" required>
    <button type="submit" name="upload">Upload</button>
</form>

<h2>Uploaded Files</h2>

<table border="1">
<tr>
    <th>File Name</th>
    <th>Size (bytes)</th>
    <th>Last Modified</th>
    <th>Actions</th>
</tr>

<?php
foreach($files as $file) {

    if($file != "." && $file != "..") {

        echo "<tr>";
        echo "<td>$file</td>";
        echo "<td>" . filesize($folder.$file) . "</td>";
        echo "<td>" . date("Y-m-d H:i:s", filemtime($folder.$file)) . "</td>";
        echo "<td>
                <a href='download.php?file=$file'>Download</a> |
                <a href='delete.php?file=$file'>Delete</a>
              </td>";
        echo "</tr>";
    }
}
?>
</table>
