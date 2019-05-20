<?php
 
	try
{
	// On se connecte à MySQL
	$bdd = new PDO('mysql:host=localhost;dbname=ecom;charset=utf8', 'root', 'rootroot');
}
catch(Exception $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}

// Si tout va bien, on peut continuer

// On récupère tout le contenu de la table jeux_video

if (isset($_GET['type'])) {

  $type = $_GET['type'];
  $reponse =$bdd->query('SELECt * FROM produit WHERE type = :type');
   

} else {


  $reponse =$bdd->query('SELECt * FROM produit ');
}

?>

