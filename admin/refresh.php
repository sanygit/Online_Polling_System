<?php
require('../connection.php');

if (isset($_POST['Submit'])){

  $position = addslashes( $_POST['position'] );

    $results = mysqli_query($conn, "SELECT * FROM tbCandidates where candidate_position='$position'");

    $row1 = mysqli_fetch_array($results); 
    $row2 = mysqli_fetch_array($results); 
      if ($row1){
      $candidate_name_1=$row1['candidate_name']; 
      $candidate_1=$row1['candidate_cvotes']; 
      }

      if ($row2){
      $candidate_name_2=$row2['candidate_name']; 
      $candidate_2=$row2['candidate_cvotes']; 
      }
}
    else
       
?>
<?php

$positions=mysqli_query($conn, "SELECT * FROM tbPositions")
or die("There are no records to display ... \n" . mysql_error());
?>
<?php
session_start();

if(empty($_SESSION['admin_id'])){
 header("location:access-denied.php");
}
?>

<?php if(isset($_POST['Submit'])){$totalvotes=$candidate_1+$candidate_2;} ?>

<html><head>
<link href="css/admin_styles.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="js/admin.js">
</script>
</head><body bgcolor="tan">
<center><b><font color = "brown" size="6">Online Polling System</font></b></center><br><br>
<div id="page">
<div id="header">
<h1>POLL RESULTS </h1>
<a href="admin.php">Home</a> | <a href="manage-admins.php">Manage Administrators</a> | <a href="positions.php">Manage Positions</a> | <a href="candidates.php">Manage Candidates</a> | <a href="refresh.php">Poll Results</a> | <a href="logout.php">Logout</a>
</div>
<div id="container">
<table width="420" align="center">
<form name="fmNames" id="fmNames" method="post" action="refresh.php" onSubmit="return positionValidate(this)">
<tr>
    <td>Choose Position</td>
    <td><SELECT NAME="position" id="position">
    <OPTION VALUE="select">select
    <?php
  
    while ($row=mysqli_fetch_array($positions)){
    echo "<OPTION VALUE=$row[position_name]>$row[position_name]";
 
    }
    ?>
    </SELECT></td>
    <td><input type="submit" name="Submit" value="See Results" /></td>
</tr>
<tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
</tr>
</form>
</table>
<?php if(isset($_POST['Submit'])){echo $candidate_name_1;} ?>:<br>
<img src="images/candidate-1.gif"
width='<?php if(isset($_POST['Submit'])){ if ($candidate_2 || $candidate_1 != 0){echo(100*round($candidate_1/($candidate_2+$candidate_1),2));}} ?>'
height='20'>
<?php if(isset($_POST['Submit'])){ if ($candidate_2 || $candidate_1 != 0){echo(100*round($candidate_1/($candidate_2+$candidate_1),2));}} ?>% of <?php if(isset($_POST['Submit'])){echo $totalvotes;} ?> total votes
<br>votes <?php if(isset($_POST['Submit'])){ echo $candidate_1;} ?>
<br>
<br>
<?php if(isset($_POST['Submit'])){ echo $candidate_name_2;} ?>:<br>
<img src="images/candidate-2.gif"
width='<?php if(isset($_POST['Submit'])){ if ($candidate_2 || $candidate_1 != 0){echo(100*round($candidate_2/($candidate_2+$candidate_1),2));}} ?>'
height='20'>
<?php if(isset($_POST['Submit'])){ if ($candidate_2 || $candidate_1 != 0){echo(100*round($candidate_2/($candidate_2+$candidate_1),2));}} ?>% of <?php if(isset($_POST['Submit'])){echo $totalvotes;} ?> total votes
<br>votes <?php if(isset($_POST['Submit'])){ echo $candidate_2;} ?>
</div>
<div id="footer">
<div class="bottom_addr">&copy; 2020 Online  Polling System. All Rights Reserved.</div>
</div>
</div>
</body></html>
