<?php
require('connection.php');

session_start();

if(empty($_SESSION['member_id'])){
 header("location:access-denied.php");
}
?>
<html><head>
<link href="css/user_styles.css" rel="stylesheet" type="text/css" />
</head><body bgcolor="tan">

<center><b><font color = "brown" size="6">Online Polling System</font></b></center><br><br>
<div id="page">
<div id="header">
<h1>STUDENT HOME </h1>
<a href="student.php">Home</a> | <a href="vote.php">Current Polls</a> | <a href="manage-profile.php">Manage My Profile</a> | <a href="logout.php">Logout</a>
</div>
<div id="container">
<p> Click a link above to do some stuff.</p>
</div>
<div id="footer">
<div class="bottom_addr">&copy; 2020 Online Polling System. All Rights Reserved.</div>
</div>
</div>
</body></html>
