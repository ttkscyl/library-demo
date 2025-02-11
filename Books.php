<!DOCTYPE html>
<html>
    <head>
        <title>
            Add Book Page
        </title>
    </head>
    <body>

        <form action="addBooks.php" method="post">
            Title:<input type = "text" name="Title"><br>
            Authors:<input type = "text" name="Authors"><br>
            Genres:<input type ="text" name ="Genres"><br>
            ISBN:<input type ="text" name="ISBN"><br>

            <input type="submit" value="Add Book">
        </form>

        <h2>Current Books</h2>
        <?php
            include_once("connection.php");
            $statement=$conn->prepare("SELECT * FROM Books");
            $statement->execute();
            while($row=$statement->fetch(PDO::FETCH_ASSOC))
                {
                    echo($row["Title"].", ".$row["Authors"].",".$row["Genres"].",".$row["ISBN"]."<br>");
                }


            $_POST["submit"]
        ?>

    </body>    
</html>