<?php

require('../model/register_db.php');
// Start the session -  This must be written before any html tag
session_start();

 include('login.php');
// Check whether the request method is get or post
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // Store the passed information -instructor_id, password into variables.

        $instructor_id=$_POST['instructor_id'];

        $user_password=$_POST['password'];
        
        $actual_password= get_password($instructor_id);
            
        //Check the passed information with the actual credentials
        if($actual_password != false){
            if(($user_password===htmlspecialchars($actual_password['user_password'])))
            
            {
                $_SESSION['instructor_id'] = $instructor_id;
                //If the information is correct redirects to the personal instructor page
                header('Location: ../personal_info?redirect=index.php');
            }
        }
        else

        {
            //  if the credentials doesn't match then first clear the values stored in the session
            // if any and then distroy the session
            session_unset();

            session_destroy();

            // Alert the user that the credentials are incorrect.

            echo"<script>alert('invald id or password')</script>";
        }
      }

?>
