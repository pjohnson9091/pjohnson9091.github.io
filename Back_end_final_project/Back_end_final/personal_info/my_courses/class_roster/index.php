<?php 

session_start(); 

require('../../../model/student_db.php');
$course_id = $_SESSION['course_id'];
$roster = get_roster($course_id);

$action = filter_input(INPUT_POST, 'action');

include('class_roster.php'); 


if($action == 'update_grades' ){
     $student_id = $_POST['student_id'];
     $select = $_POST['final_letter_grade'];
             //filter_input(INPUT_POST,'final_letter_grade');
     //$select = 'work';
     update_grade($student_id, $course_id, $select);
     header('Location: .');
}

?>
