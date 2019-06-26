<?php
  ini_set('display_errors','on');
  error_reporting(E_ALL);
//////////////////////////////////////////////////////////////////////////////
// Données client AJAX (vérification minimale)
  $data = NULL;
  if (isset($_POST['data'])) {

    // Récupération et déserialisation
    $data = json_decode($_POST['data'], true);
  }

  //mise en forme
	$pseudo = $data['pseudo'];
  $namelist = array();
  $messagelist = array();

  //////////////////////////////////////////////////////////////////////////////////////
  // Requète : Insert

  include_once("dbConfig.php");
  $mysqli = new mysqli(DB_HOST, DB_LOGIN, DB_PWD, DB_NAME);

    // Echappe caractères interdits
    $pseudo = $mysqli->real_escape_string($pseudo);

    // Requète

      $requete = "SELECT tblusers.login, minichat.message FROM tblusers
      INNER JOIN minichat ON tblusers.login = minichat.pseudo
      WHERE (tblusers.longitude > ".($maLongitude - 1).") AND (tblusers.longitude < ".($maLongitude  + 1)." AND tblusers.latitude > ".($maLatitude - 1).") AND (tblusers.latitude < ".($maLatitude + 1))";
      $resultat = $mysqli->query($requete);
      echo($requete);
    /*  // Résultat
  		while ($ligne = $resultat->fetch_assoc()) {
  		$namelist[] =	$ligne['login'];
  		}

      $requete2 = "SELECT `pseudo`,`message` FROM `minichat`";
      $resultat2 = $mysqli->query($requete2);

      while ($ligne = $resultat->fetch_assoc()) {
        if (in_array($ligne['pseudo'], $namelist)) {
            	$messagelist[] = $ligne['message'];
          }
     }*/

    //////////////////////////////////////////////////////////////////////////////
    // Fermeture BD
      $mysqli->close();

  /*    //////////////////////////////////////////////////////////////////////////////
    	// Réponse AJAX

    		// Création objet JSON
    		$serverData = array();
    		$serverData['login'] = $namelist;
        echo($namelist);
    		$serverData['msg'] = $messagelist;


    		// Serialisation et envoi
    		echo json_encode($serverData);
*/

?>
