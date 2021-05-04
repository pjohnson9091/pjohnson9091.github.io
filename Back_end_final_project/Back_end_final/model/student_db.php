<?php 
require('database.php');

function get_roster($course_id){
    global $db;
    $query = 'SELECT * FROM student_list 
            WHERE course_id = :course_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':course_id', $course_id);
    $statement->execute();
    $students = $statement->fetchAll();
    $statement->closeCursor();
    return $students;
    
    
}

function get_student_id($course_id) {
    global $db;
        $query = 'SELECT student_id FROM student_list 
            WHERE course_id = :course_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':course_id', $course_id);
    $statement->execute();
    $student_id = $statement->fetch();
    $statement->closeCursor();
    return $student_id;
}


function get_grade($course_id){
    global $db;
    $query = 'SELECT final_letter_grade FROM student_list 
            WHERE course_id = :course_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':course_id', $course_id);
    $statement->execute();
    $grade = $statement->fetchAll();
    $statement->closeCursor();
    return $grade;
}

function update_grade($student_id,$course_id, $updated_grade) {
    global $db;

    $query = 'UPDATE student_list
              SET final_letter_grade = :final_letter_grade
              WHERE student_id = :student_id AND course_id = :course_id' ;   
    $statement = $db->prepare($query);
    $statement->bindValue(':student_id', $student_id); 
    $statement->bindValue(':course_id', $course_id);  
    $statement->bindValue(':final_letter_grade', $updated_grade);
    $statement->execute();
    $statement->closeCursor();
}

?>