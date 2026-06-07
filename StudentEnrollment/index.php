<?php
    if ($_SERVER["REQUEST_URI"] === "/") {
        header("Location: students.php");
        exit();
    }
?>