<?php
require "./model/Database.php";
session_start();
$db = new Database();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>

<body>
	<h2>Login</h2>
	<form method="post" action="./controls/login.php">
		<label>Username: </label><br>
		<input type="text" name="nome"><br>
		<label>Password: </label><br>
		<input type="password" name="password">
		<button type="submit">Login</button>
	</form>
	<br><a href="./views/register.php">Non hai un account? Registrati!</a>
</body>

</html>