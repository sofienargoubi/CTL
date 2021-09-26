<?php
/*require "../config.php";
require '../core/sujetFunction.php';  */
require '../include.php';
session_start();
$sujetF=new SujetF();
$sujetF->modifierSujet($_POST['id'],$_POST['post_name'],$_POST['post_text']);
$up=$_SESSION["page"];
$up = $str = explode('?', $up)[0];
echo $up;
header('location:'.$up);
?>		