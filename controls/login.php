<?php
session_start();
require "../model/Database.php";
$username = $_POST["nome"];
$password = $_POST["password"];

$db = new Database();
$query = "SELECT * FROM utenti WHERE username='$username' AND password='$password'";
$result = $db->query($query);
setcookie("user", $username, time() + 86400, "/");
if ($result && $result->num_rows === 1) {
	$_SESSION["user"] = $username;
	setcookie("user", "Ale", time() + 86400, "/");
	header("Location: ../views/home.php");
	exit();
} else {
	header("Location: errore.php");
	exit();
}
