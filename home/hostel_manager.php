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
		<ul>
		<li><a href='add/add_stud.php'>Add a Student</a></li>
		<li><a href='add/add_mess.php'>Add a Mess</a></li>
		<li><a href='add/add_manager.php'>Add Manager</a></li>
		<li><a href='add/add_mess_menu.php'>Add Mess Menu</a></li>
		</ul>
	</aside>