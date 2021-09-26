<?php
/*
require "../config.php";
require '../core/commantaireFunction.php';
*/
require "../include.php";

session_start();
$commantaireF=new CommantaireF();
$commantaireF->supprimerCommantaire($_GET['id'],$_GET['idd']);
$up=$_SESSION["page"];
echo $up;
//$up = $str = explode('?', $up)[0];
header('location:'.$up);
?>