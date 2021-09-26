<?PHP
/*
include "../../core/EditeurC.php";*/

require '../include.php';
$id = $_GET["id"];
echo $id;
$editeur=new EditeurC();

$editeur->supprimerEditeur($id);
header('Location: EditeurAffichage.php');




?>