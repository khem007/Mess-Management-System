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
			<legend>Add Student</legend>
				<form action="<?php echo $_SERVER['PHP_SELF']?>" method='post'>
					<table>
					<tr>
					<td>Name:</td><td><input type='text' name='name'></td>
					</tr>
					<tr>
					<td>Reg No:</td><td><input type='text' name='regno'></td>
					</tr>
					<tr>
					<td>Password:</td><td><input type='password' name='pwd'></td>
					</tr>
					<tr>
					<td>Reenter Password:</td><td><input type='password' name='repwd'></td>
					</tr>
					<tr>
					<td>Block:</td><td><input type='text' name='block'></td>
					</tr>
					<tr>
					<td>Room No:</td><td><input type='text' name='roomno'></td>
					</tr>
					<tr>
					<td>Caterer's name:</td>
					<td>
						<select name='messid[]'>
						<?php
						$res=$mysqli->query("select messid,caterer from mess");
						while($row=$res->fetch_assoc())
							echo "<option value=".$row['messid'].">".$row['caterer']."</option><br>";
						?>
						</select>
					</td>
					</tr>
					<tr>
					<td>Mess Type:</td>
					<td>
						<select name='indian'>
						<option value='N' selected>North Indian</option>
						<option value='S'>South Indian</option>
						</select>
						<Select name='messtype'>
							<option value='V' selected>Veg-Mess</option>
							<option value='NV'>Non-Veg-Mess</option>
						</Select>
					</td>
					</tr>
					<tr>
					<td></td><td><input type='submit' value='register'></td>
					</tr>
					</table>
				</form>
			</fieldset>
			</div>
<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
	$name=$_POST['name'];
	$regno=$_POST['regno'];
	$block=$_POST['block'];
	$roomno=$_POST['roomno'];
	$messid=$_POST['messid'][0];
	$indian=$_POST['indian'];
	$messtype=$_POST['messtype'];
	$foodtype= $indian.$messtype;
	$man_id=$_SESSION['manager_id'];
	$pwd=$_POST['pwd'];
	$repwd=$_POST['repwd'];
	$foodcheck="select * from mess_type where typeoffood='$foodtype' and mess_id='$messid'";
	if($mysqli->query($foodcheck)->fetch_assoc()&&$pwd=$repwd&&$mysqli->query("insert into student values('$regno','$pwd','$name','$block',$roomno,'$messid','$indian','$messtype',$man_id)"))
		echo '<div style='.'margin-left:510px;font-size:30px'.'>student info saved sucessfully</div>';
	else echo '<div style='.'margin-left:510px;font-size:30px'.'>student info could not be saved</div>'.$mysqli->error;
}
?>