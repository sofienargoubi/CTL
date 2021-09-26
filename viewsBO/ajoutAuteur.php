<?PHP
/*
include "../../entities/auteur.php";
include "../../core/AuteurC.php";
*/
require '../include.php';

if ( isset($_POST['nom']) and isset($_POST['prenom']) and isset($_POST['informations']) and isset($_POST['livres'])){
$auteur1=new auteur($_POST['nom'],$_POST['prenom'],$_POST['informations'],$_POST['livres']);
//Partie2
/*
var_dump($auteur1);
}
*/
//Partie3
$auteur1C=new auteurC();
$auteur1C->ajouterauteur($auteur1);
header('Location: AuteurAffichage.php');
	
}else{
	echo "vérifier les champs";
}
//*/

?>