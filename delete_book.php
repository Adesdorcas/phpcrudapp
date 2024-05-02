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

// Check if book ID is provided
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // SQL to delete book
    $sql = "DELETE FROM books WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "Book ID not provided";
}

$conn->close();
?>