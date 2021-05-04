-- Create the Instructor database
DROP DATABASE IF EXISTS instructor;
CREATE DATABASE instructor;
USE instructor;

CREATE TABLE instructor_register (
first_name varchar(50) NOT NULL,
last_name varchar(50) NOT NULL,
gender varchar(6) NOT NULL,
email varchar(50) NOT NULL,
instructor_id int NOT NULL ,
user_password varchar(20) NOT NULL,
PRIMARY KEY (instructor_id)
);

INSERT INTO instructor_register VALUES
('Allice', 'Diaz', 'female' , 'adiaz@university.edu', 10 , 'testtest'),
('Andrew', 'Kyle', 'male' , 'akyle@university.edu', 11, 'testtest'),
('Gunter', 'Masters', 'male', 'gmasters@university.edu', 12, 'testtest'),
('Gina', 'Alexander', 'female', 'galexander@university.edu', 13, 'testtest');

CREATE TABLE instructor_profile (
first_name varchar(50) NOT NULL,
last_name varchar(50) NOT NULL,
instructor_id int,
birthdate date NOT NULL,
gender varchar(6) NOT NULL,
PRIMARY KEY (instructor_id),
FOREIGN KEY (instructor_id) REFERENCES instructor_register(instructor_id)
);

INSERT INTO instructor_profile VALUES
('Allice', 'Diaz', 10, '1980-11-06','female'),
('Andrew', 'Kyle', 11, '1972-05-16','male'),
('Gunter', 'Masters', 12, '1969-08-20', 'male'),
 ('Gina', 'Alexander', 13, '1976-09-25', 'female');

CREATE TABLE instructor_courses (
course_name varchar(50) NOT NULL,
course_id int NOT NULL,
instructor_id int,
courses_time varchar(50) NOT NULL,
classroom varchar(50) NOT NULL,
semester varchar(50) NOT NULL,
PRIMARY KEY (course_id, instructor_id),
FOREIGN KEY (instructor_id) REFERENCES instructor_register(instructor_id)
);


INSERT INTO instructor_courses VALUES
('Calculus 1', 71405, 12, 'MW 12:00-1:15', 'GOODYN 318GH', 'spring21'),
('History 1010', 82450, 10, 'TTH 9:30-10:45', 'GOODYN 210GH', 'spring21'),
('English 1010', 65450, 11, 'MW 2:30 - 3:45', 'GOODYN 110GH', 'spring21'),
('Intro to Comp. Science', 95250, 13, 'TTH 12:00-1:15', 'GOODYN 218GH', 'spring21');

CREATE TABLE student_list (
first_name varchar(50) NOT NULL,
last_name varchar(50) NOT NULL,
student_id int NOT NULL AUTO_INCREMENT,
course_id int,
final_letter_grade char(1) NOT NULL,
PRIMARY KEY (student_id),
FOREIGN KEY (course_id) REFERENCES instructor_courses(course_id)
);

INSERT INTO student_list VALUES
('Steve', 'Mahan', 10, 71405, 'A'),
('Anna', 'Lawley', 11, 82450, 'C'),
('Will' , 'Evans', 12, 65450, 'D'),
('Kyle' , 'Baker', 13, 95250, 'B');

-- Create a user named instructor_user
CREATE USER instructor_user@localhost IDENTIFIED BY 'pa55word';
GRANT SELECT, INSERT, UPDATE, DELETE
ON *
TO instructor_user@localhost;
