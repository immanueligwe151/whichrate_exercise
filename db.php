<?php
$url = parse_url(getenv("mysql://b752a35a364057:b738e4bd@eu-cluster-west-01.k8s.cleardb.net/heroku_b4bc17926cf84d9?reconnect=true"));

$server = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$db = "instructions_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
