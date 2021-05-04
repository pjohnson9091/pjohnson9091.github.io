<?php 
require('database.php');

function get_profile($instructor_id){
    global $db;
    $query = 'SELECT * FROM instructor_profile
              WHERE instructor_id= :instructor_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':instructor_id', $instructor_id);
    $statement->execute();
    $courses = $statement->fetchAll();
    $statement->closeCursor();
    return $courses;
    
}

function get_email($instructor_id) {
    global $db;
    $query = 'SELECT email FROM instructor_register
              WHERE  instructor_id= :instructor_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':instructor_id', $instructor_id);
    $statement->execute();
    $email = $statement->fetch();
    $statement->closeCursor();
    return $email;
}

function update_password($instructor_id,$npass) {
    global $db;

    $query = 'UPDATE instructor_register
              SET user_password = :user_password
              WHERE instructor_id = :instructor_id';    
    
    $statement = $db->prepare($query);
    $statement->bindValue(':user_password', $npass); 
    $statement->bindValue(':instructor_id', $instructor_id);     
    $statement->execute();
    $statement->closeCursor();
}

?>