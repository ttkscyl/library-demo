<!DOCTYPE html>
<html>

    <head>
        <title>
            Borrowing Records
        </title>
        <!-- <script src="Datepicker.JS" defer></script> -->
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="">
                    <img src="pictures/icon.png" alt="company logo" style="width:45px;" class="rounded-pill"> 
                    <span><b>&nbsp;&nbsp; Helios's Bookshelf</b></span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="library.php">View books</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="copyright.html">Copyright</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">My account</a>
                    </li>
                    </ul>
                </div>
            </div>
        </nav>
    <!----------------------------------------------------------------------------------------------------------->
    <section class="BorrowingRecord">
            <form action="addBorrowingRecords.php" method="POST">
            From User :<select name = "Users">
            <?php
                include_once("connection.php");
                $statement=$conn->prepare("SELECT * FROM Users");
                $statement->execute();
                    while($row=$statement->fetch(PDO::FETCH_ASSOC))
                        {
                            echo("<option value = ".$row["UserID"]."> ".$row["Name"]."</option>");
                        }
            ?>

            </select>
        <br>
        <br>
    <!-- Below is books-->
            <form action="addBorrowingRecords.php" method = "POST">
            Book to Borrow :<select name="Books">
                

            <?php
                
            include_once("connection.php");
            $statement=$conn->prepare("SELECT * FROM Books ORDER BY Title ASC");
            $statement->execute();
                while($row=$statement->fetch(PDO::FETCH_ASSOC))
                    {
                        echo("<option value = ".$row["BookID"]."> ".$row["Title"]."</option>");
                    }
        ?>
            </select>
        <br>
        <br>
        <div class = "datepicker-container">
            <form action="addBorrowingRecords.php">
                <label for="date">Pick Due Date:</label>
                <input type="date" id="date" name="date">
                <input type="submit">
            </form>
            <!-- <form action = "addBorrowingRecords.php" method = "POST">
                <input class = "form-control" type = "datatime-local" placeholder="Select Hand-in Date">

                <div class = "datepicker">
                    <div class = "datepicker-header">
                        <button class = "prev"></button>    

                        <div>
                            <select class = "month-input">
                                <option>Janurary</option>
                                <option>Feburary</option>
                                <option>March</option>
                                <option>April</option>
                                <option>May</option>
                                <option>June</option>
                                <option>July</option>
                                <option>August</option>
                                <option>September</option>
                                <option>October</option>
                                <option>November</option>
                                <option>December</option>
                            </select>
                            <input type ="number" class = "year-input">
                        </div>

                        <button class = "next"></button>

                    </div>
                        <div class ="days">
                        <span>Sun</span>
                        <span>Mon</span>
                        <span>Tue</span>
                        <span>Wed</span>
                        <span>Thur</span>
                        <span>Fri</span>
                        <span>Sat</span>
                    </div> -->
                    <div class = "dates">
                        
                    </div>
                    <div class = "date-picker-footer">
                        <!-- <button class = "cancel">Cancel</button>
                        <button class = "apply">Apply</button>
                    </div>
                </div>
            </form> -->
        </div>

        <input type = "submit" value ="Add the borrowing records">
        </section>
    </body>
    
</html>