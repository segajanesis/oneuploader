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
<br>
<h2 class="headerLibrary">Your Library</h2>
<?php
$servername = "localhost";
$username = "oneuploadform";
$password = "oneupload";
$dbname = "oneupload";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT title, system FROM collection";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    echo $row["title"] . " on " . $row["system"] . "<br>"; 
    }
} else {
    echo "0 results";
}
$conn->close();
?>

</body>
</html>