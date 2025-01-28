<!DOCTYPE html>
<html>
    <head>
        <title>
            Add Users Page
        </title>
    </head>
    <body>

        <form action="addUsers.php" method="post">
            Name:<input type = "text" name="Title"><br>
            Email:<input type = "text" name="Authors"><br>
            Password:<input type ="text" name ="Genres"><br>

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