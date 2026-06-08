<?php 
    session_start(); 

    require_once "db.php";
    require_once "helper.php";

    try {
        $students = get_all_students($db);
    } catch(PDOException $e) {
        die("Fetching students failed: " . $e->getMessage());
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="UCSY Website">
        <meta name="viewport" content="width=device-width, initial-scale=1">        
        <title>Students | UCSY</title>
        <link rel="stylesheet" type="text/css" href="./css/reset.css">
        <link rel="stylesheet" type="text/css" href="./css/style.css">
        <link rel="stylesheet" type="text/css" href="./css/students.css">
    </head>
    <body>
        <div class="wrapper">
            <?php include "header.php" ?>
            <main>
                <section class="sec-studs">
                    <div class="inner">
                        <a class="sec-studs-add" href="form.php">Add Students</a>
                        <table>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Age</th>
                                <th>Gender</th>
                                <th>Image Url</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                            <?php foreach($students as $student) { ?>
                            <tr>
                                <td><?php echo $student->student_id ?></td>
                                <td><?php echo $student->student_name ?></td>
                                <td><?php echo $student->age ?></td>
                                <td><?php echo $student->gender ?></td>
                                <td><?php if(empty($student->image_url)) echo '-'; else echo $student->image_url ?></td>
                                <td><?php echo $student->created_at ?></td>
                                <td><?php echo $student->updated_at ?></td>
                                <td><a href="form.php?id=<?php echo $student->student_id ?>">Update</a></td>
                                <td>
                                <form action="delete.php" method="POST" onsubmit="return confirm('Are you sure you want to delete this student?');">
                                    <input type="hidden" name="id" value="<?php echo $student->student_id; ?>">
                                    <input type="hidden" name="image_url" value="<?php echo $student->image_url; ?>">
                                    <button type="submit" class="sec-studs-del-btn">Delete</button>
                                </form>
                                </td>
                            </tr>
                            <?php } ?>
                        </table>
                        <?php
                            if (isset($_SESSION["success"]) && $_SESSION["success"]) {
                                echo "<p class='sec-studs-success'>" . $_SESSION["success"] . "</p>";
                            } 
                            
                            if (isset($_SESSION["error"]) && $_SESSION["error"]) {
                                echo "<p class='.sec-studs-error'>" . $_SESSION["error"] . "</p>";
                            }
                        ?>
                    </div>
                </section> <!-- /.sec-studs -->
            </main>
        </div> <!-- /.wrapper -->
    </body>
</html>
<?php unset($_SESSION["success"], $_SESSION["error"]); ?>