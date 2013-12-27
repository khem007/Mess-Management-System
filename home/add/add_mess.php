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
			<legend>Add Mess</legend>
				<form action="<?php echo $_SERVER['PHP_SELF']?>" method='POST'>
					<table>
					<tr>
					<td>Mess code:</td><td><input type='text' name='messcode'></td>
					</tr>
					<tr>
					<td>Caterer Name:</td><td><input type='text' name='caterer'></td>
					</tr>
					<tr>
					<td>Mess Manager Name:</td><td><input type='text' name='manager'></td>
					</tr>
					<td>Password:</td><td><input type='password' name='pwd'></td>
					</tr>
					<tr>
					<td>Reenter Password:</td><td><input type='password' name='repwd'></td>
					</tr>
					<tr>
					<td>Contact no.:</td><td><input type='text' name='contact'></td>
					</tr>
					<tr>
					<td>Mess Type:</td>
					<td style="font-size:1.2em;">
						<input type='checkbox' name='mess[]' id='NV' value='NV'><label for='NV'>North Indian Veg Mess</label><br>
						<input type='checkbox' name='mess[]' id='NNV' value='NNV'><label for='NNV'>North Indian Non Veg Mess</label><br>
						<input type='checkbox' name='mess[]' id='SV' id='NV' value='SV'><label for='SV'>South Indian Veg Mess</label><br>
						<input type='checkbox' name='mess[]' id='SNV' value='SNV'><label for='SNV'>South Indian Non Veg Mess</label><br>
					</td>
					</tr>
					<tr>
					<td></td><td><input type='submit' value='register'></td>
					</tr>
					</table>
				</form>
			</fieldset>
			</div>
<?php if($_SERVER['REQUEST_METHOD']=='POST'){
	$id=$_POST['messcode'];
	$caterer=$_POST['caterer'];
	$manager=$_POST['manager'];
	$contact=$_POST['contact'];
	$man_id=$_SESSION['manager_id'];
	$pwd=$_POST['pwd'];
	$repwd=$_POST['repwd'];
	if(isset($_POST['mess'])) $mess = $_POST['mess'];
	if($pwd=$repwd&&isset($_POST['mess'])&&$mysqli->query("insert into mess values('$id','$pwd','$caterer','$manager',$contact,$man_id)")){
		for($i=0;$i<count($mess);$i++)
			$mysqli->query("insert into mess_type values('$id','$mess[$i]')");
		echo '<div style='.'margin-left:510px;font-size:30px'.'>Mess info saved sucessfully</div>';
	}
	elseif(!isset($_POST['mess'])){
		echo '<div style='.'margin-left:510px;font-size:30px'.'>You have not selected any mess type</div>';
	}
	else echo '<div style='.'margin-left:510px;font-size:30px'.'>student info could not be saved<br>'.$mysqli->error.'</div>';
}
?>