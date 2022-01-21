<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Cibo";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Pasticcerie a Cesena</title>
	<meta charset='UTF-8' />
</head>
<body>
	<h1>Pasticcerie a Cesena</h1>
	<section>
<?php
	$sql = "SELECT * FROM Pasticcerie WHERE Luogo = 'Cesena'";

	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			echo "<div id='" . $row["Nome"] . "'>";
			echo "<h2>". $row["Nome"] . "</h2>";
			echo "<p> Orario apertura: " . $row["Orario_apertura"] . "</p>";
			echo "<p> Orario chiusura: " . $row["Orario_chiusura"] . "</p>";
			echo "<p> Giorno di chiusura: " . $row["Chiusura"] . "</p>";
			echo "</div>";
		}
	} else {
		echo "<p>Nessuna pasticceria presente a Cesena</p>";
	}
	$conn->close();
?>
</section>
</body>
</html>



