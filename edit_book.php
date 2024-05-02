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

    // Fetch book details
    $sql = "SELECT * FROM books WHERE id=$id";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $title = $row['title'];
        $author = $row['author'];
        $genre = $row['genre'];
        $publication_year = $row['publication_year'];
    } else {
        echo "Book not found";
    }
}

// Handle form submission for updating book
if (isset($_POST['update'])) {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $genre = $_POST['genre'];
    $publication_year = $_POST['publication_year'];

    $sql = "UPDATE books SET title='$title', author='$author', genre='$genre', publication_year=$publication_year WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h1>Edit Book</h1>
        <form action="" method="POST">
            <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" class="form-control" value="<?php echo $title; ?>" required>
            </div>
            <div class="form-group">
                <label>Author</label>
                <input type="text" name="author" class="form-control" value="<?php echo $author; ?>" required>
            </div>
            <div class="form-group">
                <label>Genre</label>
                <input type="text" name="genre" class="form-control" value="<?php echo $genre; ?>" required>
            </div>
            <div class="form-group">
                <label>Publication Year</label>
                <input type="number" name="publication_year" class="form-control" value="<?php echo $publication_year; ?>" required>
            </div>
            <button type="submit" name="update" class="btn btn-primary">Update Book</button>
        </form>
    </div>
</body>
</html>