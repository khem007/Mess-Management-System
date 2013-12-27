<?php
require_once '../../scripts/db_connection.php';
session_start();
$reg=$_SESSION['reg_no'];
$date=date("y/m/d");
if($date)
?>
<!doctype html>
<html>
<head>
<title>Mess Management System</title>
<link rel="stylesheet" type="text/css" href="../../css.css">
</head>
<body>
	<header><h1>Mess Management System</h1></header>
	<aside>
		<span>Welcome, <?php $row=$mysqli->query("select name from student where regno='$reg'")->fetch_assoc();
		echo $row['name']?></span>
		<br>
		<a href='view_bill.php'>View Bill</a><br>
		<a href='mess_change.php'>Change Mess</a><br>
		<a href='mess_leave.php'>Mess Leave</a><br>
		<a href='review.php'>Review Food</a><br>
	</aside>
	<form style="margin-top:200px;margin-left:600px;" method="POST" action="<?php echo $_SERVER['PHP_SELF']?>">
	<?php
$row=$mysqli->query("select * from mess_change where regno='$reg'")->fetch_assoc();
if(isset($row))
	echo "You have already requested a mess change from ".$row['oldmessid']." to ".$row['newmessid']." on ".$row['date'];
	?>
	<br>
	Select new Mess: <select name='newmess'>
	<?php
		$res=$mysqli->query("select messid,caterer from mess where messid not in(select messid from student where regno='$reg')");
		while($row=$res->fetch_assoc())
			echo "<option value=".$row['messid'].">".$row['caterer']."</option>";
	?>
	</select>
	<input type="submit" value='change'>
	</form>
	<?php if($_SERVER['REQUEST_METHOD']=='POST'){
		$new=$_POST['newmess'];
		$old=$mysqli->query("select messid from student where regno='$reg'")->fetch_assoc()['messid'];
		if($mysqli->query("insert into mess_change values('$reg','$old','$new','$date') on duplicate key update newmessid='$new',date='$date'"))
			echo '<div style='.'margin-left:510px;font-size:30px'.'>Mess change request submitted successfully</div>';
		else
			echo '<div style='.'margin-left:510px;font-size:30px'.'>Something went wrong</div>';
	}
	?>