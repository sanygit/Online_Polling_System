<?php
session_start();
require('../connection.php');

if(empty($_SESSION['admin_id'])){
 header("location:access-denied.php");
}

$result=mysqli_query($conn, "SELECT * FROM tbPositions")
or die("There are no records to display ... \n" . mysql_error());
if (mysqli_num_rows($result)<1){
    $result = null;
}
?>
<?php

if (isset($_POST['Submit']))
{

$newPosition = addslashes( $_POST['position'] ); 

$sql = mysqli_query($conn, "INSERT INTO tbPositions(position_name) VALUES ('$newPosition')" )
        or die("Could not insert position at the moment". mysqli_error() );


 header("Location: positions.php");
}
?>
<?php

 if (isset($_GET['id']))
 {

 $id = $_GET['id'];


 $result = mysqli_query($conn, "DELETE FROM tbPositions WHERE position_id='$id'")
 or die("The position does not exist ... \n");


 header("Location: positions.php");
 }
 else


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Administration Control Panel:Positions</title>
<link href="css/admin_styles.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="js/admin.js">
</script>
</head>
<body bgcolor="tan">
<center><b><font color = "brown" size="6">Online Polling System</font></b></center><br><br>
<div id="page">
<div id="header">
  <h1>MANAGE POSITIONS</h1>
  <a href="admin.php">Home</a> | <a href="manage-admins.php">Manage Administrators</a> | <a href="positions.php">Manage Positions</a> | <a href="candidates.php">Manage Candidates</a> | <a href="refresh.php">Poll Results</a> | <a href="logout.php">Logout</a>
</div>
<div id="container">
<table width="380" align="center">
<CAPTION><h3>ADD NEW POSITION</h3></CAPTION>
<form name="fmPositions" id="fmPositions" action="positions.php" method="post" onsubmit="return positionValidate(this)">
<tr>
    <td>Position Name</td>
    <td><input type="text" name="position" /></td>
    <td><input type="submit" name="Submit" value="Add" /></td>
</tr>
</table>
<hr>
<table border="0" width="420" align="center">
<CAPTION><h3>AVAILABLE POSITIONS</h3></CAPTION>
<tr>
<th>Position ID</th>
<th>Position Name</th>
</tr>

<?php

while ($row=mysqli_fetch_array($result)){
echo "<tr>";
echo "<td>" . $row['position_id']."</td>";
echo "<td>" . $row['position_name']."</td>";
echo '<td><a href="positions.php?id=' . $row['position_id'] . '">Delete Position</a></td>';
echo "</tr>";
}
mysqli_free_result($result);
mysqli_close($conn);
?>
</table>
<hr>
</div>
<div id="footer">
  <div class="bottom_addr">&copy; 2020 Online Polling System. All Rights Reserved.</div>
</div>
</div>
</body>
</html>
