<?PHP
/*include "../../entities/produit_specifique.php";
include "../../core/produit_specifiqueC.php";
include "../../config.php";*/
require '../include.php';

session_start();
if (isset($_POST['ajouter']) ){
        $p=new produit_specifique($_POST['titre'],$_POST[('auteur')],$_POST['categorie'],$_SESSION['tel'],$_SESSION['mail'],$_POST['autre']);
    $pr=new produit_specifiqueC();
    $pr->ajouter_produit_specifique($p);
header('Location: demande_produit_specifique.php');

}
else{
    echo "vérifier les champs";
}


?>