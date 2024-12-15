<?php
// DB connection settings
$host = "localhost";
$dbname = "codelab";
$username = "root";  // Adjust if necessary
$password = "";  // Adjust if necessary

// Establish DB connection
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Check if image data is received via POST
if (isset($_POST['image'])) {
    $imageData = $_POST['image'];

    // Remove the 'data:image/png;base64,' part from the image data
    $imageData = str_replace('data:image/png;base64,', '', $imageData);
    $imageData = base64_decode($imageData);

    // Generate a unique filename
    $fileName = 'photo_' . time() . '.png';
    $filePath = 'uploads/' . $fileName;

    // Create the uploads folder if it doesn't exist
    if (!is_dir('uploads')) {
        mkdir('uploads');
    }

    // Save the image to the server
    file_put_contents($filePath, $imageData);

    // Store the image path in the database
    $sql = "INSERT INTO photos (image) VALUES (:image)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['image' => $filePath]);

    // Redirect to the gallery page after uploading
    header("Location: err.php");
    exit();
} else {
    echo "No image data received.";
}
?>
