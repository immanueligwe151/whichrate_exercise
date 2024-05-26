<?php
// db.php
$servername = "localhost";
$username = "root";  // default username for XAMPP
$password = "";  // default password for XAMPP
$dbname = "instructions_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
