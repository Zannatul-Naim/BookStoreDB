<?php
    function getConnection() {
        return new PDO(
            'mysql:host=localhost;dbname=bookstore',
           "root",
            ""
        );
    }

?>