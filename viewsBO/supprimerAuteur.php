<?PHP
/*
include "../../core/AuteurC.php";*/

require '../include.php';
$AuteurC=new AuteurC();
if (isset($_GET["id"])){
	$AuteurC->supprimerAuteur($_GET["id"]);
	header('Location: AuteurAffichage.php');
}

?>