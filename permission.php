<?php
$testFile = 'uploads/test.txt';
if (file_put_contents($testFile, "Test file") !== false) {
    echo "File uploaded successfully!";
} else {
    echo "Failed to upload file.";
}
?>
