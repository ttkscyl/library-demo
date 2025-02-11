<?php
$servername = "localhost";
$username = "root";
$password = "123";
$dbname = "library";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Connected successfully!"; // Remember to comment out later!
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>