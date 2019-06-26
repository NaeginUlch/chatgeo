

	/*************************************************/
	/****************** EVENEMENTS *******************/
	/*************************************************/

//On déclare les variables

var	latitude = 0 ;
var	longitude = 0 ;
var pseudo = "" ;


// Envoi Ajax à intervalle régulier (5s)

if (jQuery('#msg').val() != ""){
	 setInterval(reception, 5000);
}

	// Envoie tout les 5 secondes
	setInterval(getpseudo, 5000);

	function getpseudo() {
	pseudo = jQuery('#pseudo').val();

	// Envoie pop-up si des caractères sont entrés dans le champ

	if (pseudo != "") {

	setInterval(getLocation, 5000);
}
}


	function getLocation() {

 	 if (navigator.geolocation) {
   		 navigator.geolocation.getCurrentPosition(showPosition);
  	} else {
   alert( "Geolocation is not supported by this browser." );
  }

}

//on récupères les coordonnées

	function showPosition(position) {
  latitude = position.coords.latitude;
  longitude = position.coords.longitude ;
	envoyerAjax2();
	}

	function envoyerAjax2() {

	// Données JSON à envoyer

	var coordonnees = {};
	coordonnees['latitude'] = latitude;
	coordonnees['longitude'] = longitude;
	coordonnees['pseudo'] = pseudo;

	// Envoi
	donneesSerialisees = JSON.stringify(coordonnees);

	// alert("La requète AJAX part avec les données : " + donneesSerialisees);
	jQuery.ajax({type: 'POST', url: 'operation.php', dataType: 'json', data: "data=" + donneesSerialisees,
	});
}

	function reception() {

	var message = {};
	message['pseudo'] = pseudo;

	// Envoi
	donneesSerialisees = JSON.stringify(message);

 	// alert("La requète AJAX part avec les données : " + donneesSerialisees);
	jQuery.ajax({type: 'POST', url: 'message.php', dataType: 'json', data: "data=" + donneesSerialisees,
			success: function(reponseServeur) {
				recevoirAjax2(reponseServeur);
			}
		});
}

function recevoirAjax2(reponseServeur) {

// Récupère valeurs JSON
		var serveur1 = null;
		var serveur2 = null;

		if (defined(reponseServeur.login)) {
			serveur1 = reponseServeur.login;
		}
		if (defined(reponseServeur.message)) {
			serveur2 = reponseServeur.message;
		}

		// Afficher valeurs
		jQuery(".zonemessage").html( serveur1 + ":" + serveur2 + "<br>");

	}



/*==============================
	Utiles
==============================*/

 // Test si une variable est définie
	 function defined(myVar) {
	 	if (typeof myVar != 'undefined') return true;
	 	return false;
	 }
