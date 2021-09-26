
<?php
/*
include "../../entities/Editeur.php";
include "../../core/EditeurC.php";*/

require '../include.php';
	$editeurC=new EditeurC();
echo $_POST['id'];
if (isset($_POST['id'])){
    $result=$editeurC->recupererEditeur($_POST['id']);
	foreach($result as $row){
		
		$nom=$row['nom'];
		$informations=$row['informations'];
		$livres=$row['livres'];
		$mail=$row['mail'];
		$telephone=$row['telephone'];
		$adresse=$row['adresse'];
}
	}
	$editeur=new editeur($_POST['nom'],$_POST['info'],$_POST['livres'],$_POST['mail'],$_POST['telephone'],$_POST['adresse']);
	$editeurC->modifierEditeur($editeur,$_POST['id']);
	//echo $_POST['cin_ini'];
	header('Location: EditeurAffichage.php');

?>