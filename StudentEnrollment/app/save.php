<?php 
    require_once "db.php";
    require_once "log.php";

    try {
        $db->beginTransaction();
        $sql = "INSERT INTO students (student_id, student_name, age, gender, image_url) 
                    VALUES (:id, :name, :age, :gender, :image_url)";

        $stmt = $db->prepare($sql);
        $stmt->execute([
            ":id" => $id,
            ":name" => $name,
            ":age" => $age,
            ":gender" => $gender,
            ":image_url" => $image_url,
        ]);

        $db->commit();

        if ($image_url !== null) {
            move_uploaded_file($_FILES["image"]["tmp_name"], $image_url);
        }

        log_msg("info", "Ernolled student ID: $id.");
        $_SESSION["success"] = "Student has been enrolled successfully.";
    } catch (Exception $e) {
        $db->rollback();

        log_msg("error", "Error enrolling student ID: $id. " . $e->getMessage());
        $_SESSION["error"] = "Error occured.";
    } finally {
        header("Location: students.php");
        exit();
    }
?>