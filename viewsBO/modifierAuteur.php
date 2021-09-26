
<?php
/*
include "../../entities/auteur.php";
include "../../core/AuteurC.php";*/

require '../include.php';
	$auteurC=new AuteurC();
echo $_POST['id'];
if (isset($_POST['id'])){
    $result=$auteurC->rechercherAuteurById($_POST['id']);
	foreach($result as $row){
		
		$nom=$row['nom'];
		$prenom=$row['prenom'];
		$informations=$row['informations'];
		$livres=$row['livres'];
		
}
	}
	$auteur=new auteur($_POST['nom'],$_POST['prenom'],$_POST['informations'],$_POST['livres']);
	$auteurC->modifierAuteur($auteur,$_POST['id']);
	//echo $_POST['cin_ini'];
	header('Location: AuteurAffichage.php');

?>