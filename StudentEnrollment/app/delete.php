<?php 
    session_start();

    require_once "db.php";
    require_once "log.php";

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

            log_msg("info", "Deleted student ID: $id.");
            $_SESSION["success"] = "Student has been deleted successfully.";
        } catch (Exception $e) {
            $db->rollback();
            
            log_msg("error", "Error deleting student ID: $id. " . $e->getMessage());
            $_SESSION["error"] = "Error occured.";
        } finally {
            header("Location: students.php");
            exit();
        }
    }
?>