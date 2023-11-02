<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bookstore";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "INSERT INTO book (isbn, title, author, stock, price)
        VALUES (:isbn, :title, :author, :stock, :price)";

        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':isbn', $_POST['isbn']);
        $stmt->bindParam(':title', $_POST['title']);
        $stmt->bindParam(':author', $_POST['author']);
        $stmt->bindParam(':stock', $_POST['stock']);
        $stmt->bindParam(':price', $_POST['price']);

        $stmt->execute();
        echo "alert('new record updated successfully')";
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    $conn = null;
    header('location: index.php');
}
?>
