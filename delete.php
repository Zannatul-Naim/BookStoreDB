<?php
require_once 'Connection.php';
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // $servername = "localhost";
    // $username = "root";
    // $password = "";
    // $dbname = "bookstore";

    try {
        // $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn = getConnection();
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

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
