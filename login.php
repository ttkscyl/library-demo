<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account | Library</title>
    <link rel="stylesheet" href="style.css">
    
    <!-- Oxanium font --> <!-- Oxanium font --> 
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oxanium:wght@200..800&display=swap" rel="stylesheet">
    
    <!-- BS5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
      
</head>
<body class="grey_bg">
    
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
    
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header text-center">Login</div>
                    <div class="card-body">
                        <form method="POST" action="login.php">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email:</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password:</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-dark w-100">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "library";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $email = $_POST['email'];
        $pass = $_POST['password'];
        
        $stmt = $conn->prepare("SELECT UserID, Password FROM Users WHERE Email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($user && password_verify($pass, $user['Password'])) {
            session_start();
            $_SESSION['UserID'] = $user['UserID'];
            header("Location: settings.php");
            exit();
        } else {
            echo "<div class='alert alert-danger text-center'>Invalid login credentials.</div>";
        }
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}
?>
