<?php 
require('../../model/instructor_profile_db.php');
require('../../model/register_db.php');

session_start(); 
$instructor_id = $_SESSION['instructor_id'];
$_SESSION['instructor_id'] = $instructor_id;

$action = filter_input(INPUT_POST, 'action');
$profile = get_profile($instructor_id);
$email = get_email($instructor_id);
$pass = get_password($instructor_id);
        
include('profile.php');        
    

if($action == 'pass'){
    $pass = filter_input(INPUT_POST, 'pass');
    $_SESSION['pass'] = $pass;
    header('Location: change_password.php');
}
?>

