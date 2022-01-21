<?php
// Create connection
$conn = new mysqli("localhost", "root", "", "luglio");

// Check connection
if ($conn->connect_error) {
    echo json_encode(array("error" => "Errore nella connessione"));
} 
else{
	$soglia = isset($_POST["soglia"]) ? $_POST["soglia"] : null;
	$numbers = array();

	if ($soglia != null and $soglia > 0) {
		$sql = "SELECT numero FROM numeri WHERE numero > " . $soglia;
		$result = $conn->query($sql);

		
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				array_push($numbers, $row["numero"]);
			}
		}

		for ($i = 0; $i < count($numbers); $i++) {
			for ($x = 0; $x < count($numbers)-1; $x++) {
				if ($numbers[$x] > $numbers[$x+1]) {
					$temp = $numbers[$x+1];
					$numbers[$x+1] = $numbers[$x];
					$numbers[$x] = $temp;
				}
			} 
		}
	}
	echo json_encode($numbers);
}

?>