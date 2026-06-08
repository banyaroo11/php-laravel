<?php 
    require_once "db.php";

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

        $_SESSION["success"] = "Student has been enrolled successfully.";
    } catch (PDOException $e) {
        $db->rollback();

        $_SESSION["error"] = "Error: " . $e->getMessage();
    } finally {
        header("Location: students.php");
        exit();
    }
?>