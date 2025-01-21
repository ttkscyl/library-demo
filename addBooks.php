<?php
include_once("connection.php");
array_map("htmlspecialchars", $_POST);
header("location:Books.php");

print_r($_POST);
$statement = $conn->prepare("INSERT INTO Books (BookID,Title,Authors,Genres,ISBN,CopiesAvailable,TotalCopies) VALUES
(null,:Title,:Authors,:Genres,:ISBN,null,null)");
$statement->bindParam(":Title", $_POST["Title"]);
$statement->bindParam(":Authors", $_POST["Authors"]);
$statement->bindParam(":Genres", $_POST["Genres"]);
$statement->bindParam(":ISBN", $_POST["ISBN"]);
$statement->execute();
$conn=null;
?>
