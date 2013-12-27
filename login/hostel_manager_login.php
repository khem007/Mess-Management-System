<?php
require_once '../scripts/db_connection.php';
?>
<!doctype html>
<html>
<head>
<title>Mess Management System</title>
<link rel="stylesheet" type="text/css" href="../css.css">
</head>
<body>
	<header><h1>Mess Management System</h1></header>
	<div id='login'>
		<fieldset>
			<legend>Hostel Manager Login</legend>
			<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
			<table>
			<tr>
			<td>Manager ID:</td><td><input type="text" name='username'></td>
			</tr>
			<tr>
			<td>Password:</td><td><input type="password" name='password'></td>
			</tr>
			<tr>
			<td></td><td><input type="submit" value='login'></td>
			</tr>
			</table>
			</form>
		</fieldset>
		</div>
<?php
	if($_SERVER['REQUEST_METHOD']=='POST'){
		$manager_id=$_REQUEST['username'];
		$pwd=$_REQUEST['password'];
		if($res=$mysqli->query("select * from hostelmanager where manager_id='$manager_id' and password='$pwd'")){
		if($res->fetch_assoc()){
			session_start();
			$_SESSION['manager_id']=$manager_id;
			header("Location:../home/hostel_manager.php");
		}
		else
			header('Location:../login/hostel_manager_login.php');
		}
	}
?>