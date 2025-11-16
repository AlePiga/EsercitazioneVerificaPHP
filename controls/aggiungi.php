<?php
session_start();

// Se non esiste ancora la lista di ordini, la creo
if (!isset($_SESSION["ordini"])) {
	$_SESSION["ordini"] = [];
}

// Prendo i dati dal form
$panino = $_POST["panino"] ?? null;
$extra = $_POST["extra"] ?? [];
$salsa = $_POST["salsa"] ?? [];

$prezzo_extra = 2;
$totale = 5 + count($extra) * $prezzo_extra;

// Creo l'ordine
$ordine = [
	"panino" => $panino,
	"extra" => $extra,
	"salse" => $salsa,
	"totale" => $totale
];

// Lo aggiungo alla lista
$_SESSION["ordini"][] = $ordine;

// Torno alla pagina principale
header("Location: ../views/home.php");
exit;
