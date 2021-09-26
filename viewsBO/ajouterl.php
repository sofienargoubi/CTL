<?php
include "../include.php";
$ok = True;
if (isset ($_POST['save']))
{
	$titre = $_POST['titre'];
	$nom  = $_POST['name'];
	$categorie = $_POST['select'];
	$cover = $_FILES['cover']['name'];
	$prix = $_POST['prix'];
 
	// Si l'un des champs est vide, lancer une erreur
	if (empty($titre) || empty($nom) || empty($categorie) || empty($cover) || empty($prix)){
		$ok = false;
	}
    if(!verif_alpha($nom) || (strlen($nom)>20))
    {
    	$ok = false;
    }
        if(!verif_alphaNum($titre) || (strlen($titre)>20))
    {
    	$ok = false;
    }
    if(!((substr($cover,-4)==".png") || (substr($cover,-4)==".jpg") || (substr($cover,-5)==".jpeg")))
    {
    	$ok = false;
    }
    if(!verif_Num($prix) || (strlen($prix)>3))
    {
    	$ok = false;
    }
if($ok)
{
    $l=new Livre("",$titre,$categorie,$nom,$cover,$prix);
    $lc=new livreC();
    $lc->ajouter_livre($l);
}
header("location:gestionlivre.php");
}
function verif_Num($str){
    preg_match("/([^0-9])/",$str,$result);
//On cherche tt les caractères autre que [A-z]
    if(!empty($result)){//si on trouve des caractère autre que A-z
        return false;
    }
    return true;
}

function verif_alpha($str){
    preg_match("/([^A-Za-z])/",$str,$result);
//On cherche tt les caractères autre que [A-z] 
    if(!empty($result)){//si on trouve des caractère autre que A-z
        return false;
    }
    return true;
}
function verif_alphaNum($str){
    preg_match("/([^A-Za-z0-9])/",$str,$result);
//On cherche tt les caractères autre que [A-Za-z] ou [0-9]
    if(!empty($result)){//si on trouve des caractère autre que A-Za-z ou 0-9
        return false;
    }
    return true;
}
?>
