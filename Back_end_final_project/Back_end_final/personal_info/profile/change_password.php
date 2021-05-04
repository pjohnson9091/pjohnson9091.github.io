<?php 
require('../../model/register_db.php');
require('../../model/instructor_profile_db.php');
session_start(); 
$instructor_id = $_SESSION['instructor_id'];
$actual_opass = $_SESSION['pass'];


?>

<!DOCTYPE html>
<!-- Opening html tag -->
<html>
<!-- Opening head tag -->
<head>
<!-- Opening script tag -->
<script type="text/javascript">
// creatign a function which will valide the form
function validate()
{
// getting the element of opass field and storing it in em
var opass = document.f1.opass;
// getting the element of npass field and storing it in pass
var npass = document.f1.npass;
// getting the element of cnpass field and storing it in cpass
var cnpass = document.f1.cnpass;

// checks em value is empty if so then show alert, return focus to email field and return false
if(opass.value=='')
{
opass.focus();
alert("Please Enter Old Password");
return false;
}
// checks pass value is empty if so then show alert, return focus to password field and return false
else if(npass.value=='')
{
npass.focus();
alert("Please Enter New Password");
return false;
}
// checks id value is les than eight if so then show alert, return focus to pass field and return false
else if(npass.value.length<8)
{
npass.focus();
alert("Password must be more than 8 characters");
return false;
}
// checks cnpass value is not equal to npass value if so then show alert, return focus to cpass field and return false
else if(cnpass.value!=npass.value)
{
cnpass.focus();
alert("Confirm password does not match");
return false;
}
}
// Closing script tag
</script>
<!-- Closing head tag -->
</head>
<!-- Opening body tag -->
<body>
<!-- Opening form tag -->
<form name="f1" method="post" onsubmit="return validate()">
    <input type="hidden" name="action" value="change_password">
    
<!-- Opening table tag -->
<a href="index.php">Back</a>
<table>
<tr>
<td> <label for="opass">Old Password</label> </td>
<td> <input type="password" name="opass" value="" > </td>
</tr>
<tr>
<td> <label for="npass">New Password</label> </td>
<td> <input type="password" name="npass" value=""> </td>
</tr>
<tr>
<td> <label for="cnpass">Confirm New Password</label> </td>
<td> <input type="password" name="cnpass" value=""> </td>
</tr>
<tr>
<td colspan="2" align="right"> <input type="submit" name="submit" value="Submit"> </td>
</tr>
<!-- Closing table tag -->
</table>
<!-- Closing form tag -->
</form>
<!-- Opening php tag -->
<?php
// assign empty string to all variables
$opass = '';
$npass = '';
// checks if form is submitted or not
if(isset($_POST['submit']))
{
    $action = filter_input(INPUT_POST, 'action');
    if ($action == 'change_password') {
        $opass = filter_input(INPUT_POST, 'opass');
        $npass = filter_input(INPUT_POST, 'npass');
        if($actual_opass == $opass){

                update_password($instructor_id,$npass);
                // display output
                echo "<h2>You've entered</h2><hr>";
                ?>

                    <!-- Opening table tag -->

                   <table>
                   <tr>
                   <td> <label for="npass">New Password</label> </td>
                   <!-- Displaying password -->
                   <td><?php echo $npass ;?> </td>
                   </tr>

                   <!-- Closing table tag -->
                   </table>
                <?php

         }  
        else{
        echo "<h2>Entered Old Password does not match registered Password </h2><hr>";
        }
     }

?>

<?php
}
?>
<!-- Closing body tag -->
</body>
<!-- Closing html tag -->
</html>
