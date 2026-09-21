<?php
require_once __DIR__ . '/config.php';
$systems = [
    'Genesis', 'NES', 'SNES', 'Game Gear', 'Game Boy', 'Game Boy Color',
    'Game Boy Advance', '3DS', 'DS', 'Nintendo 64', 'Playstation'
];
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
  <li><a href="oneupload.php">Home</a></li>
  <li><a href="viewoneupload.php">View Collection</a></li>
</ul>
<center>
<div class="formbox">
<h2 class="header">1-UP LOADER</h2>
<font class="roloDex">the retro game rolodex</font>
<br><br>
<img src="dolphin.png" class="dolphin" alt="Demo dolphin"><br>
<br>
<font class="addGame">ADD GAME TO ROLODEX</font>
<form action="oneuploadphp.php" method="post">
  <input type="hidden" name="csrf_token" value="<?= escape_html(csrf_token()) ?>">
  <p class="consoleFont">Game Name: </p>
  <input type="text" name="title" maxlength="120" required>
  <br>
  <p class="systemFont">System: </p>
  <select name="system" required>
<?php foreach ($systems as $system): ?>
    <option value="<?= escape_html($system) ?>"><?= escape_html($system) ?></option>
<?php endforeach; ?>
  </select>
  <br><br>
  <input type="submit" value="1-UP LOAD TO COLLECTION">
</form>
</div>
</center>
</body>
</html>
