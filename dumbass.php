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

// Fetch all photos from the database
$sql = "SELECT * FROM photos";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$photos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gallery</title>
</head>
<body>
  <h1>Photo Gallery</h1>
  <div class="gallery">
    <?php foreach ($photos as $photo): ?>
      <img src="<?= $photo['image'] ?>" alt="Photo" style="width: 200px; height: auto; margin: 10px;">
    <?php endforeach; ?>
  </div>
</body>
</html>
