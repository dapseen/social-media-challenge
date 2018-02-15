<?php
$servername = "db724249883.db.1and1.com";
$username = "rdbo724249883";
$password = "KeepM0ving";
$dbname = "db724249883";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>