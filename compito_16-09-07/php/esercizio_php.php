<?php

$servername = "localhost";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password,"concerti");

if (mysqli_connect_errno()){
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$sql = "SELECT * FROM concertibologna WHERE Data = DATE_FORMAT(CURDATE(), '%d/%m/%Y')";
$result_oggi = $conn->query($sql);

$sql = "SELECT * FROM concertibologna WHERE SUBSTRING(Data, 4, 2)=MONTH(CURDATE()) AND SUBSTRING(Data, 7, 4)=YEAR(CURDATE())";
$result_mese = $conn->query($sql);

$sql = "SELECT * FROM concertibologna WHERE SUBSTRING(Data, 4, 2)=MONTH(DATE_ADD(CURDATE(), INTERVAL 1 MONTH)) AND SUBSTRING(Data, 7, 4)=YEAR(DATE_ADD(CURDATE(), INTERVAL 1 MONTH))";
$result_meseprossimo = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="it">
<head>
<meta charset="utf-8">
<title>Concerti</title>
</head>
<body>

<main>
<?php
if (($result_oggi->num_rows + $result_mese->num_rows +$result_meseprossimo->num_rows) > 0) {
	if($result_oggi->num_rows > 0)
	{
		echo('Concerto di oggi: (' .date("d/m/Y").')<br>');
		echo('<ul>');
		while($row = $result_oggi->fetch_assoc()) {
			echo ('<li>Ora: '.$row['Ora'].' '.$row["Gruppo"].', '.$row["Luogo"].'</li><br>');
		}
		echo('</ul>');
	}
    if($result_mese->num_rows > 0)
	{
		echo('Concerti di questo mese:<br>');
		echo('<ul>');
		while($row = $result_mese->fetch_assoc()) {		
			echo ('<li>'.$row['Data'].': '.$row["Gruppo"].', '.$row["Luogo"].'</li><br>');
		}
		echo('</ul>');
	}
    if($result_mese->num_rows > 0)
	{	
		echo('Concerti del prossimo mese:<br>');
		echo('<ul>');
		while($row = $result_meseprossimo->fetch_assoc()) {				
			echo ('<li>'.$row['Data'].': '.$row["Gruppo"].', '.$row["Luogo"].'</li><br>');
		}
		echo('</ul>');
	}
} else {
    echo "<p>Non ci sono concerti in programma</p>";
}
$conn->close();
?>
</main>
</body>
</html>