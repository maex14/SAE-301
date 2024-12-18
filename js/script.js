// Fonction pour vider la div des détails
function viderDivDetails() {
	document.getElementById('divUtilisateurs').innerHTML = "";  
  }
  
  // Fonction pour afficher les informations de l'utilisateur
  function afficherInfosUtilisateur() {
	let idUtilisateurSelectionne = this.value;
  
	// Requête AJAX
	var xhttp = new XMLHttpRequest();
	xhttp.open("GET", "API/listerUtilisateur.php?id_utilisateur=" + idUtilisateurSelectionne, true);
	xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
	xhttp.onreadystatechange = function() {
	  if (this.readyState == 4 && this.status == 200) {
		var response = JSON.parse(this.responseText);
  
		if (response.status == "OK" && response.utilisateur) {
		  const template = document.getElementById('templateUtilisateur').innerHTML;
		  const rendered = Mustache.render(template, response.utilisateur);
		  document.getElementById("divUtilisateurs").innerHTML = rendered;
		} else {
		  document.getElementById("divUtilisateurs").innerHTML = "Aucun utilisateur trouvé";
		}
	  }
	};
	xhttp.send();
  }
  
// Fonction d'initialisation
function init() {
	// Modifier l'événement "click" en "change" pour que cela fonctionne avec le select
	document.getElementById("selectUtilisateur").addEventListener("change", afficherInfosUtilisateur);
  }
  
  window.addEventListener('load', init);
  
  
  // Vider la div des détails lors du chargement
  viderDivDetails();
  