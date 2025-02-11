<?php
session_start();
include_once("connection.php");
#header("location:Users.php");
array_map("htmlspecialchars", $_POST);

#below from line 8-12 is to check for array keys
if (isset($array['Email'])) {
    echo $array['Email'];
} else {
    echo 'Key does not exist';
}

print_r($_POST);
echo($_POST["UserID"]);
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
$statement->bindParam(":CreatedAt", $_POST["CreatedAt"]);
$statement->bindParam(":role", $role);
$statement->execute();
$conn=null;

?>
