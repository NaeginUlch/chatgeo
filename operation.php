<?php

//////////////////////////////////////////////////////////////////////////////
// Données client AJAX (vérification minimale)
  $data = NULL;
  if (isset($_POST['data'])) {
    // Récupération et déserialisation
    $data = json_decode($_POST['data'], true);
  }

  //mise en forme
	$latitude = $data['latitude'];
  $longitude = $data['longitude'];
  $pseudo = $data['pseudo'];
  echo "coor: ".$data."<br>";
  echo "pseudo: ".$pseudo."<br>";
  //////////////////////////////////////////////////////////////////////////////////////
  // Requète : Insert

  include_once("dbConfig.php");
  $mysqli = new mysqli(DB_HOST, DB_LOGIN, DB_PWD, DB_NAME);

    // Echappe caractères interdits
    $latitude = $mysqli->real_escape_string($latitude);
    $longitude = $mysqli->real_escape_string($longitude);
    $pseudo = $mysqli->real_escape_string($pseudo);

    // Requète
    $requete = "SELECT * FROM `tblusers` WHERE `login` = '$pseudo';";
    $resultat = $mysqli->query($requete);

    $nbLignes = $resultat->num_rows;
    if ($nbLignes) {
      $requete2 = "UPDATE `tblusers` SET `longitude`= '$longitude' ,`latitude`= '$latitude' WHERE `login`= '$pseudo' ";
      $resultat2 = $mysqli->query($requete2);
    } else {
      $requete2 = "INSERT INTO `tblusers`(`id`, `login`, `longitude`, `latitude`) VALUES (NULL,'$pseudo','$longitude','$latitude')";
      $resultat2 = $mysqli->query($requete2);

  }

   $resultat->close();
    //////////////////////////////////////////////////////////////////////////////
    // Fermeture BD
      $mysqli->close();

?>
