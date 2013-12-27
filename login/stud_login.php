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
			<legend>Student Login</legend>
			<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
			<table>
			<tr>
			<td>Registration No:</td><td><input type="text" name='regno'></td>
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
		$reg_no=$_REQUEST['regno'];
		$pwd=$_REQUEST['password'];
		if($res=$mysqli->query("select * from student where regno='$reg_no' and password='$pwd'")){
		if($res->fetch_assoc()){
			session_start();
			$_SESSION['reg_no']=$reg_no;
			header("Location:../home/student.php");
		}
		else
			header('Location:../login/stud_login.php');
		}
	}
?>