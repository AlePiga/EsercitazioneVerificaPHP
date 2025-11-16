let tot = 0;

function aggiungiPanino() {
	let prezzo = 5;
	let selezionate = document.querySelectorAll('input[name="extra"]:checked').length;
	if (selezionate > 3) {
		alert("Seleziona max 3 opzioni");
		return;
	} else {
		for (let i = 0; i < selezionate; i++) {
			prezzo += 2;
		}
	}
	tot += prezzo;
	alert("Totale:" + tot);
}
