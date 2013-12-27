<?php
require_once '../../scripts/db_connection.php';
session_start();
$reg=$_SESSION['reg_no'];
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
			$row=$mysqli->query("select * from mess_leave where regno='$reg'")->fetch_assoc();
			if(isset($row))
				echo "You have already requested mess leave from ".$row['fromdate']." to ".$row['todate']." on ".$row['dateofrequest'];
		?>
				<br>
		<table>
			<tr>
				<td>From Date: </td><td><input type='date' name='from'></td>
			</tr>
			<tr>
				<td>To Date: </td><td><input type='date' name='to'></td>
			</tr>
			<td></td><td><input type="submit" value='Request'></td>
		</table>
	</form>
	<?php
	if($_SERVER['REQUEST_METHOD']=='POST'){
		$from=$_POST['from'];
		$to=$_POST['to'];
		$today=date("y-m-d");
	if($mysqli->query("insert into mess_leave values('$reg','$from','$to','$today') on duplicate key update fromdate='$from',todate='$to',dateofrequest='$today'"))
			echo "Mess leave request accepted";
		else
			echo "Some error was encountered".$mysqli->error;
	}
	?>