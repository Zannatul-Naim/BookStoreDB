
<!DOCTYPE html>
<html>
<head>
    <title>Update Book</title>
</head>
<body>
    <div class="container">
        <form action="update.php?isbn=<?php echo $_GET['isbn']; ?>" method="post">
            <label for="isbn">ISBN (13 characters):</label><br>
            <input type="text" id="isbn" name="isbn" value="<?php echo $_GET['isbn']; ?>" pattern=".{13,13}" required readonly><br>
            <label for="title">Title:</label><br>
            <input type="text" id="title" name="title" required><br>
            <label for="author">Author:</label><br>
            <input type="text" id="author" name="author" required><br>
            <label for="stock">Stock:</label><br>
            <input type="number" id="stock" name="stock" min="1" step="1" required><br>
            <label for="price">Price:</label><br>
            <input type="number" id="price" name="price" min="0.01" step="0.01" required><br>
            <input type="submit" value="Update">
        </form>
    </div>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bookstore";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "UPDATE book SET title=:title, author=:author, stock=:stock, price=:price WHERE isbn=:isbn";

        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':isbn', $_GET['isbn']);
        $stmt->bindParam(':title', $_POST['title']);
        $stmt->bindParam(':author', $_POST['author']);
        $stmt->bindParam(':stock', $_POST['stock']);
        $stmt->bindParam(':price', $_POST['price']);

        $stmt->execute();
        echo "alert('Record updated successfully')";
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    $conn = null;
    header('location: index.php');
}
?>
