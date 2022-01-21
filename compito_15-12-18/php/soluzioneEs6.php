<?php

$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE DATABASE IF NOT EXISTS TecWEB";


if ($conn->query($sql) === TRUE) {
    echo "DB TecWEB created successfully";
} else {
    echo "Error creating DB: " . $conn->error;
}

$conn = new mysqli($servername, $username, $password, "TecWEB");

$sql = "CREATE TABLE IF NOT EXISTS Studenti_iscritti (
matricola int(9) NOT NULL,
nome VARCHAR(30) NOT NULL,
cognome VARCHAR(30) NOT NULL,
email VARCHAR(50) NOT NULL,
PRIMARY KEY (matricola)
)";

if ($conn->query($sql) === TRUE) {
    echo "Table Studenti_iscritti created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}


$sql = "INSERT INTO Studenti_iscritti (nome, cognome, matricola, email)
VALUES ('" . $_POST['nome'] . "','" . $_POST['cognome'] . "','" . $_POST['matricola'] . "','" . $_POST['email'] . "')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();


?>
