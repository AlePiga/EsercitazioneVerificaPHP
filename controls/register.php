<?php
require "../model/Database.php";
session_start();

$username = $_POST["nome"];
$password = $_POST["password"];
$db = new Database();

setcookie("user", $username, time() + 86400, "/");
$result = $db->query("SELECT * FROM utenti WHERE username='$username'");

if ($result && $result->num_rows === 0) {
	$db->query("INSERT INTO utenti(username, password) VALUES ('$username', '$password')");
	echo "<p>Utente aggiunto al DB!</p>";
	sleep(1);
	header("Location: ../index.php");
	exit();
} else {
	header("Location: ../index.php");
	exit();
}
