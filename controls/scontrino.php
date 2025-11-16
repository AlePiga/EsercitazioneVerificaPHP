<?php
session_start();

$ordini = $_SESSION["ordini"] ?? [];
$totale_finale = 0;

foreach ($ordini as $o) {
	$totale_finale += $o["totale"];
}

$path = "../scontrini.json";

// Se il file non esiste, crealo vuoto
if (!file_exists($path)) {
	file_put_contents($path, "[]");
}

// Leggi il JSON esistente
$storico = json_decode(file_get_contents($path), true);

// Crea il nuovo scontrino completo
$scontrino = [
	"utente" => $_SESSION["user"] ?? "Guest",
	"ordini" => $ordini,
	"totale_finale" => $totale_finale,
	"timestamp" => date("Y-m-d H:i:s")
];

// Aggiungi lo scontrino allo storico
$storico[] = $scontrino;

// Risalva tutto nel file
file_put_contents($path, json_encode($storico, JSON_PRETTY_PRINT));

?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Scontrino finale</title>
</head>

<body>
	<h1>Scontrino di <?= $_SESSION["user"] ?? "Guest" ?></h1>

	<?php if (empty($ordini)): ?>
		<p>Nessun ordine effettuato.</p>
	<?php else: ?>
		<?php foreach ($ordini as $index => $o): ?>
			<h2>Ordine <?= $index + 1 ?></h2>

			<p><strong>Panino:</strong> <?= $o["panino"] ?></p>

			<p><strong>Extra:</strong></p>
			<ul>
				<?php foreach ($o["extra"] as $e): ?>
					<li><?= $e ?></li>
				<?php endforeach; ?>
			</ul>

			<p><strong>Salse:</strong></p>
			<ul>
				<?php foreach ($o["salse"] as $s): ?>
					<li><?= $s ?></li>
				<?php endforeach; ?>
			</ul>

			<p><strong>Totale ordine:</strong> <?= number_format($o["totale"], 2) ?> €</p>
			<hr>
		<?php endforeach; ?>

		<h2>Totale finale:</h2>
		<p><strong><?= number_format($totale_finale, 2) ?> €</strong></p>
	<?php endif; ?>

	<br>
	<a href="../views/home.php">Torna indietro</a>
</body>

</html>