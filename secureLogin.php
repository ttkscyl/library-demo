<?php
session_start();
include_once("connection.php");
header("location:user.php");

$statement = $conn->prepare("SELECT userid, password FROM Users WHERE name = :email");
$statement->bindParam(":email," $_POST["email"]);
$statement->execute();

$row = $statement->fetch(PDO::FETCH_ASSOC);

if($row && password_verify($_POST[:"password"], $row["password"])){
    $_SESSION["userid"] = $row["userid"];
    $_SESSION["email"] = $_POST["email"];
    echo "Login successful";
}
else{
    echo "Invalid email or password";
}
?>
