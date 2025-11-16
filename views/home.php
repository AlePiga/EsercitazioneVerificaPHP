<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>

</head>
<?php
session_start();
?>

<body>
	<h1>Paninaro di Lauro Panetti</h1>
	<h2>Panino base</h2>
	<form method="post" action="../controls/scontrino.php">
		<div>
			<input id="paninoA" type="radio" name="panino" value="Hamburger" required><label for="paninoA">Hamburger</label><br>
			<input id="paninoB" type="radio" name="panino" value="Salciccia"><label for="paninoB">Salciccia</label><br>
			<input id="paninoC" type="radio" name="panino" value="Vegano"><label for="paninoC">Vegano</label><br>
			<input id="paninoD" type="radio" name="panino" value="Toast"><label for="paninoD">Toast</label><br>
		</div>
		<div>
			<h2>Ingredienti extra</h2>
			<input id="a" type="checkbox" name="extra[]" value="Patty extra"><label for="a">Patty extra</label><br>
			<input id="b" type="checkbox" name="extra[]" value="Insalata extra"><label for="b">Insalata extra</label><br>
			<input id="c" type="checkbox" name="extra[]" value="Pomodoro extra"><label for="c">Pomodoro extra</label><br>
			<input id="d" type="checkbox" name="extra[]" value="Bacon extra"><label for="d">Bacon extra</label><br>
			<input id="e" type="checkbox" name="extra[]" value="Cheddar extra"><label for="e">Cheddar extra</label><br>
		</div>
		<div>
			<h2>Salse</h2>
			<input id="f" type="checkbox" name="salsa[]" value="Ketchup"><label for="f">Ketchup</label><br>
			<input id="g" type="checkbox" name="salsa[]" value="Mayonese"><label for="g">Mayonese</label><br>
			<input id="h" type="checkbox" name="salsa[]" value="Salsa rosa"><label for="h">Salsa rosa</label><br>
			<input id="i" type="checkbox" name="salsa[]" value="Yogurt"><label for="i">Yogurt</label><br>
		</div>
		<br>
		<button type="submit" formaction="../controls/aggiungi.php">Aggiungi</button>
		<button type="submit">Scontrino</button>
	</form>
</body>

<script src="script.js"></script>

</html>