<?php
/*
require "../config.php";
require '../core/sujetFunction.php';
*/
require '../include.php';
session_start();
$sujetF=new SujetF();
$sujetF->downvote($_GET['id'],$_SESSION["Nom"]);
$up=$_SESSION["page"];
//$up = $str = explode('?', $up)[0];
header('location:'.$up);;
?>