<?php
    function get_student_by_id(PDO $db, int $student_id) {
        $sql = "SELECT * FROM students WHERE student_id = :student_id";
        $stmt = $db->prepare($sql);
        $stmt->execute([":student_id" => $student_id]);
        $student = $stmt->fetch();
        return $student;
    }

    function get_all_students(PDO $db) {
        $sql = "SELECT * FROM students";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $students = $stmt->fetchAll();
        return $students;
    }

    function student_exists(PDO $db, int $student_id) {
        $sql = "SELECT COUNT(*) FROM students WHERE student_id = :student_id";
        $stmt = $db->prepare($sql);
        $stmt->execute([":student_id" => $student_id]);
        return $stmt->fetchColumn() > 0;
    }
?>