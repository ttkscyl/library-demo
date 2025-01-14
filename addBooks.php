<?php
include_once("connection.php");
array_map("htmlspecialchars", $_POST);

print_r($_POST);
$statement = $conn->prepare("INSERT INTO Books (BookID,Title,Authors,Genres,ISBN,CopiesAvailable,TotalCopies) VALUES");
$statement->bindParam(":Title", $_POST["Title"]);
$statement->bindParam(":Authors", $_POST["Authors"]);
?>
