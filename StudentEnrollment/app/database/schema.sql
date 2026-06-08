DROP DATABASE IF EXISTS banyaroo;

CREATE DATABASE banyaroo;

USE banyaroo;

DROP TABLE IF EXISTS students;

CREATE TABLE students (
	student_id INT,
    student_name VARCHAR(25) NOT NULL,
    age INT NOT NULL,
    gender ENUM('male', 'female', 'others') NOT NULL,
    image_url VARCHAR(100) NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NOT NULL,
    PRIMARY KEY (student_id)
);

INSERT INTO students (student_id, student_name, age, gender) VALUES 
(21370, 'Banyar Oo', 25, 'male'),
(21371, 'Lin Latt', 25, 'female');