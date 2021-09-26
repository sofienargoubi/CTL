<?php 
require '../include.php';
$Clients=new Users() ;
$info=new InfoF();
$newsletters=new Newsletters();

$n="Non";
if(isset($_POST['sujet']))
{
 $n="Oui";
}

$client=new User('',$_POST['Nom'],$_POST['Datedenaissance'],$_POST['Email'],'',$_POST['Numerotelephone'],$_POST['Ville'],$_POST['Adresse'],$_POST['Codepostale'],'');
$newsletter=new Newsletter($_POST['Email']);

if (isset($_POST["modifier"]))
{

$Clients->modifierClient($client,$_GET['id']);
    $info->modifierinfo($_GET['id'],$n);
    if (!empty($_POST['newsletter']))
    {
    	$newsletters->ajouterNewsletter($newsletter);
    }
}
/*if (isset($_POST["supprimer"]))
{

$Tabeclient=$Clients1->supprimerclient($_GET['id']);
}*/
header('Location: profile.php');

?>