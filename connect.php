<?php
// データベース接続情報
$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "examquiz";

// データベースに接続
$connection = new mysqli($host, $dbUsername, $dbPassword, $dbName);
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

?>

