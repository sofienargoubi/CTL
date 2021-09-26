<?php 
/*
require "../config.php";
require '../core/livretFunction.php';
require '../entities/livreT.php';
*/
require '../include.php';
$description=$_GET['cc-name'];
$file=$_GET['cc-payment'];
$pos = strrpos($file, "\\");
$nom = substr($file, $pos+1);
$nom = explode('.', $nom)[0];
$livreTF=new livretF();
$livret=new LivreT($nom,$description,$file);
$c='C:\wamp64\www\web\ProjetWeb\viewsFO\files\\'.$nom.'.pdf';
copy($file, $c);
$livreTF->ajouterLivreT($livret);
header('location:tableDiscussion.php');
?>