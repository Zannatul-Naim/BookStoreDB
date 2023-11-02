<!DOCTYPE html>
<html>
<head>
    <title>Book Form</title>
</head>
<body>
    <div class="container">
        <form action="./submit_book_data.php" method="post">
            <label for="isbn">ISBN (13 characters):</label><br>
            <input type="text" id="isbn" name="isbn" pattern=".{13,13}" required><br>
            <label for="title">Title:</label><br>
            <input type="text" id="title" name="title" required><br>
            <label for="author">Author:</label><br>
            <input type="text" id="author" name="author" required><br>
            <label for="stock">Stock:</label><br>
            <input type="number" id="stock" name="stock" min="1" step="1" required><br>
            <label for="price">Price:</label><br>
            <input type="number" id="price" name="price" min="0.01" step="0.01" required><br>
            <input type="submit" value="Submit">
        </form>
        <br><br>
    </div>
</body>
</html>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bookstore";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("SELECT * FROM book");
    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    echo "<table border=1>";
    echo "<tr><th>Title</th><th>Author</th><th>ISBN</th><th>Stock</th><th>Price</th><th colspan=2>Action</th></tr>";
    foreach($stmt->fetchAll() as $k=>$v) {
        echo "<tr>";
        echo "<td>".$v['isbn']."</td>";
        echo "<td>".$v['title']."</td>";
        echo "<td>".$v['author']."</td>";
        echo "<td>".$v['stock']."</td>";
        echo "<td>".$v['price']."</td>";
        echo "<td><a href='update.php?isbn=" . $v['isbn'] . "'><button>Update</button></td><td> <a href='delete.php?isbn=" . $v['isbn'] . "'><button>Delete</button></td>";
        echo "</tr>";
    }
    echo "</table>";
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
?>
