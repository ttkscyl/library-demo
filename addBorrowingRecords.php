<?php
include_once("connection.php");
#header("BorrowingRecords.php");
array_map("htmlspecialchars", $_POST);
print_r($_POST);
$statement = $conn->prepare("INSERT INTO BorrowingRecords(RecordID, UserID, BookID, BorrowDate, DueDate, ReturnDate, Status)
 VALUES (:RecordID, :UserID, :BookID, :BorrowDate, :DueDate, :ReturnDate, Status)"); #add all fields seen on my admin
$statement->bindParam(":RecordID", $_POST["Books"]);
$statement->bindParam(":UserID", $_POST["Users"]);
$statement->bindParam(":BookID", $_POST["BookID"]);
$statement->bindParam(":BorrowDate", $date);
$statement->execute();
?>