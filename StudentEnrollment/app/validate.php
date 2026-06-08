<?php
    session_start();

    require_once "db.php";
    require_once "helper.php";

    $name_pattern = "/^([a-zA-Z\s]+)*[a-zA-Z]{1}$/";
    $image_error = $id_error = $name_error = $age_error = $gender_error = "";
    $image_url = null;

    if($_SERVER["REQUEST_METHOD"] === "POST") {

        $id = $_POST["id"];
        $name = $_POST["name"];
        $age = $_POST["age"];
        $gender = $_POST["gender"];

        if (empty($id) || !is_numeric($id) || (int)$id < 21370) {
            $id_error = "ID value cannot be in invalid format!";
        }

        if ($_FILES["image"]["error"] !== UPLOAD_ERR_NO_FILE) {
            if ($_FILES["image"]["error"] !== UPLOAD_ERR_OK) {
                $image_error = "File upload failed. Error code: " . $_FILES["image"]["error"];
            } else if (!in_array($_FILES["image"]["type"], ["image/png", "image/jpeg"])) {
                $image_error = "Invalid file type (only accepts JPEG, and PNG)!";
            } else {
                $image_url = "img/$id.jpg";
            }    
        } 

        if (empty($name)) {
            $name_error = "Name value cannot be empty!";
        } else if (!preg_match($name_pattern, $name)) {
            $name_error = "Invalid name value!";
        }

        if (empty($age)) {
            $age_error = "Age value cannot be empty or zero!";
        } else if (!is_numeric($age) || (int)$age > 100) {
            $age_error = "Invalid age value!";
        }

        if (empty($gender)) {
            $gender_error = "At least one gender must be chosen!";
        } else if (!in_array($gender, ["male", "female", "others"])) {
            $gender_error = "Invalid gender value!";
        }

        if (empty($id_error) && empty($name_error) && empty($age_error) && empty($gender_error) && empty($image_error)) {
            try {
                if (student_exists($db, $id)) {
                    require_once "update.php";
                } else {
                    require_once "save.php";
                }
            } catch(PDOException $e) {
                $_SESSION["error"]["db_error"] = "Database error occured: " . $e->getMessage();
                header("Location: form.php");
                die();
            }
        } else {
            $_SESSION["error"] = [
                "image_error" => $image_error,
                "id_error" => $id_error,
                "name_error" => $name_error,
                "age_error" => $age_error,
                "gender_error" => $gender_error
            ];

            header("Location: form.php");
            exit();
        }
    }
?>