<?php
require_once '../../scripts/db_connection.php';
session_start();
?>
<!doctype html>
<html>
<head>
<title>Mess Management System</title>
<link rel="stylesheet" type="text/css" href="../../css.css">
</head>
<body>
	<header><h1>Mess Management System</h1></header>
		<div id='login'>
			<fieldset>
			<legend>Add Mess Menu</legend>
				<form action="<?php echo $_SERVER['PHP_SELF']?>" method='POST'>
					<table>
					<tr>
					<td>Date:</td><td><input type='date' name='date'></td>
					</tr>
					<tr>
					<td>Mess Type:</td>
					<td>
						<select name='messtype'>
							<option value='V' selected>Veg</option>
							<option value='NV'>Non Veg</option>
						</select>
					</td>
					</tr>
					<tr>
					<td>Breakfast:</td><td><textarea name='breakfast'></textarea></td>
					</tr>
					<tr>
					<td>Lunch:</td><td><textarea name='lunch'></textarea></td>
					</tr>
					<tr>
					<td>Snacks:</td><td><textarea name='snacks'></textarea></td>
					</tr>
					<tr>
					<td>Dinner:</td><td><textarea name='dinner'></textarea></td>
					</tr>
					<tr>
					<td></td><td><input type='submit' value='save'></td>
					</tr>
					</table>
				</form>
			</fieldset>
			</div>

<?php if($_SERVER['REQUEST_METHOD']=='POST'){
	$date=$_POST['date'];
	$messtype=$_POST['messtype'];
	$breakfast=$_POST['breakfast'];
	$lunch=$_POST['lunch'];
	$snacks=$_POST['snacks'];
	$dinner=$_POST['dinner'];
	$man_id=$_SESSION['manager_id'];
	if($mysqli->query("insert into mess_menu values('$date','$messtype','$breakfast','$lunch','$snacks','$dinner',$man_id)"))
		echo '<div style='.'margin-left:510px;font-size:30px'.'>Mess Menu saved sucessfully</div>';
	else
		echo '<div style='.'margin-left:510px;font-size:30px'.'>Mess Menu could not be saved</div>'.$mysqli->error;
}
?>