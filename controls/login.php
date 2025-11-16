<?php
require "../model/Database.php";

/* Inizializzo la sessione */
session_start();

/* Username e password presi dal form */
$username = $_POST["nome"];
$password = $_POST["password"];

$db = new Database();

/* Prendo le righe della tabella con quel nome utente e quella password */
$query = "SELECT * FROM utenti WHERE username='$username' AND password='$password'";

/* Eseguo la query nel database */
$result = $db->query($query);

/* Se c'è una riga col risultato*/
if ($result->num_rows === 1) {

	/* User della sessione è username */
	$_SESSION["user"] = $username;

	/* Imposto il cookie di tipo user con valore nome utente sessione, che dura bho un giorno e prende come path / non lo so */
	setcookie("user", $_SESSION["user"], time() + 86400, "/");

	/* Reindirizzamento */
	header("Location: ../views/home.php");
	exit();
} else {
	header("Location: errore.php");
	exit();
}
