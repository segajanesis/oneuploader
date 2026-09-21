<?php
require_once __DIR__ . '/config.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: oneupload.php', true, 303);
    exit;
}

require_valid_csrf();

$title = trim((string) ($_POST['title'] ?? ''));
$system = (string) ($_POST['system'] ?? '');
$allowed_systems = [
    'Genesis', 'NES', 'SNES', 'Game Gear', 'Game Boy', 'Game Boy Color',
    'Game Boy Advance', '3DS', 'DS', 'Nintendo 64', 'Playstation'
];

if ($title === '' || mb_strlen($title) > 120 || !in_array($system, $allowed_systems, true)) {
    http_response_code(422);
    exit('Please provide a valid demo game title and system.');
}

try {
    $connection = database();
    $statement = $connection->prepare('INSERT INTO collection (title, system) VALUES (?, ?)');
    $statement->bind_param('ss', $title, $system);
    $statement->execute();
    $statement->close();
    $connection->close();
} catch (Throwable $error) {
    error_log('Demo collection insert failed: ' . $error->getMessage());
    http_response_code(500);
    exit('The demo collection is temporarily unavailable.');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="Content-Security-Policy" content="default-src 'self'; style-src 'self' https://fonts.googleapis.com; font-src https://fonts.gstatic.com; img-src 'self'">
  <link href="https://fonts.googleapis.com/css?family=Fredoka+One" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="oneuploaddesign.css">
  <title>1-UP LOADER</title>
</head>
<body>
<ul>
  <li><a href="oneupload.php">Back</a></li>
  <li><a href="viewoneupload.php">View Collection</a></li>
</ul>
<p>This demo game has been added to the collection: <?= escape_html($title) ?></p>
</body>
</html>
