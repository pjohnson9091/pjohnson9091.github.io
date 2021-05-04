<?php 
require('../../model/courses_db.php');

session_start(); 
$instructor_id = $_SESSION['instructor_id'];
$_SESSION['instructor_id'] = $instructor_id;

$action = filter_input(INPUT_POST, 'action');
$courses = get_courses($instructor_id);
$instructor_lname = get_instructor_lname($instructor_id);

include('my_courses.php');

if($action == 'class_roster'){
    $course_id = filter_input(INPUT_POST, 'course_id');
    $_SESSION['course_id'] = $course_id;
    header('Location: class_roster?redirect=index.php');
}
?>
