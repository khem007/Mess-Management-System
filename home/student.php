<?php
require_once '../scripts/db_connection.php';
session_start();
?>
<!doctype html>
<html>
<head>
<title>Mess Management System</title>
<link rel="stylesheet" type="text/css" href="../css.css">
</head>
<body>
	<header><h1>Mess Management System</h1></header>
	<aside>
		<a href='stud/view_bill.php'>View Bill</a><br>
		<a href='stud/mess_change.php'>Change Mess</a><br>
		<a href='stud/mess_leave.php'>Mess Leave</a><br>
		<a href='stud/review.php'>Review Food</a><br>
	</aside>
	<?php
		if(isset($_GET['date']))
			$date=$_GET['date'];
		else
		$date=date("y/m/d");
		$res=$mysqli->query("select * from mess_menu where date='$date'");
		if($row=$res->fetch_assoc()){
			$breakfast=$row['breakfast'];
			$lunch=$row['lunch'];
			$snacks=$row['snacks'];
			$dinner=$row['dinner'];
			?>
	<input style="margin-left:270px;margin-top:80px;" type="date" name='date' onchange="window.location.href='student.php?date='+value">
	<table class='table1'>
	<thead>
		<tr>
			<th scope='col'>Slot</th>
			<th scope='col'>Menu</th>
		</tr>
	</thead>
	<tbody>
			<tr>
			<td>Breakfast:</td><td><?php echo $breakfast?></td>
			</tr>
			<tr>
			<td>Lunch:</td><td><?php echo $lunch?></td>
			</tr>
			<tr>
			<td>Snacks:</td><td><?php echo $snacks?></td>
			</tr>
			<tr>
			<td>Dinner:</td><td><?php echo $dinner?></td>
			</tr>
			</tbody>
	</table>

			<?php
		}
		else
			echo '<div style='.'margin-left:510px;font-size:30px'.'>data not available for the given day</div>';
	?>