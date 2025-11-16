<?php
session_start();

$prezzo_extra = 2;

// Dati ricevuti dal form
$panino = $_POST["panino"] ?? null;
$extra = $_POST["extra"] ?? [];
$salsa = $_POST["salsa"] ?? [];
die(count($_POST["extra"]));
// Calcola il totale
$totale = 5;
$totale += count($extra) * $prezzo_extra;

// --- Salvataggio su JSON ---
$ordine = [
	"utente" => $_SESSION["user"] ?? "Guest",
	"panino" => $panino,
	"extra" => $extra,
	"salse" => $salsa,
	"totale" => $totale
];

// Leggi/crea JSON
$path = "../ordini.json";

if (!file_exists($path)) {
	file_put_contents($path, "[]");
}

$ordini = json_decode(file_get_contents($path), true);
$ordini[] = $ordine;

file_put_contents($path, json_encode($ordini, JSON_PRETTY_PRINT));
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Scontrino</title>
</head>

<body>
	<h1>Scontrino di <?= $_SESSION["user"] ?? "Guest" ?></h1>

	<h2>Panino scelto:</h2>
	<p><?= $panino ?></p>

	<h2>Ingredienti extra:</h2>
	<ul>
		<?php foreach ($extra as $e) echo "<li>$e</li>"; ?>
	</ul>

	<h2>Salse:</h2>
	<ul>
		<?php foreach ($salse as $s) echo "<li>$s</li>"; ?>
	</ul>

	<h2>Totale da pagare:</h2>
	<p><strong><?= number_format($totale, 2) ?> €</strong></p>

	<br>
	<a href="../views/home.php">Torna indietro</a>
</body>

</html>