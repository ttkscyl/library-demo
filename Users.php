<!DOCTYPE html>
<html>
    <head>
        <title>
            Add Users Page
        </title>
    </head>
    <body>

        <form action="addUsers.php" method="post">
            Name:<input type = "text" name="Name"><br>
            Email:<input type = "text" name="Email"><br>
            Password:<input type ="text" name ="Password"><br>
            <input type="radio" name="role" value="User" checked> User<br>
            <input type="radio" name="role" value="Admin"> Admin<br>
            <input type="submit" value="Add User">
        </form>

        <h2>Current Users</h2>
        <?php
            include_once("connection.php");
            $statement=$conn->prepare("SELECT * FROM Users");
            $statement->execute();
            while($row=$statement->fetch(PDO::FETCH_ASSOC))
                {
                    echo($row["Name"].", ".$row["Email"].",".$row["Password"]."<br>");
                }
        ?>

    </body>    
</html>