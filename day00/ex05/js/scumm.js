let x = 0;

function game(event) {
	event.preventDefault();
	var qst = document.querySelector("#form input[type='text']").value;
	var answr = document.querySelector("#reponse");
	switch (x) {
		case 0:
			if (qst.indexOf("non") > -1 || qst.indexOf("NON") > -1) {
				answr.innerHTML = "Dans la meme galere, votre nom camarade?";
				x = 1;
			} else if (qst.indexOf("oui") > -1 || qst.indexOf("OUI") > -1) {
				answr.innerHTML = "Vous ete un visiteur?";
				x = 2;
			} else {
				answr.innerHTML = "oui ou non c'est tous ce que j'attend :/";
			}
			break;
		case 1:
			answr.innerHTML = "Bonjour" + qst + "vous avez fait votre printf";
			x = 11;
			break;
		case 2:
			if (qst.indexOf("non") > -1 || qst.indexOf("NON") > -1) {
				answr.innerHTML = "Alert Securite venez vite!";
				alert("Vous ete capturer!!!!");
				document.querySelector("#form input[type='text']").value = " ";
				x = 404;
			} else if (qst.indexOf("oui") > -1 || qst.indexOf("OUI") > -1) {
				answr.innerHTML = "Vous ete de la part du l7aj?";
				x = 22;
			} else {
				answr.innerHTML = "oui ou non c'est tous ce que j'attend :/";
			}
			break;
		case 11:
			if (qst.indexOf("non") > -1 || qst.indexOf("NON") > -1) {
				answr.innerHTML = "Pourquoi? je pense que vous avez prefere piscine PHP";
				x = 111;
			} else if (qst.indexOf("oui") > -1 || qst.indexOf("OUI") > -1) {
				answr.innerHTML = "Tres bien vous voulez continuer ans la voix du IA";
				x = 112;
			} else {
				answr.innerHTML = "oui ou non c'est tous ce que j'attend :/";
			}
			break;
		case 111:
			if (qst.indexOf("oui") > -1 || qst.indexOf("OUI") > -1) {
				answr.innerHTML = "13 jours de galere, au revoir mon ami j;ei une correction";
				alert("Vous ete deriger vers le cluster2");
				x = 40000
			} else if (qst.indexOf("non") > -1 || qst.indexOf("non") > -1) {
				answr.innerHTML = "Vous ete intereser en securite";
				alert("son telephone sonne, il part");
				x = 40000
			} else {
				answr.innerHTML = "oui ou non c'est tous ce que j'attend :/";
			}
		case 22:
			if (qst.indexOf("non") > -1 || qst.indexOf("NON") > -1) {
				answr.innerHTML = "Hafssou viens te prendre pour jouez avec eux";
				alert("Vous regarder Hafsou, Stalin, cham3oun et Michoc Joue Crash");
				x = 404;
			} else if (qst.indexOf("oui") > -1 || qst.indexOf("OUI") > -1) {
				answr.innerHTML = "(L7aj court vers vous en crions il ya du titiz?)";
				x = 222;
			} else {
				answr.innerHTML = "oui ou non c'est tous ce que j'attend :/";
			}
			break;
		case 222:
			if (qst.indexOf("non") > -1 || qst.indexOf("NON") > -1) {
				answr.innerHTML = "L7aj est en colere assume ta responsabilite";
				alert("Vous avez une grave blessure (le staff a dit)");
				x = 404;
			} else if (qst.indexOf("oui") > -1 || qst.indexOf("OUI") > -1) {
				answr.innerHTML = "L7aj est heureux et viens avec vous)";
				alert("Enfin l7aj a trouver le bonheur");
				x = 10001
			} else {
				answr.innerHTML = "oui ou non c'est tous ce que j'attend :/";
			}
			break;
	}
	document.querySelector("#form input[type='text']").value = " ";
}