<?php
/*
require "../config.php";
require '../core/livretFunction.php';
*/
require "../include.php";

$livretF=new livretF();
$livretF->supprimerLivresT($_GET['Titre']);
unlink('C:\wamp64\www\web\ProjetWeb\viewsFO\files\\'.$_GET['Titre'].'.pdf');
header('location:tableDiscussion.php');
?>