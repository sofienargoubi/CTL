
<?php
/*
include "../../entities/packs.php";
include "../../core/PacksC.php";
*/

require '../include.php';
	$packsC=new PacksC();
echo $_POST['id'];
if (isset($_POST['id'])){
    $result=$packsC->recupererPacksParId($_POST['id']);
	foreach($result as $row){
		
		$nom=$row['nom'];
		$prix=$row['prix'];
		$informations=$row['informations'];
		$livres=$row['livres'];
		
}
	}
	$packs=new packs($_POST['nom'],$_POST['prix'],$_POST['informations'],$_POST['livres']);
	$packsC->modifierPacks($packs,$_POST['id']);
	//echo $_POST['cin_ini'];
	header('Location: EcoleAffichage.php');

?>