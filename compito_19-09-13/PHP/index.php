<?php

// Parametri per la connessione al database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "settembre";

// Creo la connessione
$conn = new mysqli($servername, $username, $password, $dbname);
// Verifico l'esito della connessione
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ottengo le variabili inviate tramite POST
    $name = $_POST['name'];
    $height = $_POST['height'];
    $mass = $_POST['mass'];
    // Verifico la correttezza delle variabili
    if (isset($name) && isset($height) && isset($mass)) {
        // Verifico che vi siano numeri appartenenti all'insieme A
        $sql = "INSERT INTO starwars (name,height,mass) VALUES ('$name','$height','$mass')";
        if ($conn->query($sql) === TRUE) {echo "New record created successfully";}
        else {  echo "Error: " . $sql . "<br>" . $conn->error;}
  }
}elseif ($_SERVER['REQUEST_METHOD'] === 'GET'){
    $sql = "SELECT * FROM `starwars` WHERE 1 ";
    $result = $conn->query($sql);
    $post_data = [];
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          $temp_array = array('name' => $row["name"],'height' => $row["height"], 'mass' => $row["mass"]);
          array_push($post_data, $temp_array);
        }
    } else {echo "0 results";}

    $myJSON = json_encode($post_data);
    print_r( $myJSON);
}

// Chiudo la connessione
$conn->close();

?>
