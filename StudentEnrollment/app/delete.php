<?php 
    session_start();

    require_once "db.php";

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        try {
            $id = $_POST["id"];
            $image_url = $_POST["image_url"];

            $db->beginTransaction();
            $sql = "DELETE FROM students WHERE student_id=:id";
            $stmt = $db->prepare($sql);
            $stmt->execute([":id" => $id]);
            $db->commit();

            if (!empty($image_url) && file_exists($image_url)) {
                unlink($image_url);
            }

            $_SESSION["success"] = "Student has been deleted successfully.";
        } catch (PDOException $e) {
            $db->rollback();
            
            $_SESSION["error"] = "Error: " . $e->getMessage();
        } finally {
            header("Location: students.php");
            exit();
        }
    }
?>