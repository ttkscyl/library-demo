<?php
include_once("connection.php");
#header("BorrowingRecords.php");
array_map("htmlspecialchars", $_POST);
print_r($_POST);
$statement = $conn->prepare("INSERT INTO BorrowingRecords(RecordID, UserID, BookID, BorrowDate, DueDate, ReturnDate, Status)
 VALUES (NULL, :UserID, :BookID, :BorrowDate, :DueDate, null, null)"); #add all fields seen on my admin

$statement->bindParam(":UserID", $_POST["Users"]);
$statement->bindParam(":BookID", $_POST["Books"]);
$statement->bindParam(":BorrowDate", $_POST["date"]);
$statement->bindParam(":DueDate", $_POST["date"]);

$statement->execute();
?>