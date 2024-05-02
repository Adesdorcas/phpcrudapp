<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookstore</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h1 class="mb-4">Bookstore</h1>
        <!-- Add Book Form -->
        <form action="add_book.php" method="POST">
            <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Author</label>
                <input type="text" name="author" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Genre</label>
                <input type="text" name="genre" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Publication Year</label>
                <input type="number" name="publication_year" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Book</button>
        </form>

        <!-- Book List -->
        <div class="mt-4">
            <h2>Book List</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Genre</th>
                        <th>Publication Year</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Display books here -->
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

                    // SQL to fetch books
                    $sql = "SELECT * FROM books";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>{$row['title']}</td>
                                    <td>{$row['author']}</td>
                                    <td>{$row['genre']}</td>
                                    <td>{$row['publication_year']}</td>
                                    <td>
                                        <a href='edit_book.php?id={$row['id']}' class='btn btn-sm btn-primary'>Edit</a>
                                        <a href='delete_book.php?id={$row['id']}' class='btn btn-sm btn-danger'>Delete</a>
                                    </td>
                                </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>No books found</td></tr>";
                    }

                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
