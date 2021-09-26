<?PHP
/*include "../../entities/reclamation.php";
include "../../core/reclamationC.php";
include "../../config.php";*/
require '../include.php';
session_start();
if (isset($_POST['msg']) ){
    $rec=new reclamation($_SESSION['Nom'],$_SESSION['mail'],$_POST['msg']);

    $recl=new reclamationC();
    $recl->ajouterReclamation($rec);
header('Location: contact.php');

}
else{
    echo "vérifier les champs";
}


?>