<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bookstore";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "DELETE FROM book WHERE isbn = :isbn";

        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':isbn', $_GET['isbn']);

        $stmt->execute();
        echo 1;
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    $conn = null;
    header('location: index.php');
}
?>
