<?php
include_once("connection.php");


// Users Table
$stmt = $conn->prepare("
    DROP TABLE IF EXISTS Users;
    CREATE TABLE Users (
        UserID INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        Name VARCHAR(255) NOT NULL,
        Email VARCHAR(255) UNIQUE NOT NULL,
        Password VARCHAR(255) NOT NULL,
        CreatedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )
");
$stmt->execute();
$stmt->closeCursor();
echo ("<br>Users table created");

// Books Table
$stmt = $conn->prepare("
    DROP TABLE IF EXISTS Books;
    CREATE TABLE Books (
        BookID INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        Title VARCHAR(255) NOT NULL,
        Authors TEXT NOT NULL,
        Genres TEXT NOT NULL,
        ISBN VARCHAR(13) UNIQUE NOT NULL,
        CopiesAvailable INT(4) NOT NULL DEFAULT 0,
        TotalCopies INT(4) NOT NULL DEFAULT 0
    )
");
$stmt->execute();
$stmt->closeCursor();
echo ("<br>Books table created");

// BorrowingRecords Table
$stmt = $conn->prepare("
    DROP TABLE IF EXISTS BorrowingRecords;
    CREATE TABLE BorrowingRecords (
        RecordID INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        UserID INT(4) UNSIGNED NOT NULL,
        BookID INT(4) UNSIGNED NOT NULL,
        BorrowDate DATE NOT NULL,
        DueDate DATE NOT NULL,
        ReturnDate DATE DEFAULT NULL,
        Status ENUM('Borrowed', 'Returned', 'Overdue') DEFAULT 'Borrowed',
        FOREIGN KEY (UserID) REFERENCES Users(UserID) ON DELETE CASCADE,
        FOREIGN KEY (BookID) REFERENCES Books(BookID) ON DELETE CASCADE
    )
");
$stmt->execute();
$stmt->closeCursor();
echo ("<br>BorrowingRecords table created");