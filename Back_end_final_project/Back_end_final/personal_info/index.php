<?php 
require('../model/register_db.php');

session_start(); 
$instructor_id = $_SESSION['instructor_id'];
$_SESSION['instructor_id'] = $instructor_id;

$fname = get_name($instructor_id)
?>
<main>
    <a href="../index.php">Logout</a>
    <nav>    
    <h2>Welcome <?php echo htmlspecialchars($fname['first_name']); ?></h2>
    <ul>
        <li><a href="profile/index.php">Profile</a></li>
        <li><a href="my_courses/index.php">My Courses</a></li>
    </ul>
    </nav>
</main>
