<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Simple PHP Polling System Access Denied</title>
<link href="css/user_styles.css" rel="stylesheet" type="text/css" />
</head>
<body bgcolor="tan">

<center><b><font color = "brown" size="6">Online Polling System</font></b></center><br><br>
<body>
<div id="page">
<div id="header">
<h1>Invalid Credentials Provided </h1>
<p align="center">&nbsp;</p>
</div>
<div id="container">
<?php
ini_set ("display_errors", "1");
error_reporting(E_ALL);

ob_start();
session_start();
require('connection.php');



$myusername=$_POST['myusername'];
$mypassword=$_POST['mypassword'];

$encrypted_mypassword=md5($mypassword); 

$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);


$sql="SELECT * FROM tbmembers WHERE email='$myusername' and password='$encrypted_mypassword'";
$result=mysqli_query($conn, $sql) or die(mysql_error());


$count=mysqli_num_rows($result);


if($count==1){

$user = mysqli_fetch_assoc($result);
$_SESSION['member_id'] = $user['member_id'];
header("location:student.php");
}

else {
echo "Wrong Username or Password<br><br>Return to <a href=\"index.php\">login</a>";
}

ob_end_flush();

?>
</div>
<div id="footer">
  <div class="bottom_addr">&copy; 2020 Online Polling System. All Rights Reserved.</div>
</div>
</div>
</body>
</html>
