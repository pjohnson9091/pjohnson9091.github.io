<?php   
require('database.php');
function get_courses($instructor_id) {
    global $db;
    $query = 'SELECT course_name, course_id, courses_time, classroom, semester
              FROM instructor_courses
              WHERE instructor_id= :instructor_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':instructor_id', $instructor_id);
    $statement->execute();
    $courses = $statement->fetchAll();
    $statement->closeCursor();
    return $courses;
}



function get_instructor_lname($instructor_id) {
    global $db;
    $query = 'SELECT last_name FROM instructor_register
              WHERE  instructor_id= :instructor_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':instructor_id', $instructor_id);
    $statement->execute();
    $lname = $statement->fetch();
    $statement->closeCursor();
    return $lname;
}


?>