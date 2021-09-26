<?php
/*
include "../entities/livre.php";
include "../core/livreC.php";
*/
require '../include.php';
   $id = $_POST['id'];
	$titre = $_POST['titre'];
	$nom  = $_POST['name'];
	$prix = $_POST['prix'];
    $l=new Livre($id,$titre,"",$nom,"",$prix);
    $lc=new livreC();
    $lc->modifier_livre($l);
header("location:gestionlivre.php");

?>