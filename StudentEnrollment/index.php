<?php
    if ($_SERVER["REQUEST_URI"] === "/") {
        header("Location: /app/students.php");
        exit();
    }
?>