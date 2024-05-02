<?php

// Database connection
$servername = "localhost";
$username = "olutise";
$password = "Tutorial@2024";
$dbname = "bookstore";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// Form data
$title = $_POST['title'];
$author = $_POST['author'];
$genre = $_POST['genre'];
$publication_year = $_POST['publication_year'];

// SQL to insert new book
$sql = "INSERT INTO books (title, author, genre, publication_year) VALUES ('$title', '$author', '$genre', $publication_year)";

if ($conn->query($sql) === TRUE) {
    echo "New record added successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>