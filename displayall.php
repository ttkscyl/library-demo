<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Books | Library</title>
    <link rel="stylesheet" href="style.css">
    
    <!-- Oxanium font --> <!-- Oxanium font --> 
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oxanium:wght@200..800&display=swap" rel="stylesheet">
    
    <!-- BS5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
      
</head>

<body>
    <!-- Navbar -->
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
  
<br>

</body>

</html>






<?php
require 'connection.php'; 

try {
    $stmt = $conn->prepare("SELECT * FROM Books"); 
    $stmt->execute();
    $books = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Books</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h2>All Books</h2>

<table>
    <tr>
        <th>BookID</th>
        <th>Title</th>
        <th>Authors</th>
        <th>Genres</th>
        <th>ISBN</th>
        <th>Copies Available</th>
        <th>Total Copies</th>
    </tr>
    <?php foreach ($books as $book): ?>
        <tr>
            <td><?= htmlspecialchars($book['BookID']) ?></td>
            <td><?= htmlspecialchars($book['Title']) ?></td>
            <td><?= htmlspecialchars($book['Authors']) ?></td>
            <td><?= htmlspecialchars($book['Genres']) ?></td>
            <td><?= htmlspecialchars($book['ISBN']) ?></td>
            <td><?= htmlspecialchars($book['CopiesAvailable']) ?></td>
            <td><?= htmlspecialchars($book['TotalCopies']) ?></td>
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
