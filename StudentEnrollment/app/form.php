<?php
    session_start();

    require_once "db.php";
    require_once "log.php";

    if (isset($_SESSION["error"])) {
        $error = $_SESSION["error"];
    }

    if (isset($_GET["id"])) {
        $id = $_GET["id"];

        require_once "helper.php";
        try {
            $student = get_student_by_id($db, $id);
        } catch (PDOException $e) {
            log_msg("Error fetching student ID: $id data. " . $e->getMessage());
            die("Error fetching student data.");
        }

        $name = $student->student_name;
        $age = $student->age;
        $gender = $student->gender;
        $image_url = $student->image_url;
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="UCSY Website">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Form | UCSY</title>
        <link rel="stylesheet" type="text/css" href="./css/reset.css">
        <link rel="stylesheet" type="text/css" href="./css/style.css">
        <link rel="stylesheet" type="text/css" href="./css/form.css">
    </head>
    <body>
        <div class="wrapper">
            <?php include "header.php" ?>
            <section class="sec-enroll">
                <div class="inner">
                    <form class="sec-enroll-form flex-col flex-start" method="POST" action="validate.php" enctype="multipart/form-data">
                        <h2 class="sec-enroll-form-ttl">
                            <?php if (isset($id)): ?>
                                Update Student
                            <?php else: ?>
                                Enroll Student
                            <?php endif; ?>
                        </h2>
                        <div class="sec-enroll-form-gp">
                            <?php if (!empty($image_url) && file_exists($image_url)): ?>
                                <img class="sec-enroll-form-img" src="<?php echo $image_url; ?>" alt="Student Image">
                            <?php endif; ?>
                            <input type=file name="image"> 
                            <span class="sec-enroll-form-error"><?php if (isset($error["image_error"])) echo $error["image_error"]; ?></span>
                        </div>
                        <div class="sec-enroll-form-gp">
                            <div class="flex-center">
                                <label>ID:</label>
                                <?php if (isset($id)): ?>
                                    <input type="number" name="id" value="<?php echo $id; ?>" readonly>
                                <?php else: ?>
                                    <input type="number" name="id" required>
                                <?php endif; ?>
                            </div>
                            <span class="sec-enroll-form-error"><?php if (isset($error["id_error"])) echo $error["id_error"]; ?></span> 
                        </div>
                        <div class="sec-enroll-form-gp">
                            <div class="flex-center">
                                <label>Name:</label> 
                                <input type="text" name="name" value="<?php if (isset($name)) echo $name; ?>" required>
                            </div>
                            <span class="sec-enroll-form-error"><?php if (isset($error["name_error"])) echo $error["name_error"]; ?></span> 
                        </div>
                        <div class="sec-enroll-form-gp">
                            <div class="flex-center">
                                <label>Age:</label> 
                                <input type="number" name="age" value="<?php if (isset($age)) echo $age; ?>" required>
                            </div>
                            <span class="sec-enroll-form-error"><?php if (isset($error["age_error"])) echo $error["age_error"]; ?></span> 
                        </div>
                        <div class="sec-enroll-form-gp">
                            <div class="flex-center">
                                <label>Gender:</label>
                                <input type="radio" name="gender" value="male" <?php if (isset($gender) && $gender==="male") echo "checked"; ?> required>Male
                                <input type="radio" name="gender" value="female" <?php if (isset($gender) && $gender==="female") echo "checked"; ?> required>Female
                                <input type="radio" name="gender" value="others" <?php if (isset($gender) && $gender==="others") echo "checked"; ?> required>Others
                            </div>
                            <span class="sec-enroll-form-error"><?php if(!empty($genderError)) echo $genderError ?></span> 
                        </div>
                        <button class="sec-enroll-form-btn" type="submit" name="submit">
                            <?php if (isset($id)): ?>
                                Update
                            <?php else: ?>
                                Enroll
                            <?php endif; ?>
                        </button>
                        <span class="sec-enroll-form-error"><?php if (isset($error["db_error"])) echo $error["db_error"]; ?></span>
                    </form>
                </div>
            </section> <!-- /.sec-enroll -->
        </div> <!-- /.wrapper -->
    </body>
</html>
<?php unset($_SESSION['error']); ?>