<html><head>
<link href="css/user_styles.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="js/user.js">
</script>
</head><body bgcolor="tan">

<center><b><font color = "brown" size="6">Online Polling System</font></b></center><br><br>
<div id="page">
<div id="header">
<h1>Student Registration </h1>
<div class="news"><marquee behavior="alternate">New polls are up and running. But they will not be up forever! Just Login and then go to Current Polls to vote for your favourate candidates. </marquee></div>
</div>
<div id="container">
<?php
require('connection.php');

if (isset($_POST['submit']))
{

$myFirstName = addslashes( $_POST['firstname'] ); 
$myLastName = addslashes( $_POST['lastname'] ); 
$myEmail = $_POST['email'];
$myPassword = $_POST['password'];

$newpass = md5($myPassword); 

$sql = mysqli_query($conn, "INSERT INTO tbMembers(first_name, last_name, email, password) VALUES ('$myFirstName','$myLastName', '$myEmail', '$newpass')" )
        or die( mysqli_error() );

die( "You have registered for an account.<br><br>Go to <a href=\"index.php\">Login</a>" );
}

echo "<center><h3>Register an account by filling in the needed information below:</h3></center><br><br>";
echo '<form action="registeracc.php" method="post" onsubmit="return registerValidate(this)">';
echo '<table align="center"><tr><td>';
echo "<tr><td>First Name:</td><td><input type='text' style='background-color:#999999; font-weight:bold;' name='firstname' maxlength='15' value=''></td></tr>";
echo "<tr><td>Last Name:</td><td><input type='text' style='background-color:#999999; font-weight:bold;' name='lastname' maxlength='15' value=''></td></tr>";
echo "<tr><td>Email Address:</td><td><input type='text' style='background-color:#999999; font-weight:bold;' name='email' maxlength='100' value=''></td></tr>";
echo "<tr><td>Password:</td><td><input type='password' style='background-color:#999999; font-weight:bold;' name='password' maxlength='15' value=''></td></tr>";
echo "<tr><td>Confirm Password:</td><td><input type='password' style='background-color:#999999; font-weight:bold;' name='ConfirmPassword' maxlength='15' value=''></td></tr>";
echo "<tr><td>&nbsp;</td><td><input type='submit' name='submit' value='Register Account'/></td></tr>";
echo "<tr><td colspan = '2'><p>Already have an account? <a href='index.php'><b>Login Here</b></a></td></tr>";
echo "</tr></td></table>";
echo "</form>";
?>
</div>
<div id="footer">
<div class="bottom_addr">&copy; 2017 Online Polling System. All Rights Reserved.</div>
</div>
</div>
</body></html>
