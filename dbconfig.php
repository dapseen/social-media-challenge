<?php

require_once "vendor/autoload.php";

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$servername = getenv("DB_HOST");
$username = getenv("DB_USERNAME");
$password = getenv("DB_PASSWORD");
$database = getenv("DB_DATABASE");

//$servername = "localhost";
//$username = "root";
//$password = "";
//$database = "smc";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

if($conn->error){

    echo "Connection Failed" . $conn->error;
}



?>