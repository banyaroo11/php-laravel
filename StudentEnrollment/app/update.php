<?php 
    require_once "db.php";

    try {
        $db->beginTransaction();
        $sql = "UPDATE students 
                SET student_name = :name, 
                    age = :age, 
                    gender = :gender";

        if ($image_url !== null) {
            $sql .= ", image_url = :image_url";
        }

        $sql .= " WHERE student_id = :id";

        $stmt = $db->prepare($sql);

        $stmt->bindValue(':name', $name);
        $stmt->bindValue(':age', $age);
        $stmt->bindValue(':gender', $gender);
        $stmt->bindValue(':id', $id);

        if ($image_url !== null) {
            $stmt->bindValue(':image_url', $image_url);
        }

        $stmt->execute();

        $db->commit();

        if ($image_url !== null) {
            move_uploaded_file($_FILES["image"]["tmp_name"], $image_url);
        }

        $_SESSION["success"] = "Student has been updated successfully.";
    } catch (PDOException $e) {
        $db->rollback();

        $_SESSION["error"] = "Error: " . $e->getMessage();
    } finally {
        header("Location: students.php");
        exit();
    }
?>