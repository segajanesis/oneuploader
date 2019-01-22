<html>
<head>
	<link href="https://fonts.googleapis.com/css?family=Fredoka+One" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="oneuploaddesign.css">
	<link href="https://fonts.googleapis.com/css?family=Titillium+Web" rel="stylesheet">
<title>1-UP LOADER</title>
</head>
<body>

<ul>
  <li><a href="oneupload.html">Back</a></li>
 <li><a href="viewoneupload.php">View Collection</a></li>
</ul>

<?php
$servername = "localhost";
$username = "oneuploadform";
$password = "oneupload";
$dbname = "oneupload";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO collection (title, system)
VALUES ('" . $_POST['title'] . "', '" . $_POST['system'] . "');";
?>	
<p><?php
echo "This game has been added to the collection: " . $_POST["title"];
?>
</p>
<?php
if ($conn->query($sql) === TRUE) {
	error_log("Your game has been added to the collection.");
} else {
	error_log("Error: " . $sql . "<br>" . $conn->error);
}
$conn->close();
?>


</body>
</html>