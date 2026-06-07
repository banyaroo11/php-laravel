<?php 
    try {
        $db = new PDO("mysql:dbhost=localhost;dbname=banyaroo", "root", "root", [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        ]);
    } catch (PDOException $e) {
        die("Database connection failed: " . $e->getMessage());
    }
?>