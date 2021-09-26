<?php
/*require "../config.php";
require '../core/commantaireFunction.php';*/
require '../include.php';
session_start();
$commantaireF=new CommantaireF();
$commantaireF->modifierCommantaire($_POST['id'],$_POST['post_text']);
$up=$_SESSION["page"];
//$up = $str = explode('?', $up)[0];
header('location:'.$up);
?>		