<?php 
    require __DIR__ . "/../vendor/autoload.php";
    require_once "log.php";

    try {
        $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . "/..");
        $dotenv->load();

        $db_host = $_ENV["DB_HOST"];
        $db_name = $_ENV["DB_NAME"];
        $db_user = $_ENV["DB_USER"];
        $db_pass = $_ENV["DB_PASS"];

        $db = new PDO("mysql:dbhost=$db_host;dbname=$db_name", $db_user, $db_pass, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        ]);
    } catch (PDOException $e) {
        log_msg("error", $e->getMessage());
        die("Database connection failed.");
    }
?>