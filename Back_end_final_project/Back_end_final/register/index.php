

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
// getting element of fname field and storing it in fname
var fname = document.f1.fname;
// getting element of lname field and storing it in fname
var lname = document.f1.lname;
// getting the first element of gen field and storing it in gm
var gm = document.f1.gen[0];
// getting the second element of gen field and storing it in gf
var gf = document.f1.gen[1];
// getting the element of id field and storing it in id
var id = document.f1.id;

var bd = document.f1.birth;
// getting the element of email field and storing it in em
var em = document.f1.email;
// getting the element of pass field and storing it in pass
var pass = document.f1.pass;
// getting the element of cpass field and storing it in cpass
var cpass = document.f1.cpass;

// checks fname value is empty if so then show alert, return focus to fname field and return false
if(fname.value=='')
{
fname.focus();
alert("Please Enter Name");
return false;
}
// checks fname value is not a number if so then show alert, return focus to fname field and return false
else if(!isNaN(fname.value))
{
fname.focus();
alert("Please Enter Valid Name");
return false;
}

// checks fname value is empty if so then show alert, return focus to fname field and return false
if(lname.value=='')
{
lname.focus();
alert("Please Enter Name");
return false;
}
// checks fname value is not a number if so then show alert, return focus to fname field and return false
else if(!isNaN(lname.value))
{
lname.focus();
alert("Please Enter Valid Name");
return false;
}
// checks gm and gf is not checked if so then show alert, return false
else if(gm.checked==false && gf.checked==false ) {
alert("Plese select gender");
return false;
}
// checks id value is empty if so then show alert, return focus to id field and return false
else if(id.value=='')
{
id.focus();
alert("Please Enter Id");
return false;
}
else if(isNaN(id.value))
{
id.focus();
alert("Please Enter Valid id");
return false;
}

else if(bd.value=='')
{
bd.focus();
alert("Please Enter Birthday");
return false;
}
// checks em value is empty if so then show alert, return focus to email field and return false
else if(em.value=='')
{
em.focus();
alert("Please Enter email");
return false;
}
// checks pass value is empty if so then show alert, return focus to password field and return false
else if(pass.value=='')
{
pass.focus();
alert("Please Enter password");
return false;
}
// checks id value is les than eight if so then show alert, return focus to pass field and return false
else if(pass.value.length<8)
{
pass.focus();
alert("Password must be more than 8 characters");
return false;
}
// checks cpass value is not equal to pass value if so then show alert, return focus to cpass field and return false
else if(cpass.value!=pass.value)
{
cpass.focus();
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
<form action="index.php" name="f1" method="post" onsubmit="return validate()">
    <input type="hidden" name="action" value="register_instruct">
    
<!-- Opening table tag -->
<a href="../index.php">Home</a>
<table>
<tr>
<td><label for="fname">First Name</label> </td>
<td><input type="text" name="fname"> </td>
</tr>
<tr>
<td><label for="lname">Last Name</label> </td>
<td><input type="text" name="lname"> </td>
</tr>
<tr>
<td> <label for="gen">Gender</label> </td>
<td> <input type="radio" name="gen" value="male">Male
<input type="radio" name="gen" value="female">Female
</td>
</tr>
<tr>
<td> <label for="id">id</label> </td>
<td> <input type="text" name="id" value=""> </td>
</tr>
<tr>
<td> <label for="birth">Birthday</label> </td>
<td> <input type="text" name="birth" > </td>
<td> <label class="message">Use 'yyyy-mm-dd' format</label><br></td>
</tr>
<tr>
<td> <label for="email">Email</label> </td>
<td> <input type="email" name="email" value="" > </td>
</tr>
<tr>
<td> <label for="pass">Password</label> </td>
<td> <input type="password" name="pass" value=""> </td>
</tr>
<tr>
<td> <label for="cpass">Confirm Password</label> </td>
<td> <input type="password" name="cpass" value=""> </td>
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
require('../model/register_db.php');
// assign empty string to all variables
$fname ='';
$lname ='';
$gen = '';
$id = '';
$birth = '';
$email = '';
$pass = '';
// checks if form is submitted or not
if(isset($_POST['submit']))
{
    $action = filter_input(INPUT_POST, 'action');
    if ($action == 'register_instruct') {
    $fname = filter_input(INPUT_POST, 'fname');
    $lname = filter_input(INPUT_POST, 'lname');
    $gen = filter_input(INPUT_POST, 'gen');
    $birth = filter_input(INPUT_POST, 'birth');
    $email = filter_input(INPUT_POST, 'email');
    $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
    $pass = filter_input(INPUT_POST, 'pass');
    
    register_instruct($fname, $lname, $gen, $email, $id, $pass );
    register_in_profile($fname, $lname, $id, $gen, $birth);
    }
// display output
echo "<h2>You've entered</h2><hr>";
?>
<!-- Opening table tag -->

<table>

<tr>
<td><label for="fname">First Name</label> </td>
<!-- Displaying name -->
<td><?php echo $fname ;?> </td>
</tr>
<tr>
<td><label for="lname">Last Name</label> </td>
<!-- Displaying name -->
<td><?php echo $lname ;?> </td>
</tr>
<tr>
<td> <label for="gen">Gender</label> </td>
<!-- Displaying gen-->
<td><?php echo $gen ;?> </td>
</tr>
<tr>
<td> <label for="id">id</label> </td>
<!-- Displaying id -->
<td><?php echo $id ;?> </td>
</tr>
<tr>
<td><label for="birth">Birthday</label> </td>
<!-- Displaying name -->
<td><?php echo $birth ;?> </td>
</tr>
<tr>
<td> <label for="email">Email</label> </td>
<!-- Displaying email -->
<td><?php echo $email ;?> </td>
</tr>
<tr>
<td> <label for="pass">Password</label> </td>
<!-- Displaying password -->
<td><?php echo $pass ;?> </td>
</tr>

<!-- Closing table tag -->
</table>
<?php
}
?>
<!-- Closing body tag -->
</body>
<!-- Closing html tag -->
</html>