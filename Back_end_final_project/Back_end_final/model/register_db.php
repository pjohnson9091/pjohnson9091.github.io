<?php

require('database.php');
function register_instruct($fname, $lname, $gen, $email, $id, $pass ) {
    global $db;
    $query = 'INSERT INTO instructor_register
                 (first_name, last_name, gender , email, 
                 instructor_id, user_password)
              VALUES
                 (:first_name, :last_name, :gender , :email, 
                 :instructor_id, :user_password)';
    $statement = $db->prepare($query);
    $statement->bindValue(':first_name', $fname);
    $statement->bindValue(':last_name', $lname);
    $statement->bindValue(':gender', $gen);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':instructor_id', $id);
    $statement->bindValue(':user_password', $pass);
    $statement->execute();
    $statement->closeCursor();
}

function register_in_profile($fname, $lname, $id, $gen, $birth) {
    global $db;
    $query = 'INSERT INTO instructor_profile
                 (first_name, last_name,instructor_id, gender, birthdate)
              VALUES
                 (:first_name, :last_name,:instructor_id, :gender, :birthdate)';
    $statement = $db->prepare($query);
    $statement->bindValue(':first_name', $fname);
    $statement->bindValue(':last_name', $lname);
    $statement->bindValue(':instructor_id', $id);
    $statement->bindValue(':gender', $gen);
    $statement->bindValue(':birthdate', $birth);
    $statement->execute();
    $statement->closeCursor();
}

function get_password($instructor_id) {
    global $db;
    $query = 'SELECT user_password FROM instructor_register
              WHERE  instructor_id= :instructor_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':instructor_id', $instructor_id);
    $statement->execute();
    $pass = $statement->fetch();
    $statement->closeCursor();
    return $pass;
}

function get_name($instructor_id){
    global $db;
    $query = 'SELECT first_name FROM instructor_register
              WHERE instructor_id = :instructor_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':instructor_id', $instructor_id);
    $statement->execute();
    $fname = $statement->fetch();
    $statement->closeCursor();
    return $fname;
}

?>