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
			<legend>Add Hostel Manager</legend>
				<form action="<?php echo $_SERVER['PHP_SELF']?>" method='POST'>
					<table>
					<tr>
					<td>First Name:</td><td><input type='text' name='fname'></td>
					</tr>
					<tr>
					<td>Last Name:</td><td><input type='text' name='lname'></td>
					</tr>
					<tr>
					<td>Password:</td><td><input type='password' name='pwd'></td>
					</tr>
					<tr>
					<td>Reenter Password:</td><td><input type='password' name='repwd'></td>
					</tr>
					<tr>
					<td></td><td><input type='submit' value='register'></td>
					</tr>
					</table>
				</form>
			</fieldset>
			</div>
<?php if($_SERVER['REQUEST_METHOD']=='POST'){
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$pwd=$_POST['pwd'];
	$repwd=$_POST['repwd'];
	$man_id=$_SESSION['manager_id'];
	if($pwd==$repwd&&$mysqli->query("insert into hostelmanager(password,first_name,last_name,man_id) values('$pwd','$fname','$lname',$man_id)")){
		echo '<div style='.'margin-left:510px;font-size:30px'.'>admin added sucessfully</div>';
	}
	else echo '<div style='.'margin-left:510px;font-size:30px'.'>admin could not be created<br>'.$mysqli->error.'</div>';
}
?>