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
	<aside>
		<a href='view_bill.php'>View Bill</a><br>
		<a href='mess_change.php'>Change Mess</a><br>
		<a href='mess_leave.php'>Mess Leave</a><br>
		<a href='review.php'>Review Food</a><br>
	</aside>
	