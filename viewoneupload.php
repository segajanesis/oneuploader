<?php
require_once __DIR__ . '/config.php';
header('Content-Security-Policy: default-src \'self\'; style-src \'self\' https://fonts.googleapis.com; font-src https://fonts.gstatic.com; img-src \'self\'');

$rows = [];
try {
    $connection = database();
    $result = $connection->query('SELECT title, system FROM collection ORDER BY title');
    while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
    $result->free();
    $connection->close();
} catch (Throwable $error) {
    error_log('Demo collection read failed: ' . $error->getMessage());
    http_response_code(500);
    exit('The demo collection is temporarily unavailable.');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link href="https://fonts.googleapis.com/css?family=Fredoka+One" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="oneuploaddesign.css">
  <title>1-UP LOADER</title>
</head>
<body>
<ul>
  <li><a href="oneupload.php">Back</a></li>
  <li><a href="viewoneupload.php">View Collection</a></li>
</ul>
<h2 class="headerLibrary">Your Demo Library</h2>
<?php if ($rows === []): ?>
  <p>No demo games have been added yet.</p>
<?php else: ?>
  <?php foreach ($rows as $row): ?>
    <div><?= escape_html((string) $row['title']) ?> on <?= escape_html((string) $row['system']) ?></div>
  <?php endforeach; ?>
<?php endif; ?>
</body>
</html>
