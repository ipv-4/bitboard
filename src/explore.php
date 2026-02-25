<?php
require_once 'includes/config.php';
/** @var PDO $pdo */
?>

<DOCTYPE html>
<html>
<?php
$page_title = "Explore - Bitboard";
$extra_css = [];
$extra_js = ["script.js"];
include "includes/head.php";
?>

  <body>
<?php
include "includes/header.php";
// Execute the query
$stmt = $pdo->query("SELECT * FROM artworks");

// Get all results as an associative array
$artworks = $stmt->fetchAll();

foreach ($artworks as $art) {
    echo "<h3>" . htmlspecialchars($art['title']) . "</h3>";
    echo "<p>Category: " . htmlspecialchars($art['category']) . "</p>";
}
?>
  </body>
</html>
