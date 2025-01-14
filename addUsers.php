<?php
session_start();
include_once("connection.php");
header("location:user.php");
array_map("htmlspecialchars", $_POST);

print_r($_POST);
echo($_POST["Username"]);
switch($_POST["role"]){
    case "User":
        $role=0;
        break;
    case "Admin":
        $role=1;
        break;
}
$statement = $conn->prepare("INSERT INTO Users (UserID,Name,Email,Password,CreatedAt)
VALUES (null:Name, :Email, :Password, :CreatedAt)");

$statement->bindParam(":Name", $_POST["Name"]);
$statement->bindParam(":Email", $_POST["Email"]);
$statement->bindParam(":Password", $hashedPassword);
$statement->bindParam(":CreatedAt", date("Y-m-d H:i:s"));
$statement->bindParam(":role", $role);
$statement->execute();
$conn=null;

?>
