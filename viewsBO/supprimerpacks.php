<?PHP
/*
include "../../core/PacksC.php";*/

require '../include.php';
$id = $_GET["id"];
echo $id;
$packs=new PacksC();

$packs->supprimerPacks($id);
header('Location: EcoleAffichage.php');




?>